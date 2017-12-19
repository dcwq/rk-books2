<?php

namespace Bold;

use Bold\Book\RepositoryAbstract;

/**
 * Class Stats
 * @package Bold
 */
class Stats
{
    /**
     * @var RepositoryAbstract
     */
    public $repository;

    /**
     * @var StatsDataAbstract
     */
    public $statsData;

    /**
     * Stats constructor.
     * @param RepositoryAbstract $repository
     * @param StatsDataAbstract $statsData
     */
    public function __construct(RepositoryAbstract $repository, StatsDataAbstract $statsData)
    {
        $this->repository = $repository;
        $this->statsData = $statsData;
    }

    /**
     * @param string $queryString
     * @return StatsDataAbstract
     */
    public function showStatistics(string $queryString) : StatsDataAbstract
    {
        $explodedQueryString = explode('|', $queryString);

        $params = [
            'name' => $explodedQueryString[0] ?? null,
            'age' => $explodedQueryString[1] ?? null
        ];

        $repositoryItems = $this->repository->search($params);

        if (!count($repositoryItems)) {
            unset($params['name']);
            $repositoryItems = $this->repository->search($params);
        }

        $bookBuilder = new BookBuilder();
        $director = new Director();

        $this->statsData->setData($repositoryItems, $bookBuilder, $director);
        $this->statsData->addCompatibilityColumn($explodedQueryString[0]);

        return $this->statsData;
    }
}
