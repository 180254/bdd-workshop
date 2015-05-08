<?php

class Account
{

private $balance;
private $card;
    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function getCard()
    {
        return $this->card;
    }
}
