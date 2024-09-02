<?php

namespace Kallehauge\AhoCorasick;

/**
 * Class Matcher.
 *
 * Our matches will be returned as an array of arrays that contains two keys:
 *   0: The location of the match inside the text.
 *   1: The loose string match (e.g. the keyword "he" will return "herb").
 *
 * Example:
 *   array(
 *     0 = array(
 *        0 => 1234,
 *        1 => herb,
 *     ),
 *     1 = array(
 *        0 => 2000,
 *        1 => hello,
 *     ),
 *   );
 */
class Matcher {
	public static function start( $keywords, $text ): Report {
		$report = new Report();

		$report->set_start_time( self::get_microtime() );
		$report->set_start_memory_usage( self::get_memory_usage() );

		// Initiate the Aho-Corasick matcher.
		$matcher  = new \AhoCorasick\MultiStringMatcher( $keywords );

		// The Aho-Corasick comparison library is case-sensitive, so we have to lowercase
		// the text before parsing it.
		$all_matches = $matcher->searchIn( mb_strtolower( $text ) );

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