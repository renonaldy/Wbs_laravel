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
       <div class="col-14">
         <div class="card my-4">
           <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
             <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
               <h6 class="text-white text-capitalize ps-3">Data Profil</h6>
             </div>
           </div>
           <div class="card-body pt-4 p-3">

             <ul class="list-group">
               <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                 <div class="d-flex flex-column">
                   <h6 class="mb-3 text-sm">BUDI IRAWAN</h6>
                   <span class="mb-2 text-xs">Alamat : <span class="text-dark font-weight-bold ms-sm-2">Jl. Mayang Mangurai No. 88 Kota Jambi</span></span>
                   <span class="mb-2 text-xs">Email : <span class="text-dark ms-sm-2 font-weight-bold">irawan@gmail.com</span></span>
                   <span class="mb-2 text-xs">Nomor HP/WA: <span class="text-dark ms-sm-2 font-weight-bold">08123456789</span></span>
                   <span class="text-xs">Status: <span class="text-dark ms-sm-2 font-weight-bold">Karyawan PT Perkebunan Nusantara VI</span></span>
                 </div>
                 <div class="ms-auto text-end">
                   <a class="btn btn-link text-dark px-3 mb-0" href="profiledit"><i class="material-icons text-sm me-2">edit</i>Edit</a>
                 </div>
               </li>
             </ul>
           </div>
         </div>
       </div>
     </div>

 @include('layouts.footer')
