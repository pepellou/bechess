<?php

namespace App\Entity;


class User
{

    protected $nickname;
    protected $password;

    protected $firstname;
    protected $lastname;
    protected $lichess_handle;
    protected $lichess_key;

    public function getNickname()
    {
        return $this->nickname;
    }

    public function setNickname($nickname)
    {
        $this->nickname = $nickname;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getLastname()
    {
        return $this->lastname;
    }

    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    public function getLichess_handle()
    {
        return $this->lichess_handle;
    }

    public function setLichess_handle($lichess_handle)
    {
        $this->lichess_handle = $lichess_handle;
    }

    public function getLichess_key()
    {
        return $this->lichess_key;
    }

    public function setLichess_key($lichess_key)
    {
        $this->lichess_key = $lichess_key;
    }

}
