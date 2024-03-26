<?php

namespace App\Iterators;

use Illuminate\Support\Collection;

class PostSearchIterator implements \IteratorAggregate
{
    protected Collection $posts;

    public function __construct(Collection $posts)
    {
        $this->posts = $posts;
    }

    public function getIterator(): \ArrayIterator
    {
        return new \ArrayIterator($this->posts->all());
    }
}
