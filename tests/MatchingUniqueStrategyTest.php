<?php

namespace Kallehauge\AhoCorasick\Tests;

use Kallehauge\AhoCorasick\Strategy\Unique\AhoCorasick;
use Kallehauge\AhoCorasick\Strategy\Unique\AhoCorasickProcessed;
use Kallehauge\AhoCorasick\Strategy\Unique\SimpleIterator;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;

class MatchingUniqueStrategyTest extends TestCase {
	public static function strategyClassProvider(): array {
		return [
			[ AhoCorasick::class ],
			[ AhoCorasickProcessed::class ],
			[ SimpleIterator::class ],
		];
	}

	#[DataProvider( 'strategyClassProvider' )]
	public function testUniqueMatchingStrategies( $strategyClass ) {
		$strategy = new $strategyClass();
		$keywords = [ 'he', 'she', 'his', 'hers' ];
		$text     = 'She was sure that he was there with his dog. Meanwhile, hers was at home.';

		$matches = $strategy->match( $keywords, $text );
		$this->assertEquals(
			[
				'she'  => 'she',
				'he'   => 'he',
				'his'  => 'his',
				'hers' => 'hers',
			],
			$matches
		);
	}
}
