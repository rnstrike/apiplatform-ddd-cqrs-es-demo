<?php

// this file is auto-generated by prolic/fpp
// don't edit this file manually

declare(strict_types=1);

namespace Book\Domain\Model\Review\Event;

final class ReviewWasDeleted extends \Prooph\EventSourcing\AggregateChanged
{
    public const MESSAGE_NAME = 'Book\Domain\Model\Review\Event\ReviewWasDeleted';

    protected $messageName = self::MESSAGE_NAME;

    protected $payload = [];

    private $id;

    public function id(): \Book\Domain\Model\Review\ReviewId
    {
        if (null === $this->id) {
            $this->id = \Book\Domain\Model\Review\ReviewId::fromString($this->aggregateId());
        }

        return $this->id;
    }

    public static function with(\Book\Domain\Model\Review\ReviewId $id): self
    {
        return new self($id->toString(), [
        ]);
    }

    protected function setPayload(array $payload): void
    {
        $this->payload = $payload;
    }
}