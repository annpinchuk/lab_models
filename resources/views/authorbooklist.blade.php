@extends('layouts.app')

@section('title', 'book list')

@section('content')
    <div class="title m-b-md">
        Список книг автора: {{ $author->author}}
    </div>

    <div>
        <ul class="catalog_genre">
            @foreach ($author->books as $book)
                <li>
                    <a href="{{ route('book', $book->id) }}"><h1>{{ $book->book_name }}</h1></a>
                </li>
            @endforeach
        </ul>
        <h1>Перейти на<a href='/'> Головну сторінку</a></h1>
    </div>

@endsection

