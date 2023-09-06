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

    /**
     * Store a key value pair in the hash table
     * @param string $key Key to store
     * @param string|int $value Value to store
     * @return string|int Returns the input value
     */
    public function set(string $key, string | int $value): string | int
    {
        $index = $this->hash($key);
        $this->table[$index] = $value;
        $this->size += 1;

        return $value;
    }

    /**
     * Fetch a stored value from the hash table
     * @param string $key Key to search for
     * @return string|int|null Returns null or stored value
     */
    public function get(string $key): string | int | null
    {
        $index = $this->hash($key);

        return array_key_exists($index, $this->table) ? $this->table[$index] : null;
    }

    /**
     * Delete a stored value from the hash table
     * @param string $key Key to delete
     * @return string|int|null Returns null or deleted value
     */
    public function remove(string $key): string | int | null
    {
        $index = $this->hash($key);

        if (!array_key_exists($index, $this->table)) {
            return null;
        }

        $value = $this->table[$index];
        unset($this->table[$index]);
        $this->size -= 1;

        return $value;
    }

    /**
     * @return int Returns number of items in the hash table
     */
    public function getSize(): int
    {
        return $this->size;
    }
}
