<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaginationController extends Controller
{
    public function index()
    {
        $paginator = DB::table('users')->paginate(5);
        return view('pagination',compact('paginator'));
    }

    public function fetchData(Request $request)
    {
        if($request->ajax()) {
            $paginator = DB::table('users')->paginate(5);
            return response()->json(view('pagination',compact('paginator'))->render());
        }
    }
}
