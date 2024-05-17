
@include('inculdes.head');
@include('inculdes.nav');

<section class="section_c slider-section">
  <div class="container_c slider-column">
    <div class="swiper swiper-slider">
      <div class="swiper-wrapper">
    
          @foreach($banners as $banner)
           <div class="swiper-slide">
<img src="{{$banner->img}}" alt="Swiper">
<div class="center_in_c">
<h4 class="title_in_c">{{$banner->title}}</h4>
<a class="button_in_c" href="/show/{{$banner->action}}">Book Now!</a>
</div>

        </div>
         @endforeach
      </div>
      <span class="swiper-pagination"></span>
      <span class="swiper-button-prev"></span>
      <span class="swiper-button-next"></span>
    </div>
  </div>
</section>

  <div class="container">
        <h1>Current Movies</h1>
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