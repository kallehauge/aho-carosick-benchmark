<?php

namespace Kallehauge\AhoCorasick\Strategy;

enum MatchingStrategyType: string {
	case AHO_CORASICK = 'aho-corasick';
	case AHO_CORASICK_UNIQUE = 'aho-corasick-unique';
	case SIMPLE_ITERATOR_POSITION = 'simple-iterator-position';
	case SIMPLE_ITERATOR_UNIQUE = 'simple-iterator-unique';
}
