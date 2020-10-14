<?php


class IdentificationCheck
{
    public static function identifyUser(string $postRequest, UsersCollection $people): string
    {
        $person = $people->checkID($postRequest);
        if ($person) {
            return $person->getID();
        }
    }

}