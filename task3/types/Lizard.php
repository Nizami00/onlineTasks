<?php

class Lizard implements TypesInterface
{

    public function wins(TypesInterface $choice): ResultInterface
    {
        if ($choice instanceof Spock || $choice instanceof Paper) {
            return new Wins();
        }

        if ($choice instanceof Rock || $choice instanceof Scissors) {
            return new Loses();
        }

        return new IsTie();

    }
}