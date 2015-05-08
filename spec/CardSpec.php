<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class CardSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Card');
    }
    
    function it_can_be_valid() {
        $this->setValid(true);
        $this->shouldBeValid();
    }
}
