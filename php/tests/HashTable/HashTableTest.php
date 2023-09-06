<?php

use PHPUnit\Framework\TestCase;
use Zubs\Dsa\HashTable\HashTable;

final class HashTableTest extends TestCase
{
    function testSetShouldReturnInputValue()
    {
        $table = new HashTable();
        $name = $table->set('name', 'zubs');
        $age = $table->set('age', 22);

        $this->assertSame($name, 'zubs');
        $this->assertSame($age, 22);
    }

    function testGetShouldReturnValueWhenFound()
    {
        $table = new HashTable();
        $school = $table->set('school', 'University of Lagos');
        $students = $table->set('students', 236);

        $this->assertSame($table->get('school'), $school);
        $this->assertSame($table->get('students'), $students);
    }

    function testGetShouldReturnNullWhenValueNotFound()
    {
        $table = new HashTable();
        $table->set('school', 'University of Lagos');
        $table->set('students', 236);

        $this->assertNull($table->get('guests'));
    }

    function testRemoveShouldRemoveValueAndReturnDeletedValue()
    {
        $table = new HashTable();
        $school = $table->set('school', 'University of Lagos');

        $this->assertSame($table->remove('school'), $school);
        $this->assertNull($table->get('school'));
    }

    function testRemoveShouldReturnNullIfNoValue()
    {
        $table = new HashTable();
        $school = $table->set('school', 'University of Lagos');

        $this->assertNull($table->remove('students'));
        $this->assertSame($table->get('school'), $school);
    }

    function testGetSizeShouldReturnCorrectSize()
    {
        $table = new HashTable();

        $this->assertEquals(0, $table->getSize());

        $table->set('key1', 'value1');
        $table->set('key2', 'value2');
        $table->set('key3', 'value3');
        $table->set('key4', 'value4');
        $table->set('key5', 'value5');

        $this->assertEquals(5, $table->getSize());
    }
}
