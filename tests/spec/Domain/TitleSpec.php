<?php

namespace spec\Todo\Domain;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TitleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Todo\Domain\Title');
    }

    function let()
    {
        $this->beConstructedWith('Item title');
    }

    function it_should_have_a_title()
    {
        $this->toString()->shouldBe('Item title');
    }

    function it_should_not_accept_an_invalid_title()
    {
        $this->shouldThrow('InvalidArgumentException')->during('__construct', ['']);
    }
}
