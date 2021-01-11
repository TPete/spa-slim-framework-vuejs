<?php

namespace SPA\Core\Domain\Entity;

class Movie
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * Movie constructor.
     *
     * @param string $id
     * @param string $title
     * @param string $description
     */
    public function __construct(string $id, string $title, string $description)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'id' => $this->getId(),
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
        ];
    }
}
