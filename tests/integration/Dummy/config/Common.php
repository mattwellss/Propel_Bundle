<?php

namespace Mattwellss\Dummy\Config;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Common extends ContainerConfig
{
    public function define(Container $di)
    {
        $di->get('mattwellss/propel:service-container')
            ->setAdapterClass('test', 'sqlite');
        $di->values['mattwellss/propel:configuration'] = [
            'dsn' => 'sqlite::memory:'
        ];
        $di->values['mattwellss/propel:connection-name'] = 'test';
    }

    public function modify(Container $di)
    {
    }
}
