<!doctype html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed layout-compact" dir="ltr"
    data-theme="theme-semi-dark" data-assets-path="../../assetdashboard/"
    data-template="vertical-menu-template-no-customizer" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Sistem Antrian Dukcapil</title>

    <meta name="description" content="" />
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assetdashboard/img/logo/logo-kab-klaten.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap"
        rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/fonts/tabler-icons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/fonts/flag-icons.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">


    <!-- Core CSS -->

    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/css/rtl/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/css/rtl/theme-semi-dark.css') }}" />

    <link rel="stylesheet" href="{{ asset('assetdashboard/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/node-waves/node-waves.css') }}" />

    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/typeahead-js/typeahead.css') }}" />
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/@form-validation/form-validation.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/apex-charts/apex-charts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/libs/swiper/swiper.css') }}" />
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/css/pages/page-auth.css') }}" />
    <link rel="stylesheet" href="{{ asset('assetdashboard/vendor/css/pages/cards-advance.css') }}" />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">



    <!-- Helpers -->
    <script src="{{ asset('assetdashboard/vendor/js/helpers.js') }}"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->

    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assetdashboard/js/config.js') }}"></script>

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            @include('dashboard.partials.sidebar')

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                @include('dashboard.partials.navbar')

                <!-- / Navbar -->

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->

                    @yield('content')
                    <!-- / Content -->

                    <!-- Footer -->
                    <!-- / Footer -->

                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assetdashboard/vendor/js/core.js -->

    <script src="{{ asset('assetdashboard/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/typeahead-js/typeahead.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/js/menu.js') }}"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assetdashboard/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/@form-validation/auto-focus.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assetdashboard/vendor/libs/swiper/swiper.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('assetdashboard/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assetdashboard/js/pages-auth.js') }}"></script>
    <script src="{{ asset('assetdashboard/js/cards-advance.js') }}"></script>

    {{-- alert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    @include('sweetalert::alert')

    <script>
        $(".swal-confirm").click(function(e) {
			e.preventDefault();
			var form = $(this).attr('data-form');
			Swal.fire({
				title: 'Hapus Data Ini ',
				text: "Anda tidak akan dapat mengembalikan data yang dihapus !",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#d33',
				cancelButtonColor: '#3085d6',
				confirmButtonText: 'Ya, hapus!',
				cancelButtonText: 'Batal'
			}).then((result) => {
				if (result.isConfirmed) {
					$('#' + form).submit();
				}
			})
		});
    </script>

    <script>
        $(".reset-confirm").click(function(e) {
        e.preventDefault();
        var form = $(this).attr('data-form');
        Swal.fire({
            title: 'Reset Antrian Masuk ',
            text: "Anda tidak akan dapat mengembalikan data yang di reset !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, Reset !',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#' + form).submit();
            }
        })
    });
    </script>

    <script src="https://code.responsivevoice.org/responsivevoice.js?key=qdMHZ86k"></script>

    <script>
        var navItems = document.querySelectorAll('.nav-item');

    for(var i = 0; i < navItems.length; i++){
        navItems[i].addEventListener('click', function(){
            for(var j = 0; j < navItems.length; j++){
                navItems[j].classList.remove('active');
            }
            this.classList.add('active');
            localStorage.setItem('selectedNav', this.querySelector('a').getAttribute('href'));
        });
    }

    var selectedNav = localStorage.getItem('selectedNav');

    if(selectedNav){
        for(var i = 0; i < navItems.length; i++){
            var navLink = navItems[i].querySelector('a');
            if(navLink.getAttribute('href') === selectedNav){
                navItems[i].classList.add('active');
                break;
            }
        }
    }
    </script>
</body>

</html>
