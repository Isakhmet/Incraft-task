@extends('layout')
@section('mycontent')
<table class="table table-bordered">
    <tr>
        <th>Author</th>
        <th>Books</th>
    </tr>
        @foreach($data as $key => $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>
            @foreach($books[$key] as $book)
                <ol>{{$book}}</ol>
            @endforeach
        </td>
        </tr>
            @endforeach
</table>
<span>{{$data->links()}}</span>
@endsection


