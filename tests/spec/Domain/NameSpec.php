<?php

namespace spec\Todo\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class NameSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Domain\Name');
    }

    function let()
    {
        $this->beConstructedWith('Item name');
    }

    function it_should_have_a_name()
    {
        $this->toString()->shouldBe('Item name');
    }

    function it_should_not_accept_an_invalid_name()
    {
        $this->shouldThrow('InvalidArgumentException')->during('__construct', ['']);
    }
}
