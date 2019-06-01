<?php
/**
 * Created by PhpStorm.
 * User: Bibek
 * Date: 4/26/2019
 * Time: 12:37 PM
 */

namespace App\General;

use Illuminate\Support\Facades\Config;

trait General
{
    public $data = [];

    public function data($key, $value = null)
    {
        return $this->data[$key] = $value;

    }

    public function setTitle($backend, $separator = '->', $frontend = null)
    {
        if (!isset($frontend)) {
            $frontend = Config::get('title.title');
        }
        return $frontend . $separator . $backend;

    }
}