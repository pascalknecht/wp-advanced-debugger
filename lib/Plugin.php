<?php

namespace WPDebugger;

final class Plugin
{
    /**
     * Execution function which is called after the class has been initialized.
     * This contains hook and filter assignments, etc.
     */
    public function run()
    {
        add_action('all', [$this, 'logHooks']);
    }

    /**
     * Logs all the hooks which get fired and output them to a log file
     *
     * @param mixed ...$args
     */
    public function logHooks(...$args)
    {
        global $wp_filter;
        $hook_name = $args[0];
        $hooks = isset($wp_filter[$hook_name]) ? $wp_filter[$hook_name] : [];

        ob_start();
        var_export($hooks);
        $dump = ob_get_clean();

        $log  = "IP: ".$_SERVER['REMOTE_ADDR'].' - '. date("F j, Y, g:i a") . PHP_EOL.
            "Hook: " . $hook_name . PHP_EOL.
            "Hooked Functions: " . $dump . PHP_EOL.
            "-------------------------".PHP_EOL;

        $logfile = WP_DEBUGGER_DIR . './logs/log_'.date("j.n.Y").'.log';

        file_put_contents($logfile, $log, FILE_APPEND);
    }

    /**
     * Load translation files from the indicated directory.
     */
    public function loadPluginTextdomain()
    {
        load_plugin_textdomain('wk-starter-plugin', false, basename(dirname(__FILE__, 2)) . '/languages');
    }
}
