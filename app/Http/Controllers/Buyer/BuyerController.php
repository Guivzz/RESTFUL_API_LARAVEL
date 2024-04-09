<?php

namespace App\Http\Controllers\Buyer;

use App\Http\Controllers\ApiController;
use App\Models\Buyer;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Gate;

class BuyerController extends ApiController
{
    public function __construct()
    {
        parent::__construct();

        $this->middleware('scope: read-general')->only('show');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->allowedAdminAction();
        $buyers = Buyer::has('transactions')->get();

        return $this->showAll($buyers);
    }

    /**
     * Display the specified resource.
     */
    public function show(Buyer $buyer)
    {
        return $this->showOne($buyer);
    }
}
