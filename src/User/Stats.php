<?php

namespace CodeBrewery\Untappd\User;

use CodeBrewery\Untappd\Str;
use StdClass;

class Stats
{
    public $totalBadges;
    public $totalFriends;
    public $totalCheckins;
    public $totalBeers;
    public $totalCreated_beers;
    public $totalFollowings;
    public $totalPhotos;

    public function __construct(StdClass $statsObj)
    {
        foreach ($statsObj as $key => $value) {
            $camelCase = Str::camel($key);
            $this->$camelCase = $value;
        }
    }
}
