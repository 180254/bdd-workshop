<?php

class Atm
{
    private $currentCard;
    private $amountOfMoney;

    public function setAmountOfMoney($amountOfMoney)
    {
        $this->amountOfMoney = $amountOfMoney;
    }

    public function getAmountOfMoney()
    {
        return $this->amountOfMoney;
    }

    public function withdraw(Account $acc, $amountOfWithdrawMoney)
    {
        if ($acc->getCard() == $this->currentCard &&
            $this->amountOfMoney >= $amountOfWithdrawMoney &&
            $acc->getBalance() >= $amountOfWithdrawMoney
        ) {
            $this->amountOfMoney = $this->amountOfMoney - $amountOfWithdrawMoney;
            $acc->setBalance($acc->getBalance() - $amountOfWithdrawMoney);
        }

        $this->currentCard = null;
    }

    public function useCard(Card $card)
    {
        $this->currentCard = $card;
    }

    public function hasCard()
    {
        return $this->currentCard !== null;
    }
}
