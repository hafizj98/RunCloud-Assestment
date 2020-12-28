<?php
require "vendor/autoload.php";


class BasicPlan implements Plan
{
    private $plan = "Basic Plan";

    public function getPlan()
    {
        return $this->plan;
    }

    public function displayDescription()
    {
        echo "Action: Subcribing to Plan Basic Plan ... \n";
        echo "Subscribed to plan Basic Plan\n\n";
    }
}
