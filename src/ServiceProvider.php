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

use EaseBaidu\Service\Bear\Application as Bear;
use Laravel\Lumen\Application as LumenApplication;
use EaseBaidu\Service\BearTP\Application as BearTp;
use EaseBaidu\Service\Payment\Application as Payment;
use EaseBaidu\Service\SmartTP\Application as SmartProgramTp;
use Illuminate\Foundation\Application as LaravelApplication;
use EaseBaidu\Service\SmartProgram\Application as SmartProgram;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

/**
 * Class ServiceProvider.
 *
 * @author zacksleo <zacksleo@gmail.com>
 */
class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config.php');

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('baidu.php')], 'laravel-baidu');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('baidu');
        }

        $this->mergeConfigFrom($source, 'baidu');
    }

    /**
     * Register the provider.
     */
    public function register()
    {
        $this->setupConfig();

        $apps = [
            'bear' => Bear::class,
            'bear_tp' => BearTp::class,
            'smart_program' => SmartProgram::class,
            'smart_program_tp' => SmartProgramTp::class,
            'payment' => Payment::class,
        ];

        foreach ($apps as $name => $class) {
            if (empty(config('baidu.'.$name))) {
                continue;
            }

            if (! empty(config('baidu.'.$name.'.app_id'))) {
                $accounts = [
                    'default' => config('baidu.'.$name),
                ];
                config(['baidu.'.$name.'.default' => $accounts['default']]);
            } else {
                $accounts = config('baidu.'.$name);
            }

            foreach ($accounts as $account => $config) {
                $this->app->singleton("baidu.{$name}.{$account}", function ($laravelApp) use ($name, $account, $config, $class) {
                    $app = new $class(array_merge(config('baidu.defaults', []), $config));
                    if (config('baidu.defaults.use_laravel_cache')) {
                        $app['cache'] = $laravelApp['cache.store'];
                    }
                    $app['request'] = $laravelApp['request'];

                    return $app;
                });
            }
            $this->app->alias("baidu{$name}.default", 'baidu.'.$name);
            $this->app->alias("baidu{$name}.default", 'easebaidu.'.$name);

            $this->app->alias('baidu.'.$name, $class);
            $this->app->alias('easebaidu.'.$name, $class);
        }
    }
}
