<?php

namespace Kallehauge\AhoCorasick\Strategy\Unique;

use Kallehauge\AhoCorasick\Strategy\MatchingStrategy;

/**
 * Class SimpleIterator.
 *
 * Will return a flat array of unique matches.
 *
 * Example:
 *    array(
 *      'herb' => 'herb',
 *      'hello' => 'hello',
 *    );
 */
class SimpleIterator implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matches = [];
		$text    = mb_strtolower( $text );

		foreach ( $keywords as $keyword ) {
			if ( false !== mb_strpos( $text, $keyword ) ) {
				$matches[ $keyword ] = $keyword;
			}
		}

		return $matches;
	}
}
