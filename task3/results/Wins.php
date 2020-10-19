<?php

class Wins implements ResultInterface
{

    public function result(): string
    {
        return 'You won!';
    }
}