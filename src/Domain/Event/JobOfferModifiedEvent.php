<?php

declare(strict_types=1);

namespace Pixel\TownHallJobOfferBundle\Domain\Event;

use Pixel\TownHallJobOfferBundle\Entity\JobOffer;
use Sulu\Bundle\ActivityBundle\Domain\Event\DomainEvent;

class JobOfferModifiedEvent extends DomainEvent
{
    use JobOfferEventTrait;

    private JobOffer $jobOffer;

    /**
     * @var array<mixed>
     */
    private array $payload;

    /**
     * @param array<mixed> $payload
     */
    public function __construct(JobOffer $jobOffer, array $payload)
    {
        parent::__construct();
        $this->jobOffer = $jobOffer;
        $this->payload = $payload;
    }

    public function getEventType(): string
    {
        return 'modified';
    }

    public function getEventPayload(): ?array
    {
        return $this->payload;
    }
}
