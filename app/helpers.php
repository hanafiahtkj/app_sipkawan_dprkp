<?php

/*
 *
 * Return Date with weekday
 *
 * ------------------------------------------------------------------------
 */
if (! function_exists('date_today')) {

    /**
     * Return Date with weekday.
     *
     * Carbon Locale will be considered here
     * Example:
     * শুক্রবার, ২৪ জুলাই ২০২০
     * Friday, July 24, 2020
     */
    function date_today()
    {
        $str = \Carbon\Carbon::now()->isoFormat('dddd, LL');

        return $str;
    }
}
