<?php
require "vendor/autoload.php";

class ProPlan implements Plan
{
    private $plan = "Pro Plan";

    public function getPlan()
    {
        return $this->plan;
    }

    public function displayDescription()
    {
        echo "Action: Subcribing to Plan Pro Plan ... \n";
        echo "Subscribed to plan Pro Plan\n\n";
    }
}
