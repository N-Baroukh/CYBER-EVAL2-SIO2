<?php

namespace App\Tests;

use App\Entity\Author;
use App\Entity\Book;
use PHPUnit\Framework\TestCase;

class AuthorTest extends TestCase
{
    public function testAuthor(): void
    {
        $author = new Author();
        $book1 = new Book();
        $book2 = new Book();

        $author->addBook($book1)
            ->addBook($book2);

        $this->assertCount(2, $author->getBookItems());
        $this->assertSame($author, $book1->getRelatedAuthor());
        $this->assertSame($author, $book2->getRelatedAuthor());
    }

}
