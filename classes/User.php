<?php
require "vendor/autoload.php";

class User
{
    public $name;
    public $planName;
    public $tempServer;

    public function subscribe($plan)
    {
        $this->planName = $plan->getPlan();

        if ($this->planName == "Basic Plan") {
            $plan->displayDescription();
        } elseif ($this->planName == "Pro Plan") {
            $plan->displayDescription();
        }
    }

    public function unsubscribe()
    {
        echo "Action => Canceling Subscription to $this->planName !\n\n";
        echo "You have successfully unsubscribed from plan $this->planName !\nThank you for using RunCloud\n\n";
        unset($this->planName);
    }

    public function connectServer($server)
    {
        if ($server->ipAddress == '192.168.0.1') {
            echo "Action: Connecting Server Server 1\n";
            echo "Action => Server Server 1 is connected !\n\n";
            $this->temp_server[] = $server;
            $this->printUserDetail($server, $this->name);
        } else if ($server->ipAddress == '192.168.0.2') {
            echo "Action: Connecting Server Server 2\n";
            if (!empty($this->planName)) {
                if ($this->checkLimitation($this->planName)) {
                    echo "Error => User Exceeded Server Limit allowed for Plan Basic Plan !\n\n";
                } else {
                    echo "Action => Server Server 2 is connected !\n\n";
                    $this->printUserDetail($server, $this->name);
                }
            } else {
                echo "Error => User is not Subscribe to Any Plan !\n\n";
            }
        }
    }

    public function printUserDetail($server, $userName)
    {
        $mask = "|%20.20s |%-30.60s |\n";
        printf($mask, "User's Name", " $userName");
        printf($mask, 'Current Plan', " $this->planName");
        if ($this->planName == "Pro Plan") {
            printf($mask, 'Connected Servers', " $server->name [$server->ipAddress] , " . $this->temp_server[0]->name . " [" . $this->temp_server[0]->ipAddress . "]");
        } else {
            printf($mask, 'Connected Servers', " $server->name [$server->ipAddress]");
        }
        echo "\n";
    }

    public function checkLimitation($planName)
    {
        if ($planName == "Basic Plan") {
            return true;
        }
    }
}
