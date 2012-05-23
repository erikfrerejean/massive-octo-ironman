<?php

define('IN_PHPBB', true);
define('PHPBB_TESTS', dirname(__FILE__) . '/phpBB/tests/');
$phpbb_root_path = dirname(__FILE__) . '/phpBB/phpBB/';
$phpEx = 'php';

require_once PHPBB_TESTS . 'test_framework/phpbb_test_case_helpers.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_test_case.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_database_test_case.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_database_test_connection_manager.php';
