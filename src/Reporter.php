<?php

namespace Kallehauge\AhoCorasick;

class Reporter {
	/**
	 * @param Report[] $reports
	 */
	public static function report( array $reports, string $strategy ): void {
		if ( empty( $reports ) ) {
			echo "No reports available.\n";

			return;
		}

		// Begin reporting in markdown formatting.
		printf( "#### Strategy: %s\n", $strategy );
		echo "```\n";

		$reports_count = count( $reports );

		// Accumulate the average execution time.
		$total_execution_time = 0;
		foreach ( $reports as $report ) {
			$total_execution_time += $report->get_execution_time_in_milliseconds();

			if ( 1 === $reports_count ) {
				printf(
					"Execution time: %s milliseconds\n",
					number_format( $report->get_execution_time_in_milliseconds(), 2 )
				);
			}
		}

		// Report memory usage for 1 iteration (in KB).
		// This will periodically be inaccurate due to PHP's garbage collection which is why
		// the first iteration is often the most accurate for memory usage.
		// The processing times doesn't seem to be affected by this, though.
		printf( "Memory usage: %s\n", self::format_memory_as_kb( $reports[0]->get_memory_usage() ) );

		if ( $reports_count > 1 ) {
			// Report average execution time (in MS).
			printf(
				"Average execution time: %s milliseconds\n",
				number_format( $total_execution_time / count( $reports ), 2 )
			);
		}

		echo "```\n";
	}

	public static function format_memory_as_kb( $memory ) {
		return number_format( $memory / 1024, 2 ) . " KB";
	}
}
