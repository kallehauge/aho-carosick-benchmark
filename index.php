<?php

namespace Kallehauge\AhoCorasick;

require_once __DIR__ . '/vendor/autoload.php';


$test_type = isset( $argv[1] ) ? (string) $argv[1] : 'mobydick';
$iterations = isset( $argv[2] ) ? (int) $argv[2] : 1;

$reports = array();
for ( $i = 0; $i < $iterations; $i++ ) {
	$reports[] = Matcher::start( KeywordsLibrary::get(), TextLibrary::get( $test_type ) );
}

Reporter::report( $reports );
