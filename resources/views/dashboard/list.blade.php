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

    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-body pt-4 p-3">
                        <div class="table-responsive table-invoice">
                            <table id="table-1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Laporan</th>
                                        <th>Tanggal Lapor</th>
                                        <th>Jenis Indikasi</th>
                                        <th>Status Laporan</th>
                                        <th>Jumlah<br>Hari Kerja</th>
                                        {{-- <th>Terlibat</th> --}}
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                @foreach ($laporan as $item)
                                    <tr>
                                        <td class="p-0 text-center">{{ $item->id }}</td>
                                        <td class="p-0 text-center">{{ $item->no_laporan }}</td>
                                        <td class="p-0 text-center">{{ $item->tanggal }}</td>
                                        <td class="p-0">
                                            <ol>

                                                @foreach (explode(',', $item->jenis_pelanggaran_id) as $item2)
                                                    @php
                                                        $jenis_pelanggaran = \App\Models\JenisPelanggaran::where('id', $item2)->first()->jenis_laporan;
                                                    @endphp
                                                    <li>{{ $jenis_pelanggaran }}</li>
                                                @endforeach
                                            </ol>
                                        </td>
                                        <td class="p-0 text-center">
                                            @foreach (explode(',', $item->status_laporan_id) as $item2)
                                            @php
                                                    $status_laporan = \App\Models\StatusLaporan::where('id', $item2)->first()->status;
                                                    @endphp
                                                    {{ $status_laporan }}
                                            @endforeach
                                        </td>
                                        <td class="p-0 text-center">
                                            {{ \Carbon\Carbon::parse($item->tanggal)->set('hour', 'minute', 'second', 0)->diffInDays(\Carbon\Carbon::today()) }}
                                        </td>
                                        <td>
                                            <a class="btn btn-info" href="edit?id={{ $item->id }}">Edit</a>
                                            <a class="btn btn-success" href="detail?id={{ $item->id }}">Detail</a>
                                        </td>
                                @endforeach
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.footer')

    <script>
        $(document).ready(function() {
            $('#table-1').DataTable()
        })
    </script>
