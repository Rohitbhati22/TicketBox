
@include('inculdes.head');
@include('inculdes.nav');

  <div class="container" style="margin-top: 70px">
        <h1>Current Runing Movies</h1>
        <div class="grid">
             @foreach ($movies as $movie)
                <a href="{{ url('/show/' . $movie->slug) }}" class="card-link">
                    <div class="card_movie">
                        <img src="{{ $movie->poster }}" alt="Poster for {{ $movie->title }}" class="card-img">
                        <div class="card-content">
                            <h2 class="card-title">{{ $movie->title }}</h2>
                            <p class="card-text">{{ $movie->about }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@include('inculdes.footer')