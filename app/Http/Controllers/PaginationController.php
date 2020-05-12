<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function index()
    {
        $data = DB::table('users')->paginate(5);
        return view('pagination',compact('data'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $data = DB::table('users')->paginate(5);
            return response()->json(view('pagination',compact('data'))->render());
        }
    }
}
