<?php

namespace App\Repositories\Contracts;

interface RouteRepositoryInterface
{
    public function getAllRoutesByStart($start, $notEnds = []);
}
