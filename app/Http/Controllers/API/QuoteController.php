<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\StoreQuoteRequest;
use App\Http\Requests\API\UpdateQuoteRequest;
use App\Http\Resources\API\QuoteResource;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return QuoteResource::collection(Quote::paginate(5));
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
    public function store(StoreQuoteRequest $request)
    {
        // $validate = $request->validate([
        //     'text' => 'required|min:10',
        //     'author' => 'required|min:5',
        // ]);
        // if ($validate) {
        //     $quote = Quote::create($validate);
        //     return new QuoteResource($quote);
        // }

        return new QuoteResource(Quote::create($request->validated()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Quote $quote)
    {
        return new QuoteResource($quote);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    // cara kurang siip
    // public function update(Request $request, $id)
    // {
    //     //cara 1
    //     //   $validated = $request->validate([
    //     //     'text' => 'required|min:10',
    //     //     'author' => 'required|min:5',
    //     // ]);
    //     // //jika berhasil diupdate
    //     // if ($validated) {
    //     //     //ambil data di db menggunkanan model
    //     //     $data = Quote::find($id);

    //     //     if ($data) {
    //     //         //jika ada data kita update
    //     //         $data->update($validated);
    //     //         return response()->json($data);
    //     //     }else{
    //     //         //jika tidak ada data maka error
    //     //         return response()->json(["message" => "Quote Not Founds"], 404);
    //     //     }
    //     // }

    //     //cara2
    //     //    $validated = $request->validate([
    //     //     'text' => 'required|min:10',
    //     //     'author' => 'required|min:5',
    //     // ]);
    //     // if ($validated) {
    //     //     $data = Quote::findOrFail($id)->update($validated);
    //     //     return response()->json($data);
    //     // }
    // }

    public function update(UpdateQuoteRequest $request, Quote $quote)
    {
        // $quote->update($request->validated());
        // return new QuoteResource($quote);
        return new QuoteResource(tap($quote)->update($request->validated()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();
        return response()->noContent();
    }
}
