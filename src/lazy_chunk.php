<?php

$iter = lazyRange(0, 25);
$chunks = chunk($iter, 5);
printChunks($chunks);

function printChunks(\Iterator $chunks)
{
    $buffer = [];
    foreach ($chunks as $i => $chunk) {
        foreach ($chunk as $j => $item) {
            $buffer[$i][$j] = $item;
        }
    }
    echo var_export($buffer, true).PHP_EOL;
}

function chunk($items, $size)
{
    if ($items instanceof \Iterator) {
        $lazyChunks = [];
        while ($items->valid()) {
            yield sliceIterator($items, $size);
        }
    }
}

function sliceIterator(\Iterator $iterator, $size = 10)
{
    while ($iterator->valid() && (($iterator->key() + 1) % $size !== 0)) {
        yield $iterator->key() => $iterator->current();
        echo $iterator->key();
        $iterator->next();
    }
}

function lazyRange($from, $to, $step = 1)
{
    for ($num = $from; $num <= $to; $num += $step) {
        yield $num;
    }
}
