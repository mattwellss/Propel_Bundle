<?php
namespace Mattwellss\Propel_Bundle\Config;

use Aura\Di\Container;
use Aura\Di\ContainerConfig;

class Common extends ContainerConfig
{
    public function define(Container $di)
    {
        $di->set('mattwellss/propel:service-container',
            $di->lazyNew('Propel\Runtime\ServiceContainer\StandardServiceContainer'));

        $di->set('mattwellss/propel:connection-manager',
            $di->lazyNew('Propel\Runtime\Connection\ConnectionManagerSingle'));
    }

    public function modify(Container $di)
    {
        $serviceContainer = $di->get('mattwellss/propel:service-container');
        $manager = $di->get('mattwellss/propel:connection-manager');

        $manager->setConfiguration(
            $di->lazyValue('mattwellss/propel:configuration')->__invoke());
        $serviceContainer->setConnectionManager(
            $di->lazyValue('mattwellss/propel:connection-name')->__invoke(), $manager);

        \Propel\Runtime\Propel::setServiceContainer($serviceContainer);
    }
}
