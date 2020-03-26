<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarketService;
use App\Services\MarketPlaceService;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MarketService $marketService, MarketPlaceService $marketPlaceService)
    {
        $this->middleware('auth');

        parent::__construct($marketService);
        parent::__construct($marketPlaceService);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the purchases of the user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showPurchases(Request $request)
    {
        $purchases = $this->marketService->getPurchases($request->user()->service_id);

        $purchases = $this->marketPlaceService->getPurchases($request->user()->service_id);

        return view('purchases')->with([
            'purchases' => $purchases,
        ]);
    }

    /**
     * Show the products of the user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showProducts(Request $request)
    {
        $publications = $this->marketService->getPublications($request->user()->service_id);

        $publications = $this->marketPlaceService->getPublications($request->user()->service_id);

        return view('publications')->with([
            'publications' => $publications,
        ]);
    }
}
