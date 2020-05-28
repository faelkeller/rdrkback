<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;
use App\Services\Contracts\RouteServiceInterface;

class RouteController extends Controller
{

    protected $quoteRequest;
    protected $routeService;

    public function __construct(QuoteRequest $quoteRequest, RouteServiceInterface $routeService){
        $this->quoteRequest = $quoteRequest;
        $this->routeService = $routeService;
    }

    public function quote($start = "", $end = ""){
        $this->quoteRequest->validate($start, $end);

        $quote = $this->routeService->quote($start, $end);

        return json_encode($quote);
    }
}
