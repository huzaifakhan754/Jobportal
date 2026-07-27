<?php

namespace App\Http\Controllers;

use App\Models\job;
use Exception;
use Illuminate\Http\Request;

class jobController extends Controller
{
    function create(Request $req)
    {
        try {
            $data = job::create($req->all());
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

    function jobtype()
    {
        try {
            $data = job::all();
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

    function delete($id)
    {
        try {
            $data = job::find($id);
            job::destroy($data->id);
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
}
