<?php

namespace spec\CodeBrewery\Untappd;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class StrSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('CodeBrewery\Untappd\Str');
    }

    function it_should_camel_case_a_string()
    {
        $this->camel('this_is_a_string')->shouldReturn('thisIsAString');
        $this->camel('this-is_a-string')->shouldReturn('thisIsAString');
        $this->camel('this is a string')->shouldReturn('thisIsAString');

    }

    function it_should_studly_case_a_string()
    {
        $this->studly('this is a string')->shouldReturn('ThisIsAString');
        $this->studly('this_is a-string')->shouldReturn('ThisIsAString');
    }
}
