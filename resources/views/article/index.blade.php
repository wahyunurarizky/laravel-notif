@extends('layout.main')

@section('container')
    <h1>Article page Laravel 1</h1>

    <table class="table" id="tableArticle">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Author</th>
            </tr>
        </thead>
        <tbody id="tableRow">
            @foreach ($articles as $a)
                <tr>
                    <td>{{ $a->title }}</td>
                    <td>{{ $a->content }}</td>
                    <td>{{ $a->author->name }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
