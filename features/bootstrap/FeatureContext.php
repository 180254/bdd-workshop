<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

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
        $this->account = new Account();
        $this->atm = new Atm();
    }

    /**
     * @Given the account balance is $:balance
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
        $cars ->setValid(true);
    }

    /**
     * @Given the machine contains $:amount
     */
    public function theMachineContainsEnoughMoney($amount)
    {
        $this->initialAtmAmountOfMoney = $amount;
        $this->atm->setAmountOfMoney($amount);
    }

    /**
     * @When the Account Holder requests $:amountOfMoney
     */
    public function theAccountHolderRequests($amountOfMoney)
    {
        $this->atm->withdraw($this->account, $amountOfMoney);
    }

    /**
     * @Then the ATM should dispense $:amount
     */
    public function theAtmShouldDispense($amount)
    {
        $expectedAmountOfMoney = $this->initialAtmAmountOfMoney -$amount;
        if($this->atm->getAmountOfMoney() !== $expectedAmountOfMoney) {
            throw new \Exception();
        }
    }

    /**
     * @Then the account balance should be $:expectedBalance
     */
    public function theAccountBalanceShouldBe($expectedBalance)
    {
        if($expectedBalance !== $this->account->getBalance()) {
             throw new \Exception();
        }
    }

    /**
     * @Then the card should be returned
     */
    public function theCardShouldBeReturned()
    {
       if($this->atm->hasCard()) {
             throw new \Exception();
       }
    }
}
