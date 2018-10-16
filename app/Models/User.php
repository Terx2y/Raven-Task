<?php
namespace app\Models;

class User extends BaseModel
{
    protected $table = "users";
    public $fillable = ['name','email','password'];
    public $userData = array();

    public function checkUser($value)
    {
            $dataUser = array();
            $readFromDB = $this->pdo->query("SELECT * FROM " . $this->table . " WHERE `email` = " . "\"" . $value . '"');

            foreach ($readFromDB as $r)
            {
                $dataUser['id'] = $r['id'];
                $dataUser['name'] = $r['name'];
                $dataUser['email'] = $r['email'];
                $dataUser['password'] = $r['password'];
            }
            return $dataUser;
    }
}