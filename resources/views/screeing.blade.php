
@include('inculdes.head');
@include('inculdes.nav');

<main>
<div class="shows" style="margin-top: 70px">
   @foreach ($screens as $screen)
                <a href="{{ url('/book/' . $movie->movie_id.'/'.$screen->screening_id) }}" class="button-50">
                    <div>
                    <h2 style="margin-top: 10px">{{ $movie->title }}</h2>
                    <h3 style="margin-top: 10px">{{$screen->start_time}} To {{$screen->end_time}}</h3>
                    <h3 style="margin-top: 10px">{{$screen->date}}</h3>
                    </div>
                </a>
            @endforeach
</div>
</main>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
@include('inculdes.footer')