<?php

namespace Kallehauge\AhoCorasick\MatchingStrategy;

use AhoCorasick\MultiStringMatcher;

/**
 * Class AhoCorasickStrategy.
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
class AhoCorasickStrategy implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matcher = new MultiStringMatcher( $keywords );

		return $matcher->searchIn( mb_strtolower( $text ) );
	}
}
