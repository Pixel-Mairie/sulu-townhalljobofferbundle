<?php

declare(strict_types=1);

namespace Pixel\TownHallJobOfferBundle\Domain\Event;

use Pixel\TownHallJobOfferBundle\Entity\JobOffer;

trait JobOfferEventTrait
{
    public function getResourceKey(): string
    {
        return JobOffer::RESOURCE_KEY;
    }

    public function getResourceId(): string
    {
        return (string) $this->jobOffer->getId();
    }

    public function getResourceTitle(): ?string
    {
        return $this->jobOffer->getName();
    }

    public function getResourceSecurityContext(): ?string
    {
        return JobOffer::SECURITY_CONTEXT;
    }
}
