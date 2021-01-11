<?php

namespace SPA\Core\Infrastructure\Repository;

use SPA\Core\Application\Port\MovieRepositoryInterface;
use SPA\Core\Domain\Entity\Movie;

class MovieRepository implements MovieRepositoryInterface
{
    /**
     * @var Movie[]
     */
    private $movies;

    /**
     * @var string
     */
    private $path = '/var/www/html/movies.json';

    public function __construct()
    {
        $this->readFile();
    }

    /**
     * {@inheritDoc}
     */
    public function findAll(): array
    {
        return $this->movies;
    }

    /**
     * {@inheritDoc}
     */
    public function addMovie(string $title, string $description): Movie
    {
        $id = count($this->movies) + 1;
        $this->movies[$id] = new Movie($id, $title, $description);
        $this->writeFile();

        return $this->movies[$id];
    }

    private function readFile(): void
    {
        $this->movies = [];
        $raw = file_get_contents($this->path);

        if (!empty($raw)) {
            $data = json_decode($raw, true);

            foreach ($data as $item) {
                $this->movies[$item['id']] = new Movie(
                    $item['id'],
                    $item['title'],
                    $item['description']
                );
            }
        }
    }

    private function writeFile(): void
    {
        $movies = array_map(function (Movie $movie) {
            return $movie->toArray();
        }, $this->movies);

        file_put_contents($this->path, json_encode($movies));
    }
}
