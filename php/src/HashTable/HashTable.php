<?php

namespace Zubs\Dsa\HashTable;

class HashTable
{
    private array $table = [];
    private int $size = 0;

    private function hash(string $key): string
    {
        return hash('md5', $key);
    }

    public function set(string $key, string | int $value): string | int
    {
        $index = $this->hash($key);
        $this->table[$index] = $value;
        $this->size += 1;

        return $value;
    }

    public function get(string $key): string | int | null
    {
        $index = $this->hash($key);

        return array_key_exists($index, $this->table) ? $this->table[$index] : null;
    }

    public function remove(string $key): string | int
    {
        $index = $this->hash($key);
        $value = $this->table[$index];
        unset($this->table[$index]);
        $this->size -= 1;

        return $value;
    }
}
