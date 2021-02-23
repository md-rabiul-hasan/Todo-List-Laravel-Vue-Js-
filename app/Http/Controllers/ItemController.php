<?php

namespace App\Http\Controllers;

use App\Models\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::orderBy('created_at', 'DESC')->get();
        return $items;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Item();
        $item->name = $request->item['name'];
        $item->save();
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existing_item = Item::find($id);

        if( $existing_item ){
            $existing_item->compleated = $request->item['compleated'] ? true : false;
            $existing_item->compleated_at = $request->item['compleated'] ? Carbon::now() : null;
            $existing_item->save();
            return $existing_item;
        }else{
            $data = [
                "status" => 404,
                "message" => "item not found"
            ];
            return response()->json($data);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existing_item = Item::find($id);

        if( $existing_item ){
            $existing_item->delete();
            $data = [
                "status" => 200,
                "message" => "Item delete successfully"
            ];
            return response()->json($data);
        }else{
            $data = [
                "status" => 404,
                "message" => "item not found"
            ];
            return response()->json($data);
        }
    }
}
