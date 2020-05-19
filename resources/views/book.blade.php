@extends('layout')
@section('mycontent')
<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Genre</th>
        <th>Publish</th>
        <th>Year</th>
        <th>ISBN</th>
        <th>Author</th>
    </tr>
        @foreach($data as $key => $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->genre}}</td>
            <td>{{$item->publishing}}</td>
            <td>{{$item->year}}</td>
            <td>{{$item->ISBN}}</td>
            <td>{{$authors[$key]}}</td>
        </tr>
            @endforeach
</table>
<span>{{$data->links()}}</span>
@endsection


