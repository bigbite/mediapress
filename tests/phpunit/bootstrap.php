<?php

declare( strict_types = 1 );

/**
 * Setup PHP for PHPUnit
 */
ini_set( 'memory_limit', '-1' );
ini_set( 'error_reporting', '-1' );
ini_set( 'log_errors_max_len', '0' );
ini_set( 'zend.assertions', '1' );
ini_set( 'assert.exception', '1' );
ini_set( 'xdebug.show_exception_trace', '0' );

/**
 * Autoload here, if necessary.
 */
