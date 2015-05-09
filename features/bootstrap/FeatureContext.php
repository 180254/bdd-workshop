<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    private $account;
    private $atm;
    private $initialAtmAmountOfMoney;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->account = new Account(new Card());
        $this->atm = new Atm();
    }

    /**
     * @Given the account balance is $:balance
     * @param $balance
     */
    public function theAccountBalanceIs($balance)
    {

        $this->account->setBalance($balance);
    }

    /**
     * @Given the card is valid
     */
    public function theCardIsValid()
    {
        $card = $this->account->getCard();
        $card->setValid(true);
    }

    /**
     * @Given the machine contains $:amount
     * @param $amount
     */
    public function theMachineContainsEnoughMoney($amount)
    {
        $this->initialAtmAmountOfMoney = $amount;
        $this->atm->setAmountOfMoney($amount);
    }

    /**
     * @When the Account Holder requests $:amountOfMoney
     * @param $amountOfMoney
     */
    public function theAccountHolderRequests($amountOfMoney)
    {
        $this->atm->useCard($this->account->getCard());
        $this->atm->withdraw($this->account, $amountOfMoney);
    }

    /**
     * @Then the ATM should dispense $:amount
     * @param $amount
     * @throws Exception
     */
    public function theAtmShouldDispense($amount)
    {
        $expectedAmountOfMoney = $this->initialAtmAmountOfMoney - $amount;
        if ($this->atm->getAmountOfMoney() !== $expectedAmountOfMoney) {
            throw new \Exception($this->atm->getAmountOfMoney());
        }
    }

    /**
     * @Then the account balance should be $:expectedBalance
     * @param $expectedBalance
     * @throws Exception
     */
    public function theAccountBalanceShouldBe($expectedBalance)
    {
        if ($expectedBalance != $this->account->getBalance()) {
            throw new \Exception($this->account->getBalance());
        }
    }

    /**
     * @Then the card should be returned
     */
    public function theCardShouldBeReturned()
    {
        if ($this->atm->hasCard()) {
            throw new \Exception($this->atm->hasCard());
        }
    }
}
