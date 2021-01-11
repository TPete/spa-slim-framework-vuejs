<?php

namespace SPA\Core\Application\Port;

use SPA\Core\Domain\Entity\Movie;

interface MovieRepositoryInterface
{
    /**
     * @return Movie[]
     */
    public function findAll(): array;

    /**
     * @param string $title
     * @param string $description
     *
     * @return Movie
     */
    public function addMovie(string $title, string $description): Movie;
}
