<?php

namespace SPA\Controller;

use Slim\Psr7\Request;
use Slim\Psr7\Response;
use SPA\Core\Application\Command\AddMovie;
use SPA\Core\Application\Query\FindAllMovies;
use SPA\Core\Domain\Entity\Movie;

class MovieController
{
    /**
     * @var AddMovie
     */
    private $addMovieCommand;

    /**
     * @var FindAllMovies
     */
    private $findAllMoviesQuery;

    /**
     * MovieController constructor.
     *
     * @param AddMovie      $addMovieCommand
     * @param FindAllMovies $findAllMoviesQuery
     */
    public function __construct(AddMovie $addMovieCommand, FindAllMovies $findAllMoviesQuery)
    {
        $this->addMovieCommand = $addMovieCommand;
        $this->findAllMoviesQuery = $findAllMoviesQuery;
    }

    /**
     * @param Request  $request
     * @param Response $response
     *
     * @return Response
     */
    public function addMovie(Request $request, Response $response): Response
    {
        $body = $request->getParsedBody();
        $movie = $this->addMovieCommand->execute($body['title'], $body['description']);

        return $response->withStatus(201, sprintf('Movie id %s created', $movie->getId()));
    }

    /**
     * @param Response $response
     *
     * @return Response
     */
    public function listMovies(Response $response): Response
    {
        $movies = $this->findAllMoviesQuery->execute();
        $movieData = array_map(function (Movie $movie) {
            return $movie->toArray();
        }, $movies);
        $payload = json_encode($movieData);
        $response->getBody()->write($payload);

        return $response->withHeader('Content-Type', 'application/json');
    }
}
