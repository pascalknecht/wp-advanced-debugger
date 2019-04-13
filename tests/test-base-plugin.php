<?php
/**
 * Class BasePluginTest
 */

class BasePluginTest extends WP_UnitTestCase {
    function testPluginInstances()
    {
        $plugin = WebKinder\StarterPlugin\PluginFactory::create();
        $this->assertEquals($plugin, WebKinder\StarterPlugin\PluginFactory::create());
    }
}
