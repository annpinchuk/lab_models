@extends('layouts.app')

@section('title', 'book description')

@section('content')
    <div class="title m-b-md">
        Опис книги:
    </div>

    <div >
        <h1>Назва книги: {{ $book->book_name }}</h1>

        <h1>Жанр: <a href="{{ route('books', $book->genre->id) }}"> {{ $book->genre->genre }}</a></h1>
        @foreach ($book->authors as $author_name)
            <h1>Автор: <a href="{{ route('authors', $author_name->id) }}"> {{ $author_name->author }}</a></h1>
        @endforeach
        <h1>Перейти на<a href='/'> Головну сторінку</a></h1>
    </div>

@endsection

