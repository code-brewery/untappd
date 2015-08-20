<?php

namespace CodeBrewery\Untappd\User;

use CodeBrewery\Untappd\Str;

class Stats
{
    public $totalBadges;
    public $totalFriends;
    public $totalCheckins;
    public $totalBeers;
    public $totalCreated_beers;
    public $totalFollowings;
    public $totalPhotos;

    public function __construct($statsObj)
    {
        foreach ($statsObj as $key => $value) {
            $camelCase = Str::camel($key);
            $this->$camelCase = $value;
        }
    }
}
