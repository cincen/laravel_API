@extends('layouts.app')

@section('content')
    <h1>Data</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category</th>
                <th>Data</th>
                <th>Last Update</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category }}</td>
                    <td>{{ json_decode($item->data, true)['nama_field'] }}</td>
                    <td>{{ $item->last_update }}</td>
                    <td>
                        <a href="{{ route('data.edit', $item->id) }}">Edit</a>
                        <form action="{{ route('data.destroy', $item->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection