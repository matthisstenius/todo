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
}
