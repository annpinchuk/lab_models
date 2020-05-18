<div class="catalog">
    <h3>Книжки на складі:</h3>
    @php
        $all_books = App\Book::all();
    @endphp
    <ul>
        @foreach ($all_books as $book)
            <li>
                <a href="{{ route('book', $book->id) }}"><h3>{{ $book->book_name }}</h3></a>
            </li>
        @endforeach
    </ul>
</div>
