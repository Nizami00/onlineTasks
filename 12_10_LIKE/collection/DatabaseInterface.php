<?php

interface DatabaseInterface
{
    public function load(): void;
    public function save(): void;

}