<?php
namespace Mattwellss\Propel_Bundle\_Config;

use Aura\Di\ContainerBuilder;

class CommonTest extends \PHPUnit_Framework_TestCase
{
    public function testPropelIntegration()
    {
        $builder = new ContainerBuilder();
        $di = $builder->newInstance(
            [],
            [
                'Mattwellss\Propel_Bundle\_Config\Common',
                'Mattwellss\Dummy\_Config\Common'
            ]
        );

        $serviceContainer = $di->get('mattwellss/propel:service-container');

        // ensure that the adapter gets set on the service container
        $this->assertNotNull($serviceContainer->getAdapter('test'));
    }
}
