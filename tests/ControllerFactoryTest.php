<?php
namespace Aura\Web;
use Aura\Di\Config;
use Aura\Di\Forge;

/**
 * Test class for ControllerFactory.
 * Generated by PHPUnit on 2011-03-19 at 15:01:06.
 */
class ControllerFactoryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ControllerFactory
     */
    protected $factory;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        parent::setUp();
    }

    protected function newFactory($map = null, $not_found = null)
    {
        return new ControllerFactory(
            new Forge(new Config),
            $map,
            $not_found
        );
    }
    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @todo Implement testNewInstance().
     */
    public function testNewInstance()
    {
        $factory = $this->newFactory(array('mock' => 'Aura\Web\MockController'));
        $name = 'mock';
        $params = array();
        $controller = $factory->newInstance($name, $params);
        $this->assertType('Aura\Web\MockController', $controller);
    }
    
    public function testNewInstanceNotFound()
    {
        $factory = $this->newFactory(array(), 'Aura\Web\MockController');
        $name = 'no-such-name';
        $params = array();
        $controller = $factory->newInstance($name, $params);
        $this->assertType('Aura\Web\MockController', $controller);
    }
    
    /**
     * @expectedException \Aura\Web\Exception\NoClassForController
     */
    public function testNewInstanceException()
    {
        $factory = $this->newFactory();
        $name = 'no-such-name';
        $params = array();
        $controller = $factory->newInstance($name, $params);
    }
}