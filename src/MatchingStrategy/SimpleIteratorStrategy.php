<?php

namespace Kallehauge\AhoCorasick\MatchingStrategy;

class SimpleIteratorStrategy implements MatchingStrategy {
	public function match( array $keywords, string $text ): array {
		$matches       = [];
		$lowercaseText = mb_strtolower( $text );

		foreach ( $keywords as $keyword ) {
			$offset = 0;
			while ( ( $pos = mb_strpos( $lowercaseText, mb_strtolower( $keyword ), $offset ) ) !== false ) {
				$matches[] = [
					$pos,
					mb_substr( $text, $pos, mb_strlen( $keyword ) ),
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
