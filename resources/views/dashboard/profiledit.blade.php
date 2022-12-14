<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"></script>
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

    <div class="container-fluid py-4">


        <div class="row">
                <div class="col-12">
                  <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                      <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Edit Data Profil</h6>
                      </div>
                    </div>

                    <div class="card-body pt-4 p-3">
                    <div class="container">
          <div class="row">
            <div class="col-lg">
             <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">

                          <div class="d-flex flex-column mb-0">
                            <form>
                            <div class="input-group input-group-static mb-3">
                                  <label class="font-weight-bold">Nama Lengkap</label>
                                  <input type="text" value="" class="form-control">
                            </div>
                            <div class="input-group input-group-static mb-3">
                                  <label class="font-weight-bold">Alamat</label>
                                  <input type="text" value="" class="form-control">
                            </div>

                                <div class="input-group input-group-static mb-3">
                             <label for="exampleFormControlSelect2" class="ms-0" class="font-weight-bold">Status</label>
                             <select class="form-control" id="exampleFormControlSelect2">
                                <option selected>Karyawan PT Perkebunan Nusantara VI</option>
                                <option>Eksternal</option>

                             </select>
                             <p class="mb-4 text-xs">Klik tombol Simpan untuk update data Profil...</p>

                           </div>

                              <button type="button" class="btn btn-sm bg-gradient-info shadow-none btn-lg w-100 mt-0 mb-0">Simpan</button>

                            </div>
                            </form>

                        </li>
                      </ul>
            </div>
            <div class="col-lg">
              <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <div class="input-group input-group-static mb-3">
                                  <label class="font-weight-bold">Email</label>
                                  <input type="text" value="" class="form-control">
                                  <p class="mb-0 text-xs">Klik kirim kode verifikasi apabila akan mengubah Email..</p>
                            </div>
                              <button type="button" class="btn btn-sm bg-gradient-warning shadow-none btn-lg w-100 mt-0 mb-0"  data-bs-toggle="modal" data-bs-target="#exampleModalEmail">Kirim Kode Verifikasi (OTP) ke Email</button>
                            </div>

                        </li>
                      </ul>
            </div>
            <div class="col-lg">
              <ul class="list-group">
                        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                          <div class="d-flex flex-column">
                            <div class="input-group input-group-static mb-3">
                                  <label class="font-weight-bold">Nomor HP/WA</label>
                                  <input type="text" value="" class="form-control">
                                  <p class="mb-0 text-xs">Klik kirim kode verifikasi apabila akan mengubah Nomor WhastApp....</p>
                            </div>
                              <button type="button" class="btn btn-sm bg-gradient-success shadow-none btn-lg w-100 mt-0 mb-0"  data-bs-toggle="modal" data-bs-target="#exampleModalWA">Kirim Kode Verifikasi (OTP) ke WA</button>
                            </div>

                        </li>
                      </ul>

            </div>
          </div>
        </div>

                    </div>

                  </div>
                </div>
              </div>
              @include('layouts.footer')
