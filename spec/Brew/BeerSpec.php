<?php

namespace spec\CodeBrewery\Untappd\Brew;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class BeerSpec extends ObjectBehavior
{
    function let()
    {
        $data = json_decode(file_get_contents(__DIR__.'/beerStub-compact.json'));

        $this->beConstructedWith($data->response->beer);

    }
    function it_is_initializable()
    {
        $this->shouldHaveType('CodeBrewery\Untappd\Brew\Beer');
    }
}
