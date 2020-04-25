<?php
namespace mghddev\magfa\Constant;


class Errors
{
    const RECIPIENT_NUMBER = 1;
    const SENDER_NUMBER = 2;
    const CREDIT = 14;
    const SERVER_FAILED = 15;
    const INACTIVE_ACCOUNT = 16;
    const EXPIRED_ACCOUNT = 17;
    const AUTHENTICATION_FAILED = 18;
    const INVALID_REQUEST = 19;
    const HIGH_TRAFFIC = 23;
    const INACTIVE_RECIPIENT = 27;
    const INACTIVE_RECIPIENT_OPERATOR = 28;
    const BLOCKED_IP = 29;
    const BIG_BODY = 30;

    const ALL = [
        self::RECIPIENT_NUMBER,
        self::SENDER_NUMBER,
        self::CREDIT,
        self::SERVER_FAILED,
        self::INACTIVE_ACCOUNT,
        self::EXPIRED_ACCOUNT,
        self::AUTHENTICATION_FAILED,
        self::INVALID_REQUEST,
        self::HIGH_TRAFFIC,
        self::INACTIVE_RECIPIENT,
        self::INACTIVE_RECIPIENT_OPERATOR,
        self::BLOCKED_IP,
        self::BIG_BODY
    ];

    const MESSAGE = [
        self::RECIPIENT_NUMBER => 'شماره گیرنده نامعتبر است.',
        self::SENDER_NUMBER => 'شماره فرستنده نامعتبر است.',
        self::CREDIT => 'کمبود اعتبار',
        self::SERVER_FAILED => 'سرور در هنگام ارسال پیام دچار ایراد داخلی بوده است.',
        self::INACTIVE_ACCOUNT => 'حساب غیر فعال می‌باشد.',
        self::EXPIRED_ACCOUNT => 'حساب منقضی شده است.',
        self::AUTHENTICATION_FAILED => 'نام کاربری یا کلمه عبور نامعتبر است.',
        self::INVALID_REQUEST => 'درخواست معتبر نمی‌باشد.',
        self::HIGH_TRAFFIC => 'به دلیل ترافیک بالا امکان ارسال وجود ندارد.',
        self::INACTIVE_RECIPIENT => 'شماره گیرنده در لیست غیرفعال اپراتور قرار دارد.',
        self::INACTIVE_RECIPIENT_OPERATOR => 'شماره گیرنده بر اساس پیش شماره در حال حاضر در مگفا مسدود می‌باشد.',
        self::BLOCKED_IP => 'این آی پی اجازه دسترسی به سرویس مورد نظر را ندارد.',
        self::BIG_BODY => 'تعداد بخش‌های پیامک بیش از حد مجاز (۲۵۶) است.',
    ];
    const OTHERS = [
        3, 4, 6, 10, 13, 20, 22, 24, 25,
        101, 102, 103, 104, 105, 106, 107, 108, 109, 110
    ];
}