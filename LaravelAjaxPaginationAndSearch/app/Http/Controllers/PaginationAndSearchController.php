<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use DB;
class PaginationAndSearchController extends Controller
{
    public function page(Request $request)
    { 
        $items=Item::when($request->has("food"),function($q)use($request){
            return $q->where("food","like","%".$request->get("food")."%");
        })->paginate(5);
       
        if($request->ajax()){
            return view('index',['items'=>$items]); 
        } 
        return view('index',compact('items'));
       // return view('index',['items'=>$items]);
    }

    
    public function search()
    { 
        return view('search');
    }

    public function action(Request $request)
    { 
        if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      $status = $request->get('status');

      if($query != '')
      {

        if($status !=''){
            $data = DB::table('items')
            ->where('food', 'like', '%'.$query.'%')
            ->where('status',$status)
            ->paginate(3);
        }else{
            $data = DB::table('items')
            ->where('food', 'like', '%'.$query.'%')
            ->paginate(3);
        }
        
          
         
      }elseif($status !=''){
        $data = DB::table('items')
        ->where('status',$status)->paginate(3);
      }
      else
      {
            $data = DB::table('items')
            ->paginate(3);
          
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->id.'</td>
         <td>'.$row->food.'</td>
         <td>'.$row->status.'</td>
        </tr>
        ';
       }
       $output .='
        <tr>
            <td colspan="2" align="center">'.$data->links().'</td>
        </tr>
       ';
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



    public function pagination(Request $request){
      //  $items = Item::all();
        $items=Item::when($request->has("food"),function($q)use($request){
            return $q->where("food","like","%".$request->get("food")."%");
        })->paginate(5);
        return view('page',["items"=>$items]);
    }


}
