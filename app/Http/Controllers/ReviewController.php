<?php

namespace App\Http\Controllers;

use App\Model\Review;
use App\Model\Product;
use App\Http\Resources\ReviewCollection;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\ReviewRequest;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // get review of product by // http://elarapi.test/api/products/16/reviews
        return ReviewCollection::collection($product->reviews);
        //return $product->reviews;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewRequest $request,Product $product)
    {
        /* $review =   new Review();
        $review->product_id =   $product->id;
        $review->customer   =   $request->customer;
        $review->review =   $request->review;
        $review->star   =   $request->star; */
        $request['review']      =   $request['body'];
        unset($request['body']);
        $review =   new Review($request->all());
        $product->reviews()->save($review);

        return response([
            'data' => new ReviewCollection($review)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product, Review $review)
    {
        //return $review;
        //return $review->all();
        $request['review']  =   $request['body'];
        unset($request['body']);

        $product->reviews()->update($request->all());
        //$review->update($request->all());
        return response([
            'data' => new ReviewCollection($product->reviews->find($review->id))
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, Review $review)
    {
        $product->reviews()->delete($review);
        return response(null,Response::HTTP_NO_CONTENT);

    }
}
