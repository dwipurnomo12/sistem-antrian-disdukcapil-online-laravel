@extends('layouts.main')

@section('container')

    @include('antrian.create')

    <!-- ======= View Antrian Depan / Frontend ======= -->
    <section id="services" class="services">
        <div class="container" data-aos="fade-up">
  
          <div class="section-title">
            <h2>Antrian</h2>
            <p>Ambil Antrian Online</p>
          </div>
  
          <div class="row">

            <!-- Alert Sukses -->
            @if(session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert"> {{ session('success') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <!-- Alert Error -->
            @if(session()->has('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
                 
            <div id="liveAlertPlaceholder"></div>
            
            <!-- Menampilkan Data Antrian -->
            @foreach ($antrianList as $key => $antrian)
            <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                <div class="icon-box">
                
                  <div class="icon"><i class="bx bx-link-external"></i></div>
                  <h4>{{ $antrian->nama_layanan }}</h4>
                  <p>{{ $antrian->deskripsi }}</p>

                  <!-- Mengecek Apakah User Sudah Login Atau Belum -->
                  <div class="mt-3">
                    @auth
                      <!-- Jika Kondisi Belum Login, Maka Menampilkan Alert Anda harus Login Dahulu -->
                      @if($antrian->ambilantrians->contains('user_id', Auth::id()))
                        <button type="button" class="btn btn-primary" id="containsButton">Ambil Antrian</button>
                      <!-- Jika Kondisi Sudah Login, Maka Menampilkan Modal Tambah Antrian-->
                      @else
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-id="{{ $antrian->id }}" data-bs-target="#exampleModal">
                          Ambil Antrian
                        </button>
                      @endif
                    <!-- Jika Kondisi Sudah Pernah Mengambil Antrian Di Layanan Yang Sama, Maka Muncul Alert Anda Sudah Mengambil Antrian ini -->
                    @else
                      <button type="button" class="btn btn-primary" id="liveAlertBtn{{ $key }}" data-id="{{ $key }}">Ambil Antrian</button>
                    @endauth
                    <div id="containsButtonlivePlaceholder"></div>
                  </div>
                </div>
          
                <!-- Menampilkan Accordion Yang Berisi Informasi & Persyaratan layanan -->
                <div class="accordion" id="accordionExample{{ $key }}">
                  <div class="accordion-item">
                    <h2 class="accordion-header">
                      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $key }}" aria-expanded="false" aria-controls="collapse{{ $key }}">
                        Informasi & Persyaratan
                      </button>
                    </h2>
                    <div id="collapse{{ $key }}" class="accordion-collapse collapse" data-bs-parent="#accordionExample{{ $key }}">
                      <div class="accordion-body">
                        {{ $antrian->persyaratan }}
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
          </div>

        </div>
      </section>

        <!-- Menampilkan Modal Tambah Antrian -->
        <script>
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button yang men-trigger modal
                var slug = button.data('id') // Extract info dari data-* attributes
                var modal = $(this)
                modal.find('.modal-title').text('Pengambilan Nomor Antrian')
                modal.find('.modal-body #antrian_id').val(slug)
            })
        </script>

        <!-- Alert Jika User Belum Login Dan ingin Mengambil Antrian, Maka Akan Muncul Alert Ini -->
        <script>
          const alertPlaceholder = document.getElementById('liveAlertPlaceholder')
          const appendAlert = (message, type) => {
              const wrapper = document.createElement('div')
              wrapper.innerHTML = [
                  `<div class="alert alert-${type} alert-dismissible" role="alert">`,
                  `   <div>${message}</div>`,
                  '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
                  '</div>'
              ].join('')
              alertPlaceholder.append(wrapper)
          }
          
          const alertTriggers = document.querySelectorAll('[id^="liveAlertBtn"]')
          if (alertTriggers.length > 0) {
              alertTriggers.forEach(alertTrigger => {
                  alertTrigger.addEventListener('click', () => {
                      const auth = {{ auth()->check() ? 'true' : 'false' }};
                      if (!auth) {
                          appendAlert('Anda harus login terlebih dahulu', 'warning')
                      }
                  })
              })
          }
        </script>

        <!-- Alert Jika User sudah pernah mengambil antrian di layanan yang sama -->
        <script>
          const alertPlaceholder2 = document.getElementById('containsButtonlivePlaceholder')
          const appendAlert2 = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = [
              `<div class="alert alert-${type} alert-dismissible" role="alert">`,
              `   <div>${message}</div>`,
              '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
              '</div>'
            ].join('')

            alertPlaceholder2.append(wrapper)
          }

          const alertTrigger = document.getElementById('containsButton')
          if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
              appendAlert('Anda sudah mengambil antrian ini, <a href="/antrian/detail" class="alert-link">Cek Detail</a>', 'danger')
            })
          }
        </script>


@endsection