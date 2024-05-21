<?php
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('getAllCountries')) {
    function getAllCountries()
    {
        return include(config_path('countries.php'));
    }
}

/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('getCountry')) {
    function getCountry($code)
    {
        $countries = include(config_path('countries.php'));

        return isset($countries[$code]) ? $countries[$code] : null;
    }
}
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('getAllCurrency')) {
    function getAllCurrency()
    {
        return include(config_path('currency.php'));
    }
}
/**
 * Write code on Method
 *
 * @return response()
 */
if (! function_exists('getCurrency')) {
    function getCurrency($code)
    {
        $currency = include(config_path('currency.php'));
        return isset($currency[$code]) ? $currency[$code] : null;
    }
}