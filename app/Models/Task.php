<?php
/**
 *  Tasks model. Here we wil get all data about tasks.
 */
namespace app\Models;
/**
 *  Класс, управляющий работой заданий
 */
class Task extends BaseModel
{
    protected $table = "tasks";
    public $fillable = ['name','description', 'priority', 'deadline'];
}