<?php

namespace WPDebugger;

final class PluginFactory
{
    public static function create()
    {
        static $plugin = null;

        if ($plugin === null) {
            $plugin = new Plugin();
        }

        return $plugin;
    }
}
