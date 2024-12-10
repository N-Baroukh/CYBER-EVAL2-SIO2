<?php

namespace App\Tests;

use App\Entity\Book;
use App\Entity\Client;
use App\Service\BorrowingManager;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use function PHPUnit\Framework\assertFalse;

class BorrowingManagerTest extends KernelTestCase
{
    public function testSomething(): void
    {
        $kernel = self::bootKernel();

        $this->assertSame('test', $kernel->getEnvironment());
        // $routerService = static::getContainer()->get('router');
        // $myCustomService = static::getContainer()->get(CustomService::class);
    }

    public function testBorrowMore(): void
    {
        $client = new Client();
        $book = new Book();
        $borrowingManager = new BorrowingManager();
        $client->setBorrowedBooksCount(5);
        $client->addBook($book);
        $this->assertFalse($borrowingManager->canBorrowBook($client, $book));
    }

    public function testBorrowAvailable(): void
    {
        $client = new Client();
        $book = new Book();
        $borrowingManager = new BorrowingManager();
        $client->setBorrowedBooksCount(2);
        $this->assertTrue($borrowingManager->canBorrowBook($client, $book));
    }

    public function testBookDejaPris(): void
    {
        $client = new Client();
        $book = new Book();
        $borrowingManager = new BorrowingManager();
        $book->setBorrowed(true);
        $this->assertFalse($borrowingManager->canBorrowBook($client, $book));
    }

}
