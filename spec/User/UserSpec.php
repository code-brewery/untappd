<?php

namespace spec\CodeBrewery\Untappd\User;

use CodeBrewery\Untappd\Brew\Beer;
use CodeBrewery\Untappd\User\Stats;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UserSpec extends ObjectBehavior
{
    function let()
    {
        $data = json_decode(file_get_contents(__DIR__.'/userStub-full.json'));

        $this->beConstructedWith($data->response->user);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType('CodeBrewery\Untappd\User\User');
    }

    function it_should_set_values()
    {
        $this->userName->shouldReturn('olyckne');
        $this->stats->shouldReturnAnInstanceOf(Stats::class);
        $this->recentBrews->shouldHaveCount(5);
        $this->recentBrews[0]->shouldReturnAnInstanceOf(Beer::class);
    }

    function it_should_handle_compact_response()
    {
        $data = json_decode(file_get_contents(__DIR__.'/userStub-compact.json'));

        $this->beConstructedWith($data->response->user);

        $this->recentBrews->shouldReturn([]);
    }

}
