<?php

namespace Kallehauge\AhoCorasick;

use Kallehauge\AhoCorasick\Strategy\MatchingStrategyType;

require_once __DIR__ . '/vendor/autoload.php';

$strategy   = isset( $argv[1] ) ? (string) $argv[1] : 'aho-corasick';
$test_type  = isset( $argv[2] ) ? (string) $argv[2] : 'mobydick';
$iterations = isset( $argv[3] ) ? (int) $argv[3] : 1;

if ( $strategy === 'all' ) {
	foreach ( MatchingStrategyType::cases() as $strategy_enum ) {
		$reports = [];
		$matcher = new Matcher( $strategy_enum->value );
		for ( $i = 0; $i < $iterations; $i ++ ) {
			$reports[] = $matcher->start( KeywordsLibrary::get(), TextLibrary::get( $test_type ) );
		}

		printf( "Strategy: %s\n", $strategy_enum->value );
		Reporter::report( $reports );
		echo "---------------------------------------\n";
	}
} else {
	$reports = [];
	$matcher = new Matcher( $strategy );
	for ( $i = 0; $i < $iterations; $i ++ ) {
		$reports[] = $matcher->start( KeywordsLibrary::get(), TextLibrary::get( $test_type ) );
	}

	printf( "Strategy: %s\n", $strategy );
	Reporter::report( $reports );
	echo "---------------------------------------\n";
}

