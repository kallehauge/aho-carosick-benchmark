# Aho-Corasick Performance Test

TL;DR: I had to find a way to efficiently search for multiple possible strings in a large text (specifically, keywords inside amongst product titles and descriptions).

So the mathematical challenge is an efficient way to address `O(n + m)` where `n` is the total length of keywords and `m` is the length of the text.
Theoretically the Aho-Corasick string matching algorithm should one of (or _the_?) most efficient way to do this, so I spun up this very superficial benchmark to see what to expect in PHP - and thereby also implied how well the Wikimedia implementation of Aho-Corasick performs.

## Results

If you're curious, then these were the results I got by running these on my Macbook Pro M2 Pro while having several demanding programs running meanwhile the tests ran (like my IntelliJ IDE. If you know, you know).

Both [text libraries](src/TextLibrary.php) were parsed using the same [keyword library](src/KeywordLibrary.php).

### Moby Dick

The book is ~1.2 MB large (or in other words: 1,276,290 characters):

```
Peak memory usage: 4,096 KB
Average execition time: 132.64 ms
```

### Product description taken from a Giant bike product page:

This product text is 6,180 characters long:

```
Peak memory usage: 0,00 KB
Average execition time: 1,56 ms
```

---

## Requirements

1. You need to have PHP installed on the machine that is running the tests.
2. You need Composer installed on the machine that fetch Wikimedia's implementation of Aho-Corasick.

## Usage

1. composer install
2. run `php index.php mobydick 100`
    * The first argument is text to search through. You can find possible values in the [TextLibrary](src/TextLibrary.php).
    * The second argument is the number of iterations you'd like to run to get a more accurate average execution time.

### Extending the Text Library

You're more than welcome to extend the repository and add your own text to the [TextLibrary](src/TextLibrary.php).

You'd probably also want to add new keywords to the [KeywordLibrary](src/KeywordLibrary.php).

### Example Output

```
$ php index.php mobydick 100

... Lots of individual results ...
Execution time: 135.23 milliseconds
Execution time: 134.77 milliseconds
Execution time: 135.80 milliseconds
Execution time: 138.39 milliseconds
Execution time: 137.18 milliseconds
Execution time: 136.94 milliseconds
Execution time: 137.01 milliseconds
Execution time: 142.69 milliseconds
Execution time: 135.55 milliseconds
Execution time: 135.79 milliseconds
Execution time: 136.07 milliseconds
Execution time: 134.64 milliseconds
Execution time: 151.99 milliseconds
---------------------------------------
Memory usage: 4,096.00 KB
Average execution time: 132.64 milliseconds
```

## Credit

The actual Aho-Corasick implementation is done by [Wikimedia's implementation of Aho-Corasick](https://packagist.org/packages/wikimedia/aho-corasick).

The Moby Dick book is made available by [Project Gutenberg](https://www.gutenberg.org/).
