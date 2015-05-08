<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AccountSpec extends ObjectBehavior
{
    function let(\Card $card) {
        $this->beConstructedWith($card);
    }
    function it_is_initializable()
    {
        $this->shouldHaveType('Account');
    }
    
    function it_sets_given_balance() {
        $this->setBalance(20);
        $this->getBalance()->shouldReturn(20);
    }
    
    
    function it_should_return_card(\Card $card) {
        $this->getCard()->shouldReturn($card);
    }
}
