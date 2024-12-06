<?php

namespace Pixel\TownHallJobOfferBundle\Service;

use Pixel\TownHallJobOfferBundle\Entity\JobOffer;

class JobOfferService
{
    /**
     * @return array<array<mixed>>
     */
    public function getContractTypeValues(string $locale): array
    {
        return [
            [
                'name' => JobOffer::CONTRACT_CDI,
                'title' => "CDI",
            ],
            [
                'name' => JobOffer::CONTRACT_CDD,
                'title' => "CDD",
            ],
        ];
    }

    public function getContractTypeLabel(int $type): string
    {
        switch ($type) {
            case JobOffer::CONTRACT_CDI: return "CDI";
            case JobOffer::CONTRACT_CDD: return "CDD";
            default: return "";
        }
    }
}
