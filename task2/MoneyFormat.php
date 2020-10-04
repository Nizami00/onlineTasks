<?php

class MoneyFormat
{
    public static function convertMoney($money): string
    {
        $fmt = numfmt_create( 'en_EN', NumberFormatter::CURRENCY );
        return numfmt_format_currency($fmt, $money / 100, "EUR");
    }


}