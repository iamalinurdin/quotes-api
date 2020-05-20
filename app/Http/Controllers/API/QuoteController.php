<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Quote;
use App\Http\Resources\QuoteResource;

class QuoteController extends Controller
{
	public function index()
	{
		$quotes = Quote::all();

		return QuoteResource::collection($quotes);
	}

    public function store(Request $request)
    {
    	$quote = Quote::create([
    		'user_id' => auth()->id(),
    		'quote' => $request->quote,
    	]);


    	return new QuoteResource($quote);
	}
	
	public function show(Quote $quote)
	{	
		return new QuoteResource($quote);
	}

	public function update($id)
	{
		$quote = Quote::find($id);
		// dd($request->quote);
		$quote->quote = 'quote milik jurgen diupdate';
		$quote->save();

		return new QuoteResource($quote);
	}
}
