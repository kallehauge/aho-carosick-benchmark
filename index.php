<?php

namespace Kallehauge\AhoCorasick;

use Kallehauge\AhoCorasick\Strategy\MatchingStrategyType;

require_once __DIR__ . '/vendor/autoload.php';

$keyword_limit_option = '--keyword-limit=';
$keyword_limits = [ 50, 500, 1000 ];
foreach ( $argv as $argument ) {
	if ( strpos( $argument, $keyword_limit_option ) === 0 ) {
		$keyword_limits = [ (int) substr( $argument, strlen( $keyword_limit_option ) ) ];
		$argv = array_values( array_filter( $argv, function( $current_argument ) use ( $argument ) {
			return $current_argument !== $argument;
		} ) );
		break;
	}
}
$strategy   = isset( $argv[1] ) ? (string) $argv[1] : 'aho-corasick';
$test_type  = isset( $argv[2] ) ? (string) $argv[2] : 'mobydick';
$iterations = isset( $argv[3] ) ? (int) $argv[3] : 1;

if ( $strategy === 'all' ) {
	foreach ( MatchingStrategyType::cases() as $strategy_enum ) {
		$reports = [];
		$matcher = new Matcher( $strategy_enum->value );
		for ( $i = 0; $i < $iterations; $i++ ) {
			foreach( $keyword_limits as $keyword_limit ) {
				$reports[] = $matcher->start( KeywordsLibrary::get( 'all', $keyword_limit ), TextLibrary::get( $test_type ) );
			}
		}

		( new Reporter( $reports, $strategy_enum->value ) )->report();
	}
} else {
	$reports = [];
	$matcher = new Matcher( $strategy );
	for ( $i = 0; $i < $iterations; $i++ ) {
		foreach( $keyword_limits as $keyword_limit ) {
			$reports[] = $matcher->start( KeywordsLibrary::get( 'all', $keyword_limit ), TextLibrary::get( $test_type ) );
		}
	}

	( new Reporter( $reports, $strategy ) )->report();
}
