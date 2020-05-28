<?php

namespace App\Services\Contracts;

interface RouteServiceInterface
{
    public function quote($start, $end);
    public function create($data = []);
}
