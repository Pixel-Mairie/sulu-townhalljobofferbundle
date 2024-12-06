<?php

namespace Pixel\TownHallJobOfferBundle\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\QueryBuilder;
use Pixel\TownHallJobOfferBundle\Entity\JobOffer;
use Sulu\Component\SmartContent\Orm\DataProviderRepositoryInterface;
use Sulu\Component\SmartContent\Orm\DataProviderRepositoryTrait;

class JobOfferRepository extends EntityRepository implements DataProviderRepositoryInterface
{
    use DataProviderRepositoryTrait;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct($entityManager, new ClassMetadata(JobOffer::class));
    }

    public function findById(int $id): ?JobOffer
    {
        $jobOffer = $this->find($id);
        if (! $jobOffer) {
            return null;
        }
        return $jobOffer;
    }

    public function findByFilters($filters, $page, $pageSize, $limit, $locale, $options = []): array
    {
        $pageCurrent = (key_exists("page", $options)) ? (int) $options['page'] : 0;

        $qb = $this->createQueryBuilder("jo")
            ->where("jo.isActive = 1")
            ->setMaxResults($limit)
            ->setFirstResult($pageCurrent * $limit);

        if ($filters['sortBy'] !== "title") {
            $qb->orderBy("jo." . $filters['sortBy'], $filters['sortMethod']);
        }

        $jobOffers = $qb->getQuery()->getResult();
        if (! $jobOffers) {
            return [];
        } else {
            return $jobOffers;
        }
    }

    /**
     * @param string $alias
     * @param string $locale
     */
    public function appendJoins(QueryBuilder $queryBuilder, $alias, $locale): void
    {
    }
}
