<?php
/*
* This file is part of the ML\PostMasterBundle
*
* (c) Lasri Mehdi <lasri.mehdi@gmail.Com>
*
* This source file is subject to the MIT license that is bundled
* with this source code in the file LICENSE.
*/
namespace ML\PostMasterBundle\Tests\DependencyInjection;
use ML\PostMasterBundle\DependencyInjection\MLPostMasterExtension;
/**
* Test MLPostMasterExtension
*
* @author Lasri Mehdi <lasri.mehdi@gmail.Com>
*/
class MLPostMasterExtensionTest extends \PHPUnit_Framework_TestCase
{
/**
* Test load failed
*
* @covers ML\PostMasterBundle\DependencyInjection\MLPostMasterExtension::load
*/
public function testLoadFailed()
{
$container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
->disableOriginalConstructor()
->getMock();
$extension = $this->getMockBuilder('ML\PostMasterBundle\DependencyInjection\MLPostMasterExtension')
->getMock();
$extension->load(array(array()), $container);
}
/**
* Test setParameters
*
* @covers ML\PostMasterBundle\DependencyInjection\MLPostMasterExtension::load
*/
public function testLoadSetParameters()
{
$container = $this->getMockBuilder('Symfony\\Component\\DependencyInjection\\ContainerBuilder')
->disableOriginalConstructor()
->getMock();
$parameterBag = $this->getMockBuilder('Symfony\Component\DependencyInjection\ParameterBag\\ParameterBag')
->disableOriginalConstructor()
->getMock();
$parameterBag->expects($this->any())
->method('add');
$container->expects($this->any())
->method('getParameterBag')
->will($this->returnValue($parameterBag));
$extension = new MLPostMasterExtension();
$configs = array(array('api_key' => 'foo'),);
$extension->load($configs, $container);
}
}