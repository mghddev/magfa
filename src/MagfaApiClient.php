<?php
namespace mghddev\magfa;

use mghddev\magfa\Constant\MagfaServices;
use mghddev\magfa\Exception\ApiResponseConnectException;
use mghddev\magfa\Exception\APIResponseException;
use mghddev\magfa\ValueObject\EnqueueVO;
use SoapClient;
use SoapFault;
use SoapHeader;

/**
 * Class MagfaApiClient
 * @package mghddev\magfa
 */
class MagfaApiClient implements iMagfaApiClient
{
    /**
     * @var array
     */
    protected array $default_config = ['base_uri' => 'http://sms.magfa.com/services/urn:SOAPSmsQueue?wsdl'];

    /**
     * @var string
     */
    protected string $domain;

    /**
     * @var string
     */
    private string $username;

    /**
     * @var string
     */
    private string $password;

    /**
     * @var string
     */
    protected string $base_uri;

    /**
     * @var SoapClient|null
     */
    protected ?SoapClient $soap_client = null;

    /**
     * AdpApiClient constructor.
     * @param string $domain
     * @param string $username
     * @param string $password
     * @param array $config
     */
    public function __construct(string $domain, string $username, string $password, array $config = [])
    {
        $this->base_uri = $config['base_uri'] ?? $this->default_config['base_uri'];
        $this->username = $username;
        $this->password = $password;
        $this->domain = $domain;
    }

    /**
     * @return SoapClient
     * @throws APIResponseException
     * @throws ApiResponseConnectException
     */
    private function getSoapClient()
    {
        if(! is_null($this->soap_client)) {
            return $this->soap_client;
        }

        try{
            $this->soap_client = new SoapClient(
                $this->base_uri,
                [
                    'login' => $this->username,'password' => $this->password, // Credientials
                    'features' => SOAP_USE_XSI_ARRAY_TYPE, // Required
//                    'trace' => true // Optional (debug)
                ]
            );

            return $this->soap_client;
        }

        catch (\Exception $e) {

            if (
                get_class($e) == SoapFault::class &&
                $this->strContains($e->getMessage(), "SOAP-ERROR: Parsing WSDL: Couldn't load from")
            ) {
                throw new ApiResponseConnectException;
            }

            else {
                throw new APIResponseException($e->getMessage());
            }
        }

    }

    /**
     * @param array $messages
     * @return mixed
     * @throws APIResponseException
     * @throws ApiResponseConnectException
     */
    public function send(array $messages)
    {

        $data = [
            'domain' => $this->domain,
            'messageBodies' => array_map(function (EnqueueVO $item) {
                return $item->getMessage();
            }, $messages),
            'recipientNumbers' => array_map(function (EnqueueVO $item) {
                return $item->getTo();
            }, $messages),
            'senderNumbers' => array_map(function (EnqueueVO $item) {
                return $item->getFrom();
            }, $messages),
            'encodings' => empty(array_filter(array_map(function (EnqueueVO $item) {
                return $item->getEncoding();
            }, $messages))) ? null : array_map(function (EnqueueVO $item) {
                return $item->getEncoding();
            }, $messages),
            'udhs' => empty(array_filter(array_map(function (EnqueueVO $item) {
                return $item->getUDH();
            }, $messages))) ? null : array_map(function (EnqueueVO $item) {
                return $item->getUDH();
            }, $messages),
            'messageClasses' => empty(array_filter(array_map(function (EnqueueVO $item) {
                return $item->getMClass();
            }, $messages))) ? null : array_map(function (EnqueueVO $item) {
                return $item->getMClass();
            }, $messages),
            'checkingMessageIds' => empty(array_filter(array_map(function (EnqueueVO $item) {
                return $item->getChkMessageId();
            }, $messages))) ? null : array_map(function (EnqueueVO $item) {
                return $item->getChkMessageId();
            }, $messages),
        ];

        return $this->getSoapClient()->__soapCall("enqueue", $data);
    }

    /**
     * @param array $message_ids
     * @return mixed
     * @throws APIResponseException
     * @throws ApiResponseConnectException
     */
    public function getStatus(array $message_ids)
    {
        $data = [
            'messageId' => $message_ids
        ];

        $result = $this->getSoapClient()->__soapCall("getRealMessageStatuses", $data);

        $response = [];

        foreach ($result as $key => $item) {
            $response[$message_ids[$key]] = $item;
        }

        return $response;
    }

    /**
     * @param string $string
     * @param string $contain
     * @return bool
     */
    private function strContains(string $string, string $contain)
    {
        if (strpos($string, $contain) !== false) {
            return true;
        }
    }
}