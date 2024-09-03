<?php

namespace Kallehauge\AhoCorasick\Strategy\Position;

use AhoCorasick\MultiStringMatcher;
use Kallehauge\AhoCorasick\Strategy\MatchingStrategy;

/**
 * Class AhoCorasick.
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
class AhoCorasick implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matcher = new MultiStringMatcher( $keywords );

		return $matcher->searchIn( mb_strtolower( $text ) );
	}
}
