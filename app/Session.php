<?php
namespace app;

class Session
{
    public $userExists;

    public function setUser($data)
    {
        $_SESSION['id'] = $data['id'];
    }

    public function isSessionUserExists()
    {
        ((isset($_SESSION['id']) ? $this->userExists = true : $this->userExists = false));
        return $this->userExists;
    }

    public function clearSession()
    {
        session_destroy();
    }
}