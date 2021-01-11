<?php

namespace SPA\Core\Application\Query;

use SPA\Core\Application\Port\MovieRepositoryInterface;
use SPA\Core\Domain\Entity\Movie;

class FindAllMovies
{
    /**
     * @var MovieRepositoryInterface
     */
    private $movieRepository;

    /**
     * FindAllMovies constructor.
     *
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @return Movie[]
     */
    public function execute(): array
    {
        return $this->movieRepository->findAll();
    }
}
