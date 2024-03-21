<?php
namespace App\Interfaces;


interface UserRepositoryInterface
{
    public function all();

    public function infor();

    public function findByName(String $name);
}