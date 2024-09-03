<?php

namespace Kallehauge\AhoCorasick;

require_once __DIR__ . '/vendor/autoload.php';

$strategy   = isset( $argv[1] ) ? (string) $argv[1] : 'ahocaroasick';
$test_type  = isset( $argv[2] ) ? (string) $argv[2] : 'mobydick';
$iterations = isset( $argv[3] ) ? (int) $argv[3] : 1;

$matcher = new Matcher( $strategy );
$reports = array();
for ( $i = 0; $i < $iterations; $i ++ ) {
	$reports[] = $matcher->start( KeywordsLibrary::get(), TextLibrary::get( $test_type ) );
}

Reporter::report( $reports );
