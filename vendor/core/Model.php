<?php

namespace core;



abstract class Model
{
    public array $fillable = [];
    public array $errors = [];
    public array $rules = [];
    public array $labels = [];
    public function __construct()
    {
        Db::getInstance();
    }
}