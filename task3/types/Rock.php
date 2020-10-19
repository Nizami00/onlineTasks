<?php

class Rock implements TypesInterface
{

    public function wins(TypesInterface $choice): ResultInterface
    {
        if ($choice instanceof Lizard || $choice instanceof Scissors) {
            return new Wins();
        }

        if ($choice instanceof Spock || $choice instanceof Paper) {
            return new Loses();
        }

        return new IsTie();

    }
}
