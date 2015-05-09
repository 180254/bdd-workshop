<?php

class Card
{
    private $valid;

    public function setValid($valid)
    {
        $this->valid = $valid;
    }

    public function isValid()
    {
        return $this->valid;
    }
}
