<?php

namespace spec\CodeBrewery\Untappd\User;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StatsSpec extends ObjectBehavior
{
    function let()
    {
        $data = json_decode(file_get_contents(__DIR__.'/userStub-compact.json'));

        $this->beConstructedWith($data->response->user->stats);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('CodeBrewery\Untappd\User\Stats');
    }

    function it_should_set_values()
    {
        $this->totalBadges->shouldReturn(74);
        $this->totalFriends->shouldReturn(5);
        $this->totalCheckins->shouldReturn(283);
        $this->totalBeers->shouldReturn(140);
        $this->totalCreatedBeers->shouldReturn(0);
        $this->totalFollowings->shouldReturn(3);
        $this->totalPhotos->shouldReturn(15);
    }

}
