<?php
namespace mghddev\magfa\Constant;

/**
 * Class MagfaMessageStatus
 * @package mghddev\magfa\Constant
 */
class MagfaMessageStatus
{
    const DELIVERED = 1;

    const UNDELIVERED = 2;

    const DELIVERED_TO_TELECOMMUNICATIONS = 8;

    const UNDELIVERED_TO_TELECOMMUNICATIONS = 16;

    const PENDING = 0;

    const ALL = [
      self::DELIVERED,
      self::UNDELIVERED,
      self::DELIVERED_TO_TELECOMMUNICATIONS,
      self::UNDELIVERED_TO_TELECOMMUNICATIONS,
      self::PENDING
    ];
}