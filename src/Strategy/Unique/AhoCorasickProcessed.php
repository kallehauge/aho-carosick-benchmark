<?php

namespace Kallehauge\AhoCorasick\Strategy\Unique;

use AhoCorasick\MultiStringMatcher;
use Kallehauge\AhoCorasick\Strategy\MatchingStrategy;

/**
 * Class AhoCorasick.
 *
 * Will return a flat array of unique matches.
 *
 * Example:
 *    array(
 *      'herb' => 'herb',
 *      'hello' => 'hello',
 *    );
 */
class AhoCorasickProcessed implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matcher = new MultiStringMatcher( $keywords );
		$matches = $matcher->searchIn( mb_strtolower( $text ) );

		$unique_matches = [];
		foreach ( $matches as $match ) {
			$keyword                    = $match[1];
			$unique_matches[ $keyword ] = $keyword;
		}

		return $unique_matches;
	}
}
