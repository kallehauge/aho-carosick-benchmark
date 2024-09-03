<?php

namespace Kallehauge\AhoCorasick\Strategy\Position;

use Kallehauge\AhoCorasick\Strategy\MatchingStrategy;

/**
 * Class SimpleIterator.
 *
 * Will return an array of all (possibly duplicate) matches with their position in the text:
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
class SimpleIterator implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matches = [];
		$test    = mb_strtolower( $text );

		foreach ( $keywords as $keyword ) {
			$offset = 0;
			while ( ( $pos = mb_strpos( $test, $keyword, $offset ) ) !== false ) {
				$matches[] = [
					$pos,
					mb_substr( $test, $pos, mb_strlen( $keyword ) ),
				];
				$offset    = $pos + 1;
			}
		}

		usort( $matches, function ( $a, $b ) {
			return $a[0] <=> $b[0];
		} );

		return $matches;
	}
}
