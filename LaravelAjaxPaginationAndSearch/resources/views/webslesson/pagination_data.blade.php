@foreach($items as $row)
<tr>
       <td>{{$row->id}}</td>
       <td>{{$row->food}}</td>
       <td>{{$row->price}}</td>
</tr>
@endforeach
<tr>
   <td colspan="3" align="center">
       {{ $items->links() }}
   </td>
</tr>
