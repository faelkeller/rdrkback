<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Route;

class RouteController extends Controller
{

    protected $quoteRequest;
    protected $route;

    public function __construct(QuoteRequest $quoteRequest, Route $route
    ){
        $this->quoteRequest = $quoteRequest;
        $this->route = $route;
    }

    public function quote($start = "", $end = ""){
        $this->quoteRequest->validate($start, $end);

        $quote = $this->route->quote($start, $end);

        return json_encode($quote);
    }
}
