
@include('inculdes.head');
@include('inculdes.nav');

<div style="margin-top:70px;display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;">



 <div class="movie-container">
        <div class="movie-grid">
            <div class="movie-poster">
             <dotlottie-player src="https://lottie.host/b5171f1e-7711-47b3-a2a7-c746ffb7645c/1SKtSDKUWj.json" speed="1" style="height: 500px" direction="1" playMode="normal" loop autoplay></dotlottie-player>
            </div>
            <div class="movie-content" style="align-items: center;
    justify-content: center;
    display: flex;
    padding: 20px;
    height: 100%;">
                <div class="ticket">
        <div class="left-panel">
            <div class="ticket-section">
                <strong>THEATER: 1</strong></div>
                <div class="ticket-section">
                    <strong>SEATS:</strong> 
                @foreach ($seats as $seat)
                    {{$seat->seat_number}}
                    , 
                @endforeach
            </div>
            <div class="ticket-section">
                <strong>DATE:</strong> {{$screening->date}}
            </div>
           
            <div class="barcode">
                <img src="https://developers.google.com/static/ml-kit/vision/barcode-scanning/images/qrcode.png" alt="Barcode">
            </div>
        </div>
        <div class="right-panel">
            <div class="ticket-header">TICKETBOX</div>
            <div class="ticket-section">
                <strong>{{$movie->title}}</strong>
            </div>
            <div class="ticket-section">
                <strong>START AT: {{$screening->start_time}}</strong>
            </div>
            <div class="ticket-section">
                <strong>END AT: {{$screening->end_time}}</strong>
            </div>
            <hr>
            <div class="ticket-section">
                <br>
                <center><strong><b>RULES TO KEEP IN MIND</b></strong></center>
                <br>
                <strong>Ticket Validity:</strong> This ticket is only valid for the specified movie screening on the indicated date and time.<br>
                <strong>No Refunds:</strong> Tickets are non-refundable and non-transferable.<br>
                <strong>No Outside Food or Drink:</strong> Outside food and beverages are not permitted in the cinema.<br>
                <strong>Late Arrivals:</strong> Latecomers may not be admitted until a suitable break in the movie.<br>
            </div>
        </div>
    </div>
            </div>
        </div>
    </div>

  
    <button class="btn" onclick="printTicket('{{ asset('/ass/ad.mp3') }}')" style="margin: 7px">Download Ticket</button>

<embed loop="true" src="" hidden="true" type="video/quicktime"></embed>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>


<script>
    const audio = document.createElement("audio");
  audio.muted = true;

function play(src) {
    audio.pause();
    audio.muted = false;
    const source = document.createElement("source");
    source.src = src;
    audio.appendChild(source);
    audio.currentTime = 0;
    audio.play();
  }
  
  function printTicket(src) {
      play(src);
            window.print();
          
        }

        function downloadPDF(src) {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            doc.text("Avengers: Endgame", 10, 10);
            doc.text("Date: 2024-05-12", 10, 20);
            doc.text("Time: 7:00 PM", 10, 30);
            doc.text("Theater: Theater 12", 10, 40);
            doc.text("Seat: A1", 10, 50);

            doc.save('movie_ticket.pdf');
            play(src);
        }

</script>
 
<script src="https://unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.mjs" type="module"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


@include('inculdes.footer')