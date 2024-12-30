@extends('layouts.main')

@section('content')
<!-- ======= View Antrian Depan / Frontend ======= -->
<section id="services" class="services section">
    <div class="container">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Antrian</h2>
            <p>Ambil Antrian Online</p>
        </div>

        <!-- Alert Sukses dan Error - Pindahkan ke sini -->
        <div>
            <!-- Alert Sukses -->
            @if(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
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
        </div>

        <!-- Menampilkan Data Antrian -->
        <div class="row gy-4">
            @foreach ($antrianList as $key => $antrian)
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item">
                    <div class="icon">
                        <i class="bi bi-activity"></i>
                    </div>
                    <h3>{{ $antrian->nama_layanan }}</h3>
                    <p>{{ $antrian->deskripsi }}</p>

                    <!-- Mengecek Apakah User Sudah Login Atau Belum -->
                    <div class="mt-3">
                        @auth
                            @if($antrian->ambilantrians->contains('user_id', Auth::id()))
                            <button type="button" class="btn btn-primary contains-button" data-key="{{ $key }}">Ambil Antrian</button>
                            @else
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-id="{{ $antrian->id }}" data-bs-target="#exampleModal">
                                Ambil Antrian
                            </button>
                            @endif
                        @else
                            <button type="button" class="btn btn-primary live-alert-btn" data-key="{{ $key }}">Ambil Antrian</button>
                        @endauth
                        <div id="containsButtonlivePlaceholder-{{ $key }}"></div>
                    </div>
                </div>

                <!-- Accordion Start -->
                <div class="accordion" id="accordionPersyaratan{{ $key }}">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse{{ $key }}" aria-expanded="true"
                                aria-controls="collapse{{ $key }}">
                                Informasi & Persyaratan
                            </button>
                        </h2>
                        <div id="collapse{{ $key }}" class="accordion-collapse collapse"
                            data-bs-parent="#accordionPersyaratan{{ $key }}">
                            <div class="accordion-body">
                                {{ $antrian->persyaratan }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Accordion End -->
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('antrian.create')

<script>
    // Modal Script
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget)
        var slug = button.data('id')
        var modal = $(this)
        modal.find('.modal-title').text('Pengambilan Nomor Antrian')
        modal.find('.modal-body #antrian_id').val(slug)
    })

    // Alert Jika User Belum Login
    document.querySelectorAll('.live-alert-btn').forEach(function(button) {
        button.addEventListener('click', function() {
            const auth = {{ auth()->check() ? 'true' : 'false' }};
            if (!auth) {
                const key = this.getAttribute('data-key');
                const alertPlaceholder = document.getElementById('liveAlertPlaceholder');
                const wrapper = document.createElement('div');
                wrapper.innerHTML = `
                    <div class="alert alert-warning alert-dismissible" role="alert">
                        <div>Anda harus login terlebih dahulu</div>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                alertPlaceholder.innerHTML = ''; // Clear previous alerts
                alertPlaceholder.appendChild(wrapper);
            }
        });
    });

    // Alert Jika User sudah pernah mengambil antrian
    document.querySelectorAll('.contains-button').forEach(function(button) {
        button.addEventListener('click', function() {
            const key = this.getAttribute('data-key');
            const alertPlaceholder = document.getElementById('containsButtonlivePlaceholder-' + key);
            const wrapper = document.createElement('div');
            wrapper.innerHTML = `
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <div>Anda sudah mengambil antrian ini, <a href="/antrian/detail" class="alert-link">Cek Detail</a></div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            `;
            alertPlaceholder.innerHTML = ''; // Clear previous alerts
            alertPlaceholder.appendChild(wrapper);
        });
    });
</script>
@endsection
