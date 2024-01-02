<?php

use Carbon\Carbon;

if (! function_exists('carbon')) {
    /**
     * Create a new Carbon instance
     *
     * @return Carbon
     */
    function carbon()
    {
        return new Carbon();
    }
}


if (! function_exists('responder')) {
    /**
     * Get custom response utility
     *
     * @return \App\Utils\ResponseUtility
     */
    function responder()
    {
        return app('responder');
    }
}


if (! function_exists('hasIncludeRequest')) {
    /**
     * Check include query param has key
     *
     * @param $key
     * @return bool|false
     */
    function hasIncludeRequest($key)
    {
        return in_array($key, explode(',', request()->get('include')), true);
    }
}

if (! function_exists('getIncludeRequest')) {
    /**
     * Get combine include request
     *
     * @param array $defaultInclude
     * @return array
     */
    function getIncludeRequest(array $defaultInclude = []): array
    {
        $queryIncludeParams = request()->has('include') ? explode(',', request()->get('include')) : [];
        return array_unique(array_merge($queryIncludeParams, $defaultInclude));
    }
}

if (! function_exists('throwIf')) {
    /**
     * @param $condition
     * @param $errorConfigKey
     * @throws Throwable
     */
    function throwIf($condition, $errorConfigKey)
    {
        throw_if($condition, new \App\Exceptions\GeneralException(is_array(config("error.$errorConfigKey")) ? config("error.$errorConfigKey") : $errorConfigKey));
    }
}