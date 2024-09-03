<?php

namespace Kallehauge\AhoCorasick\Algorithm;

use AhoCorasick\MultiStringMatcher;

/**
 * Class AhoCorasickUnique.
 *
 * We extend the MultiStringMatcher class to modify the return value to be a flat array of unique matches. By doing this
 * way, we don't have to iterate through the matches to remove duplicates, and therefore we can improve the performance.
 *
 * @see MultiStringMatcher
 */
class AhoCorasickUnique extends MultiStringMatcher {
	public function searchIn( $text ) {
		if ( ! $this->searchKeywords || $text === '' ) {
			return [];
		}

		$state   = 0;
		$results = [];
		$length  = strlen( $text );

		for ( $i = 0; $i < $length; $i ++ ) {
			$ch = $text[ $i ];
			$state = $this->nextState( $state, $ch );
			foreach ( $this->outputs[ $state ] as $match ) {
				$results[ $match ] = $match;
			}
		}

		return $results;
	}
}
