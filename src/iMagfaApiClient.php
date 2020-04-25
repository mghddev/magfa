<?php
namespace mghddev\magfa;

use mghddev\magfa\ValueObject\EnqueueVO;

interface iMagfaApiClient
{
    public function send(array $message);

    public function getStatus(int $message_id);

}