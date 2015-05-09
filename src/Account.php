<?php

class Account
{
    private $card;
    private $balance;

    public function __construct(Card $card)
    {
        $this->card = $card;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function getCard()
    {
        return $this->card;
    }
}
