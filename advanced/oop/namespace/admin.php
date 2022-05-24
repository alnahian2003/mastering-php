<?php

namespace Users\Role\Administrator;

class Actions
{
    public $logged;
    public function login()
    {
        $this->logged = true;
        echo "Admin logged in successfully";
    }

    public function logout()
    {
        $this->logged = false;
        echo "Logging out the Admin";
    }
}
