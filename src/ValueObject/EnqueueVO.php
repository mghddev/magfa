<?php
namespace mghddev\magfa\ValueObject;

/**
 * Class EnqueueVO
 * @package mghddev\magfa\ValueObject
 */
class EnqueueVO
{
    /**
     * @var string
     */
    protected string $from;

    /**
     * @var string
     */
    protected string $to;

    /**
     * @var string
     */
    protected string $message;

    /**
     * @var int|null
     */
    protected ?int $m_class = null;

    /**
     * @var int|null
     */
    protected ?int $chk_message_id = null;

    /**
     * @var int|null
     */
    protected ?int $encoding = null;

    /**
     * @var string|null
     */
    protected ?string $UDH = null;

    /**
     * @return string
     */
    public function getFrom(): string
    {
        return $this->from;
    }

    /**
     * @param string $from
     * @return $this
     */
    public function setFrom(string $from)
    {
        $this->from = $from;
        return $this;
    }

    /**
     * @return string
     */
    public function getTo(): string
    {
        return $this->to;
    }

    /**
     * @param string $to
     * @return $this
     */
    public function setTo(string $to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param string $message
     * @return $this
     */
    public function setMessage(string $message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMClass(): ?int
    {
        return $this->m_class;
    }

    /**
     * @param int|null $m_class
     * @return $this
     */
    public function setMClass(?int $m_class)
    {
        $this->m_class = $m_class;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getChkMessageId(): ?int
    {
        return $this->chk_message_id;
    }

    /**
     * @param int|null $chk_message_id
     * @return $this
     */
    public function setChkMessageId(?int $chk_message_id)
    {
        $this->chk_message_id = $chk_message_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getEncoding(): ?int
    {
        return $this->encoding;
    }

    /**
     * @param int|null $encoding
     * @return $this
     */
    public function setEncoding(?int $encoding)
    {
        $this->encoding = $encoding;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getUDH(): ?string
    {
        return $this->UDH;
    }

    /**
     * @param string|null $UDH
     * @return $this
     */
    public function setUDH(?string $UDH)
    {
        $this->UDH = $UDH;
        return $this;
    }
}