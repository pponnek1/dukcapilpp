<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>


    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                <span class="d-none d-md-inline-block text-muted fw-normal">
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tanggal = date('d-m-Y');
                        $jam = date('H:i:s');
                    ?>

                    <button type="button" class="btn btn-outline-primary" id="jam">Jam : {{ $jam }} || Tanggal : {{
                        $tanggal }}</button>
                    <script>
                        function updateJam() {
                      var jam = new Date().toLocaleTimeString('en-US', { hour12: false });
                      document.getElementById("jam").innerHTML = "Jam : " + jam + " || Tanggal : {{ $tanggal }}";
                    }
                    setInterval(updateJam, 1000); // memperbarui setiap 1 detik
                    </script>

                </span>
            </a>
        </div>
        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset('assetdashboard/img/avatars/avatar.png') }}" alt class="rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item mt-0" href="#">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assetdashboard/img/avatars/avatar.png') }}" alt
                                            class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">Admin</h6>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="/">
                            <i class="ti ti-home me-3 ti-md"></i><span class="align-middle">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <div class="d-grid px-2 pt-2 pb-1">
                            <a class="btn btn-sm btn-danger d-flex" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    Swal.fire({
                                                        title: 'Konfirmasi Keluar',
                                                        text: 'Apakah Anda yakin ingin keluar?',
                                                        icon: 'warning',
                                                        showCancelButton: true,
                                                        confirmButtonColor: '#3085d6',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: 'Ya, Keluar!'
                                                    }).then((result) => {
                                                        if (result.isConfirmed) {
                                                            document.getElementById('logout-form').submit();
                                                        }
                                                    });">
                                <i class="ti ti-logout ms-2 ti-14px"></i>{{ __('keluar') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
