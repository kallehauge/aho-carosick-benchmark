<?php

namespace Kallehauge\AhoCorasick;

use Kallehauge\AhoCorasick\MatchingStrategy\AhoCorasickStrategy;
use Kallehauge\AhoCorasick\MatchingStrategy\SimpleIteratorStrategy;
use Kallehauge\AhoCorasick\MatchingStrategy\MatchingStrategy;
use Kallehauge\AhoCorasick\MatchingStrategy\MatchingStrategyType;

class Matcher {
	private MatchingStrategy $strategy;

	public function __construct( string $strategyType ) {
		$enumStrategy = MatchingStrategyType::tryFrom( $strategyType );

		if ( $enumStrategy === null ) {
			throw new \InvalidArgumentException( sprintf( 'Invalid strategy: %s', $strategyType ) );
		}

		$this->strategy = match ( $enumStrategy ) {
			MatchingStrategyType::AHO_CORASICK => new AhoCorasickStrategy(),
			MatchingStrategyType::SIMPLE_ITERATOR => new SimpleIteratorStrategy(),
		};
	}

	public function start( array $keywords, string $text ): Report {
		$report = new Report();

		$report->set_start_time( self::get_microtime() );
		$report->set_start_memory_usage( self::get_memory_usage() );

		$all_matches = $this->strategy->match( $keywords, $text );

		$report->set_end_memory_usage( self::get_memory_usage() );
		$report->set_end_time( self::get_microtime() );
		$report->set_all_matches( $all_matches );

		return $report;
	}

	private static function get_microtime() {
		return microtime( true );
	}

	private static function get_memory_usage() {
		return memory_get_usage( true );
	}
}
