<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Display Panggilan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  </head>
  <style>
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
  </style>
  <body>
    {{-- <nav class="navbar bg-body-tertiary mb-4">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Antrian</a>
        </div>
      </nav> --}}
      <div class="container-fluid">
        <div class="row my-3">
            <div class="col-md-6" style="height: 400;">
                <div class="media">
                    <div class="media-body">
                        <iframe width="650" height="400" src="https://www.youtube-nocookie.com/embed/yNKvkPJl-tg?controls=0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        
            <div class="col-md-6" style="height: 400;">
                @foreach ($antrianList->take(2) as $antrian)
                    <div class="card mb-3">
                        <div class="card-header bg-warning">
                            <div class="card-title"><h2 style="text-align: center">{{ $antrian->nama_layanan }}</h2></div>
                        </div>
                        <div class="card-body bg-body-tertiary">
                            <div class="layanan" data-antrian-id="{{ $antrian->id }}">
                                <h1 class="display-1"></h1>
                                <span></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

            <div class="row">
                @foreach ($antrianList->slice(2) as $antrian)
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-warning">
                                <div class="card-title"><h2>{{ $antrian->nama_layanan }}</h2></div>
                            </div>
                            <div class="card-body bg-body-tertiary">
                                <div class="layanan" data-antrian-id="{{ $antrian->id }}">
                                    <h1 class="display-1"></h1>
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        

   
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        function updateNomorAntrian() {
            $('.layanan').each(function() {
                var layananElement = $(this);
                var antrianId = layananElement.data('antrian-id');
                var layananContainer = layananElement.find('span');
                var kodeContainer = layananElement.find('h1');

                // Ganti 'URL_ANTRIAN' dengan URL endpoint yang mengambil nomor antrian saat ini dari backend
                $.get('/display-panggilan/get-nomor-antrian', { antrian_id: antrianId }, function(data) {
                    kodeContainer.text(data.kode);
                    layananContainer.text(data.layanan);
                });
            });
        }

        // Panggil fungsi updateNomorAntrian setiap 5 detik
        setInterval(updateNomorAntrian, 5000);

        // Panggil fungsi updateNomorAntrian saat halaman pertama kali dimuat
        $(document).ready(function() {
            updateNomorAntrian();
        });
    </script>
  </body>
</html>
