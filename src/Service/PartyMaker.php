<?php


namespace App\Service;
use App\Util\CharacterMaker;

class PartyMaker
{

    private $party;

    public function __construct(CharacterMaker $CharacterMaker)
    {
            $this->party = $CharacterMaker;

    }
    public function partyCreator (int $partySize) : array
    {
        $group = [];
        $group = $this->party->characterMaker($partySize);
        return $group;
    }

}
