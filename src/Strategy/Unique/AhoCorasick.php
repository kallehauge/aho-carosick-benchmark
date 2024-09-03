<?php

namespace Kallehauge\AhoCorasick\Strategy\Unique;

use Kallehauge\AhoCorasick\Algorithm\AhoCorasickUnique;
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
class AhoCorasick implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matcher = new AhoCorasickUnique( $keywords );
		return $matcher->searchIn( mb_strtolower( $text ) );
	}
}
