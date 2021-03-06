<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\d111811007_admin;
use Illuminate\Support\Facades\Validator;

class d111811007_adminController extends Controller
{
    public function index()
    {
        $d111811007_admin = d111811007_admin::latest()->get();
        return response()->json([
            'success' => true,
            'message' => 'List Data d111811007_admin',
            'data'    => $d111811007_admin
        ], 200);
    }

    public function show($id)
    {
        $d111811007_admin = d111811007_admin::findOrfail($id);
        return response()->json([
            'success' => true,
            'message' => 'Detail Data d111811007_admin',
            'data'    => $d111811007_admin
        ], 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
            'password'   => 'required',
        ]);
        //response error validation
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        //save to database
        $d111811007_admin = d111811007_admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ]);
        if ($d111811007_admin) {
            return response()->json([
                'success' => true,
                'message' => 'd111811007_admin Created',
                'data' => $d111811007_admin
            ], 201);
        }
    }
    public function update(Request $request, d111811007_admin $d111811007_admin)
    {
        $validator = Validator::make($request->all(), [
            'name'   => 'required',
            'email' => 'required',
            'password'   => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }
        $d111811007_admin = d111811007_admin::findOrFail($d111811007_admin->id);
        if ($d111811007_admin) {
            $d111811007_admin->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password
            ]);
            return response()->json([
                'success' => true,
                'message' => 'd111811007_admin Update',
                'data' => $d111811007_admin
            ], 200);
        }
    }
    public function destroy($id)
    {
        $d111811007_admin = d111811007_admin::findOrFail($id);

        if ($d111811007_admin) {
            $d111811007_admin->delete();
            return response()->json([
                'success' => true,
                'success' => 'd111811007_admin Deleted',
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'd111811007_admin Not Found',
        ], 404);
    }
}
