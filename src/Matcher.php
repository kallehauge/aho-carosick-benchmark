<?php

namespace Kallehauge\AhoCorasick;

use Kallehauge\AhoCorasick\Strategy\MatchingStrategy;
use Kallehauge\AhoCorasick\Strategy\MatchingStrategyType;
use Kallehauge\AhoCorasick\Strategy\Position\AhoCorasick as AhoCorasickPosition;
use Kallehauge\AhoCorasick\Strategy\Position\SimpleIterator as SimpleIteratorPosition;
use Kallehauge\AhoCorasick\Strategy\Unique\AhoCorasick as AhoCorasickUnique;
use Kallehauge\AhoCorasick\Strategy\Unique\AhoCorasickProcessed as AhoCorasickUniqueProcessed;
use Kallehauge\AhoCorasick\Strategy\Unique\SimpleIterator as SimpleIteratorUnique;

class Matcher {
	private MatchingStrategy $strategy;

	public function __construct( string $strategyType ) {
		$enumStrategy = MatchingStrategyType::tryFrom( $strategyType );

		if ( $enumStrategy === null ) {
			throw new \InvalidArgumentException( sprintf( 'Invalid strategy: %s', $strategyType ) );
		}

		$this->strategy = match ( $enumStrategy ) {
			MatchingStrategyType::AHO_CORASICK_POSITION => new AhoCorasickPosition(),
			MatchingStrategyType::AHO_CORASICK_UNIQUE => new AhoCorasickUnique(),
			MatchingStrategyType::AHO_CORASICK_UNIQUE_PROCESSED => new AhoCorasickUniqueProcessed(),
			MatchingStrategyType::SIMPLE_ITERATOR_POSITION => new SimpleIteratorPosition(),
			MatchingStrategyType::SIMPLE_ITERATOR_UNIQUE => new SimpleIteratorUnique(),
		};
	}

	public function start( array $keywords, string $text ): Report {
		$report = new Report();

		$report->set_start_time( self::get_microtime() );
		$report->set_start_memory_usage( self::get_memory_usage() );

		$this->strategy->match( $keywords, $text );

		$report->set_end_memory_usage( self::get_memory_usage() );
		$report->set_end_time( self::get_microtime() );

		return $report;
	}

	private static function get_microtime() {
		return microtime( true );
	}

	private static function get_memory_usage() {
		return memory_get_usage( true );
	}
}
