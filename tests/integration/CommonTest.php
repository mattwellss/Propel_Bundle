<?php
namespace Mattwellss\Propel_Bundle\Config;

use Aura\Di\ContainerBuilder;

class CommonTest extends \PHPUnit_Framework_TestCase
{
    public function testPropelIntegration()
    {
        $builder = new ContainerBuilder();
        $di = $builder->newConfiguredInstance(
            [
                'Mattwellss\Propel_Bundle\Config\Common',
                'Mattwellss\Dummy\Config\Common'
            ]
        );

        $serviceContainer = $di->get('mattwellss/propel:service-container');

        // ensure that the adapter gets set on the service container
        $this->assertNotNull($serviceContainer->getAdapter('test'));
    }
}
