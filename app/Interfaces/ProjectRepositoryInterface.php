<?php
namespace App\Interfaces;


interface ProjectRepositoryInterface
{
    public function all();

    public function create(array $data);

}