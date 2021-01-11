<?php

namespace SPA\Core\Application\Command;

use SPA\Core\Application\Port\MovieRepositoryInterface;
use SPA\Core\Domain\Entity\Movie;

class AddMovie
{
    /**
     * @var MovieRepositoryInterface
     */
    private $movieRepository;

    /**
     * AddMovie constructor.
     *
     * @param MovieRepositoryInterface $movieRepository
     */
    public function __construct(MovieRepositoryInterface $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @param string $title
     * @param string $description
     *
     * @return Movie
     */
    public function execute(string $title, string $description): Movie
    {
        return $this->movieRepository->addMovie($title, $description);
    }
}
