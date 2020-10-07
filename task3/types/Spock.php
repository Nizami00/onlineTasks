<?php

class Spock implements TypesInterface
{

    public function wins(TypesInterface $choice): ResultInterface
    {
        if ($choice instanceof Scissors || $choice instanceof Rock) {
            return new Wins();
        }

        if ($choice instanceof Lizard || $choice instanceof Paper) {
            return new Loses();
        }

        return new IsTie();

    }
}