@extends('layouts.app')

@section('title', 'enter books')

@section('content')
    <div class="title m-b-md">
        Склад книжок
    </div>

    <div>
        <form class="form_sign-in" method="post" action="{{ route('addbook') }}">
            @csrf
            <h2>Занести книгу до бази</h2>
            <input class="enter" type="text" name="book_name" placeholder="Назва книжки" required>
            <input class="enter" type="text" name="author" placeholder="Автор" required>

            <input class="enter" type="text" name="genre" placeholder="Жанр" required>

            <div>
                <input type="submit" name="submit" value="Continue">
            </div>

        </form>
    </div>
    <h2 style="text-align: center">{{ $message }}</h2>

    
    @include('catalog')
@endsection

