<?php

namespace Kallehauge\AhoCorasick\MatchingStrategy;

interface MatchingStrategy {
	public function match( array $keywords, string $text ): array;
}
