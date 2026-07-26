<?php

namespace App\Http\Controllers;

use App\Models\jobtype;
use Exception;
use Illuminate\Http\Request;

class jobtypeController extends Controller
{
    function jobtype()
    {
        try {
            $data = jobtype::all();
            return response()->json([
                "Status" => true,
                "Data" => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Status" => false,
                "Massege" => "Data not found",
                "Erroe" => $e->getMessage()
            ], 404);
        }
    }

    function create(Request $req)
    {
        try {
            $data = jobtype::create($req->all());
            return response()->json([
                "Status" => true,
                "Massege" => "Data is inserted",
                "Data" => $data
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Status" => false,
                "Massege" => "Data is not inserted",
                "Erroe" => $e->getMessage()
            ]);
        }
    }

    function delete($id)
    {
        try {
            $data = jobtype::find($id);
            jobtype::destroy($data->id);
            return response()->json([
                "Status" => true,
                "Massege" => "Data is Deleted",
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Status" => false,
                "Massege" => "Data is not inserted",
                "Erroe" => $e->getMessage()
            ]);
        }
    }

    function update($id, Request $req)
    {
        try {
            $data = jobtype::findOrfail($id);
            $data->update($req->all());
            return response()->json([
                "Status" => true,
                "Massege" => "Data is Updated",
                "Data"=>$data
            ]);
        } catch (Exception $e) {
            return response()->json([
                "Status" => false,
                "Massege" => "Data is not Updated",
                "Erroe" => $e->getMessage()
            ]);
        }
    }
}
