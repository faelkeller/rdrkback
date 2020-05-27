<?php

namespace App\Http\Controllers;

use App\Http\Requests\CalculateRouteRequest;

class RouteController extends Controller
{

    protected $calculateRouteRequest;

    public function __construct(
        CalculateRouteRequest $calculateRouteRequest
    )
    {
        $this->calculateRouteRequest = $calculateRouteRequest;
    }

    public function quote($start = "", $end = "")
    {
        $this->calculateRouteRequest->validate($start, $end);

        return json_encode([]);
    }
}
