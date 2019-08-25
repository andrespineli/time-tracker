<?php

namespace TimeTracker;

abstract class Collection implements \Iterator
{
    protected $array = [];

    private $position = 0;

    public function __construct()
    {
        $this->position = 0;
    }

    public function add($value): void
    {
        $this->array[] = $value;
    }

    public function get($key)
    {
        return $this->array[$key];
    }

    public function remove($key): void
    {
        unset($this->array[$key]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    public function current()
    {
        return $this->array[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        ++$this->position;
    }

    public function valid()
    {
        return isset($this->array[$this->position]);
    }

    public function __toString()
    {
        return $this->array;
    }
}
