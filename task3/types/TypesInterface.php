<?php

interface TypesInterface
{
    public function wins(TypesInterface $choice): ResultInterface;
}