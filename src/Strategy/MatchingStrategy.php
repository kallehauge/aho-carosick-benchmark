<?php

namespace Kallehauge\AhoCorasick\Strategy;

interface MatchingStrategy {
	public function match( array $keywords, string $text ): array;
}
