<?php

class Scissors implements TypesInterface
{


    public function wins(TypesInterface $choice): ResultInterface
    {
        if ($choice instanceof Lizard || $choice instanceof Paper) {
            return new Wins();
        }

        if ($choice instanceof Rock || $choice instanceof Spock) {
            return new Loses();
        }

        return new IsTie();

    }
}