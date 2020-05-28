<?php

namespace App\Services;

use App\Route;

class RouteService
{
    protected $routesForEnd = [];
    protected $route;

    public function __construct(Route $route){
        $this->route = $route;
    }


    public function quote($start, $end){
        $routesByStart = $this->getAllRoutesByStart($start, $end);

        return $this->checkPrice($routesByStart);
    }

    protected function checkPrice($routes){

        if (sizeof($routes) == 0 || sizeof($this->routesForEnd) == 0){
            return json_encode([
                "erro" => "Rota não encontrada"
            ]);
        }

        $keyMinPrice = null;
        $minPrice = null;

        foreach ($this->routesForEnd as $key => $route){
            if ($key == 0 || $minPrice > $route["sumprice"]){
                $keyMinPrice = $key;
                $minPrice = $route["sumprice"];
            }
        }

        return [
            "route" => implode(", ", $this->routesForEnd[$keyMinPrice]["completeroute"]),
            "price" => $this->routesForEnd[$keyMinPrice]["sumprice"]
        ];
    }

    protected function getAllRoutesByStart($start, $end, $notEnds = [], $completeRoute = [], $sumPrice = 0){
        $quotes = $this->route->where(["start" => $start])->whereNotIn("end", $notEnds)->get();

        $routes = [];

        if ($quotes->count() == 0){
            return $routes;
        }

        if (sizeof($completeRoute) == 0){
            $completeRoute[] = $start;
        }

        foreach ($quotes as $quote){

            if (!in_array($quote->start, $notEnds)){
                $notEnds[] = $quote->start;
            }

            $routes[$quote->end]["sumprice"] = $sumPrice + $quote->price;
            $routes[$quote->end]["completeroute"] = array_merge($completeRoute, [$quote->end]);
            $routes[$quote->end]["itens"] = ($quote->end == $end) ? $this->returnEnd($routes[$quote->end]["completeroute"], $routes[$quote->end]["sumprice"]) : $this->getAllRoutesByStart($quote->end, $end, $notEnds, $routes[$quote->end]["completeroute"], $routes[$quote->end]["sumprice"]);

        }

        return $routes;

    }

    protected function returnEnd($completeRoute, $sumPrice){
        $this->routesForEnd[] = [
            'completeroute' => $completeRoute,
            'sumprice' => $sumPrice
        ];

        return [];
    }
}