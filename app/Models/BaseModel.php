<?php
/**
 * Created by PhpStorm.
 * User: avr
 * Date: 28.09.2018
 * Time: 10:39
 */
namespace app\Models;

use app\OuterWorld\DataBase;

abstract class BaseModel
{
    protected $table;
    protected $fillable;
    public $pdo;

    public function __construct()
    {
        $this->pdo = Database::initialize();
    }

    public function all($limit = NULL)
    {
        if(is_null($limit)) {
            $readFromDB = $this->pdo->query("SELECT * FROM " . $this->table)->fetchAll();
            return ['success' => $readFromDB];
        }
    }

    // todo Нужно создать методы getParamsFromFillables и getParamsFromData, чтобы убрать весь этот ужас с тернарниками
    public function create($data)
    {
        $result = '';

        (!empty($this->fillable) ? ($this->fillable = '`' . implode('`,`', $this->fillable) . '`') : exit("Заполните массив fillable")
            and (!empty($data) ? ($data = "'" . implode("','", $data) . "'") : exit("Массив значений не может быть пустым"))
            and ((count($this->fillable) != count($this->fillable)) ? exit("Mismatch arrays") :
                ($query = "INSERT INTO {$this->table} ($this->fillable) VALUES($data)")
                and ($result = $this->pdo->prepare($query) and $this->pdo->exec($query))));

        return $result;
    }
}