<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination</title>
    <style>
        .pagination{
            display:flex;
        }
        .pagination li{
            list-style: none;
            padding:5px;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <th>Id</th>
            <th>Food</th>
        </tr>
       
            @foreach($items as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->food}}</td>
                </tr>
            @endforeach
            <tr id="pagination" >
              <td>{{ $items->links() }}</td>
            </tr>

                   
    </table>
</body>
</html>