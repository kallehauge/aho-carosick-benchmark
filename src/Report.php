<?php

namespace Kallehauge\AhoCorasick;

class Report {
	private float $start_time;
	private int $start_memory_usage;
	private float $end_time;
	private int $end_memory_usage;
	private array $all_matches;

	public function set_start_time( float $time ): void {
		$this->start_time = $time;
	}

	public function set_start_memory_usage( int $usage ): void {
		$this->start_memory_usage = $usage;
	}

	public function set_end_time( float $time ): void {
		$this->end_time = $time;
	}

	public function set_end_memory_usage( int $usage ): void {
		$this->end_memory_usage = $usage;
	}

	public function set_all_matches( array $matches ): void {
		$this->all_matches = $matches;
	}

	public function get_all_matches():array {
		return $this->all_matches;
	}

	public function get_execution_time_in_microseconds(): float {
		return $this->end_time - $this->start_time;
	}

	public function get_execution_time_in_milliseconds(): float {
		return $this->get_execution_time_in_microseconds() * 1000;
	}

	public function get_memory_usage(): int {
		return $this->end_memory_usage - $this->start_memory_usage;
	}
}