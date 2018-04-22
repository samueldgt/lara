<?php

namespace App\Http\Controllers;

use App\Shipper;
use App\User;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $shippers = Shipper::all();
        return response()->json(
            $shippers
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->json()->all();
        $validator = $this->validator($data);
        if ($validator->fails()) {
            return response()->json([
                "error" => $validator->errors()
            ])->setStatusCode(self::BAD_REQUEST);
        }

        $shipper = new Shipper;
        $shipper->name = $data["name"]; 
        if (!$shipper->save()){
            return response()->json([
                "error" => "Someting went wrong, please try again"
            ])->setStatusCode(self::BAD_REQUEST);
        } 

        return response()->json(
            $validator
        );
        
        // $shipper = new Shipper;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function show(Shipper $shipper)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipper $shipper)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipper $shipper)
    {
        //
    }

    private function validator($data)
    {
        return \Validator::make($data, [
          'name' => 'required|unique:shippers|max:255',
        ]);
    }
}
