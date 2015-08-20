<?php

namespace CodeBrewery\Untappd\User;

use CodeBrewery\Untappd\Brew\Beer;
use CodeBrewery\Untappd\Str;

class User
{
    public $uid;
    public $id;
    public $userName;
    public $firstName;
    public $lastName;
    public $userAvatar;
    public $userAvatarHd;
    public $userCoverPhoto;
    public $userCoverPhotoOffset;
    public $isPrivate;
    public $location;
    public $url;
    public $bio;
    public $isSupporter;
    public $relationship;
    public $untappdUrl;
    public $accountType;

    public $stats;
    public $recentBrews;

    public function __construct($userObj)
    {
        foreach ($userObj as $key => $value) {
            $camelCase = Str::camel($key);
            $this->$camelCase = $value;
        }

        $this->stats = new Stats($userObj->stats);

        $this->recentBrews = $this->collectRecentBrews($userObj);
    }

    protected function collectRecentBrews($userObj)
    {
        if (!isset($userObj->recent_brews)) {
            return [];
        }

        $this->recentBrews = [];
        $brews = $userObj->recent_brews->items;
        foreach ($brews as $brew) {
            $beer = array_merge(
                (array) $brew->beer,
                (array) $brew->brewery
            );
            $this->recentBrews[] = new Beer((object) $beer);
        }

        return $this->recentBrews;
    }
}
