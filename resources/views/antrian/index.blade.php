@extends('layouts.main')

@section('container')

    @include('antrian.create')

    <section id="services" class="services">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Antrian</h2>
                <p>Ambil Antrian Online</p>
            </div>

            <!-- Alert Sukses -->
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- Alert Error -->
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <!-- 🔥 CEK VERIFIKASI USER -->
            @if (auth()->check() && auth()->user()->is_verification == false)
                <div class="alert alert-warning text-center">
                    <strong>Akun anda belum diverifikasi admin</strong>
                </div>
            @else
                <div class="row">

                    @foreach ($antrianList as $key => $antrian)
                        <div class="col-md-4" data-aos="zoom-in" data-aos-delay="100">
                            <div class="icon-box">

                                <div class="icon"><i class="bx bx-link-external"></i></div>
                                <h4>{{ $antrian->nama_layanan }}</h4>
                                <p>{{ $antrian->deskripsi }}</p>

                                <div class="mt-3">
                                    @auth
                                        @if ($antrian->ambilantrians->contains('user_id', Auth::id()))
                                            <button type="button" class="btn btn-primary" id="containsButton">
                                                Ambil Antrian
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-id="{{ $antrian->id }}" data-bs-target="#exampleModal">
                                                Ambil Antrian
                                            </button>
                                        @endif
                                    @else
                                        <button type="button" class="btn btn-primary" id="liveAlertBtn{{ $key }}"
                                            data-id="{{ $key }}">
                                            Ambil Antrian
                                        </button>
                                    @endauth

                                    <div id="containsButtonlivePlaceholder"></div>
                                </div>

                            </div>

                            <!-- Accordion -->
                            <div class="accordion" id="accordionExample{{ $key }}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse{{ $key }}">
                                            Informasi & Persyaratan
                                        </button>
                                    </h2>
                                    <div id="collapse{{ $key }}" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            {{ $antrian->persyaratan }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endif

        </div>
    </section>

    <!-- Modal Script -->
    <script>
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var slug = button.data('id')
            var modal = $(this)

            modal.find('.modal-title').text('Pengambilan Nomor Antrian')
            modal.find('.modal-body #antrian_id').val(slug)
        })
    </script>

    <!-- Alert belum login -->
    <script>
        const alertPlaceholder = document.getElementById('liveAlertPlaceholder')

        const appendAlert = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = `
        <div class="alert alert-${type} alert-dismissible">
            <div>${message}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `
            alertPlaceholder.append(wrapper)
        }

        document.querySelectorAll('[id^="liveAlertBtn"]').forEach(btn => {
            btn.addEventListener('click', () => {
                const auth = {{ auth()->check() ? 'true' : 'false' }};
                if (!auth) {
                    appendAlert('Anda harus login terlebih dahulu', 'warning')
                }
            })
        })
    </script>

    <!-- Alert sudah ambil -->
    <script>
        const alertPlaceholder2 = document.getElementById('containsButtonlivePlaceholder')

        const appendAlert2 = (message, type) => {
            const wrapper = document.createElement('div')
            wrapper.innerHTML = `
        <div class="alert alert-${type} alert-dismissible">
            <div>${message}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    `
            alertPlaceholder2.append(wrapper)
        }

        const alertTrigger = document.getElementById('containsButton')
        if (alertTrigger) {
            alertTrigger.addEventListener('click', () => {
                appendAlert2('Anda sudah mengambil antrian ini, <a href="/antrian/detail">Cek Detail</a>', 'danger')
            })
        }
    </script>

@endsection
