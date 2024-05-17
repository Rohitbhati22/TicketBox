
@include('inculdes.head');
@include('inculdes.nav');

<div style="margin-top:70px;perspective: 1200px;display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;" >

    <div class="movie-grid-book">
      <div class="speaker-box flex-center">
  <div class="vent"></div>
  <div class="speaker small flex-center circle1">
    <div class="ring small flex-center">
        <div class="interior small"></div>
    </div>
  </div>
  <div class="speaker flex-center circle2">
    <div class="ring flex-center">
        <div class="interior"></div>
    </div>
  </div>
</div>

 <div class="movie-view">
      {!!$movie->trailer!!}
    </div>

    <div class="speaker-box flex-center">
  <div class="vent"></div>
  <div class="speaker small flex-center circle1">
    <div class="ring small flex-center">
        <div class="interior small"></div>
    </div>
  </div>
  <div class="speaker flex-center circle2">
    <div class="ring flex-center">
        <div class="interior"></div>
    </div>
  </div>
</div>
    </div>
   

     <div class="grid-container-seats">

   @foreach ($seats as $seat)
   @if($seat->IsBook)         
<button class="grid-item-seats" data-val='{{$seat->seat_id}}' data-book='yes' disabled>
      <i class='bx bx-movie-play' ></i>
      {{$seat->seat_number}}
    </button>
    @else
    @php
       $isInTemp = false;
       foreach ($temp_seats as $temp_seat) {
         if ($seat->seat_id == $temp_seat->seat_id)
         {
          echo " <button class='grid-item-seats' data-val='$seat->seat_id' data-book='yes' style='background-color: red'>
      <i class='bx bx-movie-play' ></i>
      $seat->seat_number
    </button>";
    $isInTemp = true;
         }
  }
         if(!$isInTemp)
         {
            echo "<button class='grid-item-seats' data-val='$seat->seat_id' data-book='no'>
      <i class='bx bx-movie-play' ></i>
       $seat->seat_number
    </button>";
         }
    @endphp
     
@endif
    @endforeach
     </div>

</div>


 
            


<a href="/booked/{{$movie_id}}/{{$screening_id}}" class="float_book">
<i class="fa fa-plus my-float"></i> Book Now
</a>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $(".grid-item-seats").click(function(e){
    console.log("clciked");
  let token = '@csrf';
        token = token.substr(42, 40);
        $.ajax({
            type: "post",
            url: window.location.toString(),
            data: {_token: token,
              seat_id: $(e.currentTarget).data('val')
            },
            success: function (msg) {
              let mesInt = parseInt(msg);
              console.log(mesInt);
              if (mesInt == 2 )
              {
                console.log("In if " + mesInt);
 $(e.currentTarget).css('background-color', 'red');
        $(e.currentTarget).attr('data-book', 'yes');
              }
              else {
                console.log("In else " + mesInt);
                $(e.currentTarget).css('background-color', '#3498db');
        $(e.currentTarget).attr('data-book', 'yes');
              }
              console.log(typeof(msg));
               },
            error: function(err) {
                console.log( $($(err.responseText)[1]).text() )
                debugger;
            }
        });
       
  });
});
</script>

@include('inculdes.footer')