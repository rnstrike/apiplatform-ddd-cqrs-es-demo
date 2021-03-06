<?php

declare(strict_types=1);

namespace App\Book\Infrastructure\Persistence\EventStore;

use App\Book\Domain\Model\Book\Book;
use App\Book\Domain\Model\Book\BookId;
use App\Book\Domain\Model\Book\BookList;
use App\Core\Domain\AggregateRepository;
use App\Core\Domain\EventStore;

use function assert;

final class EventStoreBookList extends AggregateRepository implements BookList
{
    public function __construct(EventStore $eventStore)
    {
        parent::__construct(
            $eventStore,
            'book',
            Book::class,
            true
        );
    }

    public function save(Book $book): void
    {
        $this->saveAggregateRoot($book);
    }

    public function get(BookId $bookId): ?Book
    {
        $book = $this->getAggregateRoot($bookId);

        assert($book === null || $book instanceof Book);

        return $book;
    }
}
