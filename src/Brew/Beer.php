<?php

namespace CodeBrewery\Untappd\Brew;

use CodeBrewery\Untappd\Str;
use StdClass;

class Beer
{
    public $bid;
    public $beerName;
    public $beerLabel;
    public $beerAbv;
    public $beerIbu;
    public $beerDescription;
    public $beerStyle;
    public $isInProduction;
    public $beerSlug;
    public $isHomebrew;
    public $createdAt;
    public $ratingCount;
    public $ratingScore;

    public $stats;

    public $brewery;

    public $authRating;
    public $wishList;

    public function __construct(StdClass $beerObj)
    {
        foreach ($beerObj as $key => $value) {
            $camelCase = Str::camel($key);
            $this->$camelCase = $value;
        }
    }
}
