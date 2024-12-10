<?php

namespace App\Tests;

use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class BookTest extends TestCase
{
    public function testSomething(): void
    {

        $this->assertTrue(true);
    }
    public function testBook()
    {
        $book = new Book();
        $book->setTitle('Harry Potter');
        $book->setIsbn('1234567890');
        $book->setPublishedAt(new \DateTimeImmutable('2020-01-01'));
        $this->assertEquals('Harry Potter', $book->getTitle());
        $this->assertEquals('1234567890', $book->getIsbn());
        $this->assertEquals(new \DateTimeImmutable('2020-01-01'), $book->getPublishedAt());
    }

    public function testInvalidTitle(): void
    {
        $this->expectException(\TypeError::class);

        $book = new Book();
        $book->setTitle([]);
        $this->assertFalse(false);
    }
    public function testInvalidIsbn(): void
    {
        $this->expectException(\TypeError::class);

        $book = new Book();
        $book->setIsbn([]);
        $this->assertFalse(false);
    }
    public function testInvalidDate(): void
    {
        $this->expectException(\TypeError::class);

        $book = new Book();
        $book->setPublishedAt([]);
        $this->assertFalse(false);
    }
    public function testSucces()
    {
       $book = new Book();
       $book->setTitle('Harry');
       $book->setIsbn('1234567890');
       $book->setPublishedAt(new \DateTimeImmutable('2020-01-01'));
       $this->assertTrue(true);    }

}
