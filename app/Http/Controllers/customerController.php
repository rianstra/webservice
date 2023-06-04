<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class customerController extends Controller
{
    public function index()
    {
        $data = customer::all();
        return response()->json($data,200);
    }

    public function show($id)
    {
        $data =customer::where('id',$id)->first();
        if (empty($data)) {
            return response()->json([
                'pesan'=>'Data tidak ditemukan',
                'data '=> $data
            ], 404);
        }
        return response ()->json([
            'pesan'=>'Data diterima',
            'data'=> $data

        ], 200);
    }
    public function store (Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required',
            'adress'=>'required|min:5',
        ]);

        if ($validate->fails()){
            return $validate->errors();
        }
        $data = customer::create($request->all());
        return response()->json([
            'pesan'=>'Data berhasil disimpan',
            'data'=> $data
        ],201);
    }

    public function update(Request $request,$id)
    {
        $data = customer::where('id',$id)->first();

        if (empty($data)){
            return response()->json([
                'pesan'=> 'Data tidak diterima',
                'data'=>$data
            ], 404);
        }
        $validate = Validator::make($request->all(),[
            'name'=>'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|min:5',
        ]);

        if ($validate->fails()){
            return $validate->errors();
        }
        $data->update($request->all());

        return response()->json([
            'pesan'=> 'Data berhasil di update',
            'data'=> $data
        ], 201);

    }

    public function delete($id)
    {
        $data = costomer::where('id',$id)->first();
        if (empty($data)){
            return response()->json([
                'pesan'=> 'Data tidak diterima',
                'data'=>$data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan'=> 'Data berhasil di hapus',
            'data'=>$data
        ], 200);
    }
}
