<?php

namespace militska\SBAcquiringApi\src;


/***
 * Class BaseDto
 */
class BaseDto
{
    /***
     * BaseDto constructor.
     * @param $params
     */
    public function __construct($params = null)
    {
        if ($params) {
            foreach ($params as $attribute => $value) {
                $this->{$attribute} = $value;
            }
        }
    }
}