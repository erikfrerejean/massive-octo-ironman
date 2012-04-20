<?php

define('IN_PHPBB', true);
define('PHPBB_TESTS', __DIR__ . '/phpBB/tests/');
$phpbb_root_path = __DIR__ . '/phpBB/phpBB/';
$phpEx = 'php';

require_once PHPBB_TESTS . 'test_framework/phpbb_test_case_helpers.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_test_case.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_database_test_case.php';
require_once PHPBB_TESTS . 'test_framework/phpbb_database_test_connection_manager.php';
