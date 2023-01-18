<?php
class DateTimeHelper
{
    /**
     * Convert string date time to string date
     * @param [type] $strDateTime
     * @return void
     */
    public static function ConvertStringDateTimeToStringDate($strDate)
    {
        $timestamp = strtotime($strDate);
        $date      = date("Y-m-d", $timestamp);
        return $date;
    }

    /**
     * Convert system date time to string date time
     * @return string
     */
    public static function ConvertDateTimeToStringDateTime(): string
    {
        //$test = Current_timestamp();
        //$dateTest = new DateTime(timezone:new DateTimeZone('Europe/Amsterdam'));
        date_default_timezone_set('Europe/Amsterdam');
        $strDateTime = date("Y-m-d H:i:s", strtotime('NOW'));
        return $strDateTime;
    }
}
