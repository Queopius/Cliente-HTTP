<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MarketPlaceService;

class MarketPlaceProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(MarketPlaceService $marketPlaceService)
    {
        $this->middleware('auth')->except(['showProduct']);

        parent::__construct($marketPlaceService);
    }

    /**
     * Returns a page with product details
     * @return \Illuminate\Http\Response
     */
    public function showProduct($title, $id)
    {
        $product = $this->marketPlaceService->getProduct($id);

        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    /**
     * Purchase a product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function purchaseProduct(Request $request, $title, $id)
    {
        $this->marketPlaceService->purchaseProduct($id, $request->user()->service_id, 1);

        return redirect()
            ->route('products.show',
                [
                    $title,
                    $id,
                ])
            ->with('success', ['Product purchased']);
    }

    /**
     * Show the form to publish a product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function showPublishProductForm()
    {
        $categories = $this->marketPlaceService->getCategories();

        return view('products.publish')->with([
            'categories' => $categories,
        ]);
    }

    /**
     * Publish a product
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function publishProduct(Request $request)
    {
        $rules = [
            'title' => 'required',
            'details' => 'required',
            'stock' => 'required|min:1',
            'picture' => 'required|image',
            'category' => 'required',
        ];

        $productData = $this->validate($request, $rules);
        $productData['picture'] = fopen($request->picture->path(), 'r');

        $productData = $this->marketPlaceService->publishProduct($request->user()->service_id, $productData);

        $this->marketPlaceService->setProductCategory($productData->identifier, $request->category);

        $this->marketPlaceService->updateProduct($request->user()->service_id, $productData->identifier, ['situation' => 'available']);

        return redirect()
            ->route('products.show',
                [
                    $productData->title,
                    $productData->identifier,
                ])
            ->with('success', ['Product created successfully']);
    }
}
