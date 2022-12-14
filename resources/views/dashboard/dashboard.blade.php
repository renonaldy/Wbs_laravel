
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        WBS | PTPN VI
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
    <style>
        ul.a {
            list-style-type: circle;
        }

        ul.b {
            list-style-type: square;
        }

        ol.c {
            list-style-type: number;
        }

        ol.d {
            list-style-type: lower-alpha;
        }
    </style>
</head>
@include('layouts.sidebar')
<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
@include('layouts.navbar')

 <!--   Content   -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">edit</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-2 ">Silahkan klik tombol di bawah ini</p>
				<p class="text-sm mb-1 ">Untuk membuat laporan baru</p>

              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center ">
            <a href="lapor" class="btn btn-primary btn-sm w-80">Buat Laporan</a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-whatsapp"></i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">HP Call Center WBS</p>
                <h4 class="mb-0">0811 7401 666</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
           <div class="card-footer p-3 text-center ">
			  <a href="https://api.whatsapp.com/send?phone=628117401666&text=Halo admin WBS PTPN VI, Saya mau melaporkan indikasi pelanggaran" class="btn btn-success btn-sm w-80" target="_blank"> Chat WhatsApp </a>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">assignment</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Laporan</p>
                <h4 class="mb-0">1</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3 text-center ">
              <a href="list" class="btn btn-info btn-sm w-80">Detail</a>
            </div>
          </div>
        </div>

      </div>
      <div class="row mt-6">
        <div class="col-lg-12 col-md-6 mt-4 mb-4">
          <div class="card z-index-2 ">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
              <div class="page-header min-height-300 bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="background-image: url('../assets/img/wbs_home_one.jpg');">
              </div>
            </div>
            <div class="card-body">
              <h6 class="mb-0 ">WHISTLE BLOWING SYSTEM</h6>
              <p class="text-sm "><i>Whistle Blowing System</i> / Pelaporan Pelanggaran adalah bagian dari sistem pengendalian internal dalam mencegah praktik penyimpangan dan kecurangan serta memperkuat penerapan praktik <i>Good Corporate Governance</i>.</p>
              <hr class="dark horizontal">
              <div class="d-flex ">
              </div>
            </div>
          </div>
        </div>
      </div>
@include('layouts.footer')
