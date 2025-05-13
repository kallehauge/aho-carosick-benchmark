<?php

namespace Kallehauge\AhoCorasick;

class Reporter {
	/**
	 * @var array<int, Report[]>
	 */
	private array $grouped_reports;

	private string $strategy;

	/**
	 * Construct.
	 *
	 * @param Report[] $reports
	 * @param string $strategy
	 */
	public function __construct( array $reports, string $strategy ) {
		$this->strategy = $strategy;
		$this->prepare_reports( $reports );
	}

	/**
	 * Group reports and prepare them for usage.
	 *
	 * @param Report[] $reports
	 * @return void
	 */
	private function prepare_reports( array $reports ): void {
		$this->grouped_reports = [];

		foreach ( $reports as $report ) {
			$keyword_count = $report->get_keyword_count();
			if ( ! isset( $this->grouped_reports[ $keyword_count ] ) ) {
				$this->grouped_reports[ $keyword_count ] = [];
			}
			$this->grouped_reports[ $keyword_count ][] = $report;
		}

		ksort( $this->grouped_reports );
	}

	public function report(): void {
		if ( empty( $this->grouped_reports ) ) {
			echo "No reports available.\n";

			return;
		}

		// Begin reporting in markdown formatting.
		printf( "#### Strategy: %s\n", $this->strategy );
		printf( "_Each \"test\" ran **%d** times to then calculate the average result._\n", count( current( $this->grouped_reports ) ) );

		// Report memory usage for 1 iteration (in KB).
		// This will periodically be inaccurate due to PHP's garbage collection which is why
		// the first iteration is often the most accurate for memory usage.
		// This is only used for development to ensure the implementations are done correctly.
		// $first_group = reset( $this->grouped_reports );
		// $first_report = reset( $first_group );
		// printf( "Memory usage: %s\n", self::format_memory_as_kb( $first_report->get_memory_usage() ) );

		// Create markdown table header
		echo "| Keywords | Execution Time |\n";
		echo "|----------|-------------------|\n";

		foreach ( $this->grouped_reports as $keyword_count => $group_reports ) {
			$entries_count = count( $group_reports );
			$total_execution_time = 0;
			foreach ( $group_reports as $report ) {
				$total_execution_time += $report->get_execution_time_in_milliseconds();
			}

			printf(
				"| %d | %s ms |\n",
				$keyword_count,
				number_format( $total_execution_time / $entries_count, 2 )
			);
		}
	}

	public static function format_memory_as_kb( $memory ) {
		return number_format( $memory / 1024, 2 ) . " KB";
	}
}
