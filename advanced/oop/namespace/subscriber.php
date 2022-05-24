<?php

namespace Users\Role\Subscriber;

class Actions
{
    private $logged;
    public function login()
    {
        $this->logged = true;
        echo "Subscriber logged in successfully";
    }

    public function logout()
    {
        $this->logged = false;
        echo "Logging out the Subscriber";
    }
}
