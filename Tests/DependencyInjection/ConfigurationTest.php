<?php
/*
* This file is part of the ML\PostMasterBundle
*
* (c) Lasri Mehdi <lasri.mehdi@gmail.com>
*
* This source file is subject to the MIT license that is bundled
* with this source code in the file LICENSE.
*/
namespace ML\PostMasterBundle\Tests\DependencyInjection;
use ML\PostMasterBundle\DependencyInjection\Configuration;
/**
* Test Configuration
*
* @author Lasri Mehdi <lasri.mehdi@gmail.com>
*/
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
/**
* Test get config tree
*
* @covers ML\PostMasterBundle\DependencyInjection\Configuration::getConfigTreeBuilder
*/
public function testThatCanGetConfigTreeBuilder()
{
$configuration = new Configuration();
$this->assertInstanceOf('Symfony\Component\Config\Definition\Builder\TreeBuilder', $configuration->getConfigTreeBuilder());
}
}
