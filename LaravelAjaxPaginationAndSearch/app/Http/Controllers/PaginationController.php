<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PaginationController extends Controller
{
    function index()
    {
    
     $items = DB::table('items')->orderBy('id', 'asc')->paginate(5);
    
     return view('webslesson.pagination', compact('items'));
     //  <!-- @include('pagination_data') -->
    }

    function fetch_data(Request $request)
    {
     if($request->ajax())
     {
       
      $sort_by = $request->get('sortby');
      $sort_type = $request->get('sorttype');
            $query = $request->get('query');
            $query = str_replace(" ", "%", $query);
      $items = DB::table('items')
                    ->where('id', 'like', '%'.$query.'%')
                    ->orWhere('food', 'like', '%'.$query.'%')
                    ->paginate(5);
      return view('webslesson.pagination_data', compact('items'))->render();
     }
    }
}
