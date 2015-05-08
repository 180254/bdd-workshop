Feature: Account Holder withdraws cash
  In order to get money when the bank is closed
  As an Account Holder
  I want to withdraw cash from an ATM

  Scenario: Account has sufficient funds
    Given the account balance is $100
    And the card is valid
    And the machine contains $50
    When the Account Holder requests $20
    Then the ATM should dispense $20
    And the account balance should be $80
    And the card should be returned