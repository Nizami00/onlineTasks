<?php

class IsTie implements ResultInterface
{

    public function result(): string
    {
        return 'It is a tie';
    }
}