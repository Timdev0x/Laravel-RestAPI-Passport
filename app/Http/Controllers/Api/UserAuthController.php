<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class UserAuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $data = [

            "name" => $request->name,
            "email" => $request->email,
            "password"=>bcrypt($request->password),

        ];

        $user = User::create($data);
        $token = $user->createToken('DevSolutions')->accessToken;
        $user->token=$token;
       
       return response()->json(
            [
                'data'=> [
                    "status" => true,
                    "message" => "success",
                    "data" => $user

                ]

                ],
                200

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         

        $user = User::all();
        return response()->json(
            [
                'data'=> [
                    "status" => true,
                    "message" => "success",
                    "data" => $user

                ]

                ],
                200

            );
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
        $user = User::find($id);
        $user->name = $request->name;
        $user->save();
        return response()->json(
            [
                "data" => [
                    "type" => "activities",
                    "message" => "Success",
                    "data" => $user,
                ],
            ],
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function delete(Request $request, $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(
            [
                "data" => [
                    "type" => "activities",
                    "message" => "Success",
                    "data" => "deleted!",
                ],
            ],
            200
        );
    }




}
