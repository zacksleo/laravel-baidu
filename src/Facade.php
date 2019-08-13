<?php
/*
 * This file is part of the zacksleo/laravel-baidu.
 *
 * (c) zacksleo <zacksleo@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Zacksleo\LaravelBaidu;

use Illuminate\Support\Facades\Facade as LaravelFacade;

/**
 * Class Facade.
 *
 * @author zacksleo <zacksleo@gmail.com>
 */
class Facade extends LaravelFacade
{
    /**
     * 默认为 Server.
     *
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'baidu.bear';
    }

    /**
     * @return \EaseBaidu\Service\Bear\Application
     */
    public static function bear($name = '')
    {
        return $name ? app('baidu.baar.'.$name) : app('baidu.bear');
    }

    /**
     * @return \EaseBaidu\Service\BearTP\Application
     */
    public static function bearTp($name = '')
    {
        return $name ? app('baidu.bear_tp.'.$name) : app('baidu.bear_tp');
    }

    /**
     * @return \EaseBaidu\Service\Payment\Application
     */
    public static function payment($name = '')
    {
        return $name ? app('baidu.payment.'.$name) : app('baidu.payment');
    }

    /**
     * @return \EaseBaidu\Service\SmartProgram\Application
     */
    public static function smartProgram($name = '')
    {
        return $name ? app('baidu.smart_program.'.$name) : app('baidu.smart_program');
    }

    /**
     * @return \EaseBaidu\Service\SmartTP\Application
     */
    public static function smartProgramTp($name = '')
    {
        return $name ? app('baidu.smart_program_tp.'.$name) : app('baidu.smart_program_tp');
    }
}
