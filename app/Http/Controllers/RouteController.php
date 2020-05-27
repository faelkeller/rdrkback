<?php

namespace App\Http\Controllers;

use App\Http\Requests\QuoteRequest;

class RouteController extends Controller
{

    protected $quoteRequest;

    public function __construct(
        QuoteRequest $quoteRequest
    )
    {
        $this->quoteRequest = $quoteRequest;
    }

    public function quote($start = "", $end = "")
    {
        $this->quoteRequest->validate($start, $end);

        return json_encode([]);
    }
}
