<?php

namespace Kallehauge\AhoCorasick\Tests;

use Kallehauge\AhoCorasick\Strategy\Position\AhoCorasick;
use Kallehauge\AhoCorasick\Strategy\Position\SimpleIterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchingPositionStrategyTest extends TestCase {
	public static function strategyClassProvider(): array {
		return [
			[ AhoCorasick::class ],
			[ SimpleIterator::class ],
		];
	}

	#[DataProvider( 'strategyClassProvider' )]
	public function testMatchingStrategies( $strategyClass ) {
		$strategy = new $strategyClass();
		$keywords = [ 'he', 'she', 'his', 'hers' ];
		$text     = 'She was sure that he was there with his dog. Meanwhile, hers was at home.';

		$matches = $strategy->match( $keywords, $text );
		$this->assertEquals(
			$matches,
			[
				[ 0, 'she' ],
				[ 1, 'he' ],
				[ 18, 'he' ],
				[ 26, 'he' ],
				[ 36, 'his' ],
				[ 56, 'he' ],
				[ 56, 'hers' ],
			]
		);
	}
}
