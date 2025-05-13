# Aho-Corasick Performance Test

TL;DR: I had to find a way to efficiently search for multiple possible strings in a large text (specifically, keywords inside amongst product titles and descriptions).

So the mathematical challenge is an efficient way to address `O(n + m + z)` where `n` is the total length of keywords, `m` is the length of the text, and `z` number of matches found in the text.
Theoretically the Aho-Corasick string matching algorithm should one of (or _the_?) most efficient way to do this, so I spun up this very superficial benchmark to see what to expect in PHP - and thereby also implied how well the Wikimedia implementation of Aho-Corasick performs.

_You can find an "analysis" of these results here: [Native vs. Aho-Corasick in PHP: How Simplicity Sometimes Wins](https://andrekh.com/?p=548)_

## Results

If you're curious, then these were the results I got by running the test on my Macbook Pro M2 Pro while having several demanding programs running meanwhile the tests ran (like my IntelliJ IDE. If you know, you know).

Both [text libraries](src/TextLibrary.php) were parsed using the same [keyword library](src/KeywordLibrary.php) but with varying amount of keywords to look at how each method scales.

### Moby Dick

The Moby Dick book is ~1.2 MB aka 1,276,290 characters.

#### Strategy: aho-corasick-position
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 129.87 ms |
| 500 | 128.02 ms |
| 1000 | 130.64 ms |
#### Strategy: simple-iterator-position
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 2,336.86 ms |
| 500 | 10,638.38 ms |
| 1000 | 20,158.47 ms |
#### Strategy: aho-corasick-unique
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 126.21 ms |
| 500 | 133.33 ms |
| 1000 | 131.37 ms |
#### Strategy: aho-corasick-unique-processed
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 126.15 ms |
| 500 | 128.20 ms |
| 1000 | 131.17 ms |
#### Strategy: simple-iterator-unique
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 21.01 ms |
| 500 | 218.46 ms |
| 1000 | 405.95 ms |

### Product description taken from a Giant bike product page:

The Giant Bike product text is 6,180 characters.

#### Strategy: aho-corasick-position
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 0.88 ms |
| 500 | 2.17 ms |
| 1000 | 3.95 ms |
#### Strategy: simple-iterator-position
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 0.86 ms |
| 500 | 2.04 ms |
| 1000 | 3.33 ms |
#### Strategy: aho-corasick-unique
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 0.81 ms |
| 500 | 2.35 ms |
| 1000 | 4.20 ms |
#### Strategy: aho-corasick-unique-processed
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 0.77 ms |
| 500 | 2.15 ms |
| 1000 | 3.95 ms |
#### Strategy: simple-iterator-unique
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 0.12 ms |
| 500 | 1.21 ms |
| 1000 | 2.30 ms |

---

## Requirements

1. You need to have PHP installed on the machine that is running the tests.
2. You need Composer installed on the machine that fetches Wikimedia's implementation of Aho-Corasick.

## Usage

1. composer install
2. run `php index.php all mobydick 100`
   * The first argument is the strategy to use (`all` or [a specific matcher strategy](src/Matcher.php))
   * The second argument is text to search through. You can find possible values in the [TextLibrary](src/TextLibrary.php).
   * The third argument is the number of iterations you'd like to run to get a more accurate average execution time.

### Extending the Text Library

You're more than welcome to extend the repository and add your own text to the [TextLibrary](src/TextLibrary.php).

You'd probably also want to add new keywords to the [KeywordLibrary](src/KeywordLibrary.php).

### Example Output

````text
$ php index.php aho-corasick-position mobydick 100

#### Strategy: aho-corasick-position
_Each "test" ran **10** times to then calculate the average result._
| Keywords | Execution Time |
|----------|-------------------|
| 50 | 129.87 ms |
| 500 | 128.02 ms |
| 1000 | 130.64 ms |
````

## Credit

The actual Aho-Corasick implementation is done by [Wikimedia's implementation of Aho-Corasick](https://packagist.org/packages/wikimedia/aho-corasick).

The Moby Dick book is made available by [Project Gutenberg](https://www.gutenberg.org/).
