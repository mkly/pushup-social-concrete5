<?php
use Concrete\Package\PushupSocial\Src\PushupSocial\Configuration\Configuration;

class ConfigurationTest extends PHPUnit_Framework_TestCase
{

    protected function setUp()
    {
        $this->config = $this->getMockBuilder('\Concrete\Core\Config\Repository\Liaison')
                             ->setMethods(array('get', 'save'))
                             ->getMock();
    }

    public function testIsEnabled()
    {
        $this->config->method('get')
                     ->will($this->returnValue(true));

        $config = new Configuration($this->config);

        $this->assertTrue($config->isEnabled());
    }

    public function testGetCommunityId()
    {
        $this->config->method('get')
                     ->will($this->returnValue('1234567890'));

        $config = new Configuration($this->config);

        $this->assertEquals('1234567890', $config->getCommunityId());
    }
}
