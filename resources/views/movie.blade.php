
@include('inculdes.head');
@include('inculdes.nav');

 <div class="movie-container">
        <div class="movie-grid">
            <div class="movie-poster">
                <img src="{{ $movie->poster }}" alt="Poster of {{ $movie->title }}">
            </div>
            <div class="movie-content">
                <h1>{{ $movie->title }}</h1>
                <p>{{ $movie->about }}</p>
                <p>Showtimes: </p>
            {!! $movie->trailer !!}
                <a href="/book/{{$movie->movie_id}}" class="btn">Book Tickets</a>
            </div>
        </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@include('inculdes.footer')