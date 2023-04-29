
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sistem Antrian Dukcapil Online</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/assets/img/logo.png" rel="icon">
  <link href="/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/assets/css/style.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  {{-- Memasukkan script Header/Navbar dari folder partials --}}
  @include('partials.navbar')

      {{-- Memasukkan View Home --}}
      @yield('container')

  {{-- Memasukkan script Footer dari folder partials --}}
  @include('partials.footer')

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  @include('sweetalert::alert')
  
  <!-- Vendor JS Files -->
  <script src="/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="/assets/vendor/aos/aos.js"></script>
  <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="/assets/js/main.js"></script>
  <script type="text/javascript" src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

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
    $(document).ready(function() {
      $('nav#navbar ul li a').filter(function() {
        return this.href == location.href;
      }).addClass('active');
    });
  </script>


</body>

</html>