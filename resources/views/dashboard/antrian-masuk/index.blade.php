@extends('dashboard.layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <!-- Header Card -->
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-primary">Antrian Layanan: {{ $antrian->nama_layanan }}</h5>
                    <form id="{{ $antrian->slug }}" action="/dashboard/antrian-masuk/{{ $antrian->slug }}/reset"
                        method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-primary reset-confirm"
                            data-form="{{ $antrian->slug }}">
                            <i class="bi bi-arrow-clockwise"></i> Reset
                        </button>
                    </form>
                </div>

                <!-- Card Body -->
                <div class="card-body">
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Nomor HP</th>
                                    <th>Panggil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                use Illuminate\Support\Carbon;
                                $antrian_masuk_list = $antrian->ambilantrians()
                                ->whereDate('tanggal', Carbon::now()->setTimezone('Asia/Jakarta'))
                                ->getQuery() // Mendapatkan query builder dari relasi
                                ->orderBy('created_at', 'asc')
                                ->paginate(10);
                                @endphp
                                @forelse ($antrian_masuk_list as $index => $antrian_masuk)
                                <tr>
                                    <td>{{ $antrian_masuk_list->firstItem() + $index }}</td>
                                    <td class="fw-bold">{{ $antrian_masuk->nama_lengkap }}</td>
                                    <td>{{ $antrian_masuk->alamat }}</td>
                                    <td>{{ $antrian_masuk->nomorhp }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary"
                                            onclick="responsiveVoice.speak('Nomor Antrian {{ $antrian_masuk->kode }} menuju loket {{ $antrian->nama_layanan }}', 'Indonesian Female', {rate: 0.8});">
                                            <i class="bi bi-mic"></i> Panggil
                                        </button>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-center">
                                            <form id="{{ $antrian_masuk->id }}"
                                                action="/dashboard/antrian-masuk/{{ $antrian_masuk->id }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="bi bi-check-circle"></i>
                                                </button>
                                            </form>
                                            <form id="{{ $antrian_masuk->id }}"
                                                action="/dashboard/antrian-masuk/{{ $antrian_masuk->id }}/skip"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-skip-forward-circle"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Tidak ada antrian masuk untuk saat ini.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <!-- Improved Pagination -->
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <div class="d-flex align-items-center">
                                <small class="text-muted me-3">
                                    Menampilkan {{ $antrian_masuk_list->firstItem() }} - {{ $antrian_masuk_list->lastItem() }}
                                    dari {{ $antrian_masuk_list->total() }} entri
                                </small>
                            </div>

                            <nav aria-label="Navigasi Halaman">
                                {{ $antrian_masuk_list->links('pagination::bootstrap-4') }}
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
</script>
@endsection
