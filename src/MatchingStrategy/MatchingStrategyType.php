<?php

namespace Kallehauge\AhoCorasick\MatchingStrategy;

enum MatchingStrategyType: string {
	case AHO_CORASICK = 'aho-corasick';
	case SIMPLE_ITERATOR = 'simple-iterator';
}
