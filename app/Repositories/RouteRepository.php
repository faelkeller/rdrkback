<?php

namespace App\Repositories;

use App\Route;
use App\Repositories\Contracts\RouteRepositoryInterface;

class RouteRepository implements RouteRepositoryInterface
{
    private $model;

    public function __construct(Route $model){
        $this->model = $model;
    }

    public function getAllRoutesByStart($start, $notEnds = []){
        return $this->model->where(["start" => $start])->whereNotIn("end", $notEnds)->get();;
    }

    public function create($data){
        return $this->model->firstOrCreate($data);
    }
}
