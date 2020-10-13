<?php


class Photo
{
    private string $source;
    private string $id;
    private int $likes;

    public function __construct(string $source, string $id, int $likes)
    {
        $this->source = $source;
        $this->id = $id;
        $this->likes = $likes;
    }

    public function getSource(): string
    {
        return $this->source;
    }

    public function getID(): int
    {
        return $this->id;
    }

    public function getLikes(): int
    {
        return $this->likes;
    }


    public function setLikes(int $like): void
    {
        $this->likes += $like;
    }




}