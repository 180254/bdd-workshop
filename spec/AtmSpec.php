<?php

namespace spec;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class AtmSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Atm');
    }

    function it_sets_amount_of_money()
    {
        $this->setAmountOfMoney(20);
        $this->getAmountOfMoney()->shouldReturn(20);
    }

    function it_withdraw(\Account $acc)
    {
        $this->withdraw($acc, 10);
    }

    function it_uses_card(\Card $card)
    {
        $this->useCard($card);
        $this->hasCard()->shouldReturn(true);

    }

    function it_returns_card(\Account $acc, \Card $card)
    {
        $this->useCard($card);
        $this->withdraw($acc, 10);
        $this->hasCard()->shouldReturn(false);
    }
}
