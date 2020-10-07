<?php

class Paper implements TypesInterface
{

    public function wins(TypesInterface $choice): ResultInterface
    {
        if ($choice instanceof Rock || $choice instanceof Spock) {
            return new Wins();
        }

        if ($choice instanceof Lizard || $choice instanceof Scissors) {
            return new Loses();
        }

        return new IsTie();

    }
}