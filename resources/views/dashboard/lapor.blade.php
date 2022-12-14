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


    <!-- Content -->
    @section('content')
        <div class="container mt-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-info shadow-info border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Form Pengisian Pengaduan/Pelaporan</h6>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <form action="/store" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="main-content">
                                <h6>1. Jenis Indikasi pelanggaran yang dilaporkan: (Dapat dipilih lebih dari
                                    satu jenis)</h6>
                                <div class="row">
                                    @foreach ($jenis_pelanggaran as $item)
                                        <div class="col-6 col-sm-6 col-lg-6">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <div class="mb-4">
                                                        @foreach ($item as $index => $item2)
                                                            <label for="{{ 'jenis' . $item2->id }}" class="form-label">
                                                                <input type="checkbox" value="{{ $item2->id }}"
                                                                    id="{{ $item2->id }}" name="jenis[]">
                                                                &nbsp;&nbsp;{{ $item2->jenis_laporan }}</label>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <h6 class="mt-4">2. Ceritakan kejadian yang ingin dilaporkan</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <textarea class="form-control" placeholder="Isi disini" name="kejadian_pertama" id="kejadian_pertama" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>


                                    <h6 class="mt-4">3. Dimana dan Kapan kejadian ini terjadi?</h6>
                                    <div class="row">
                                        <div class="col-10 col-sm-10 col-lg-10">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <input type="text" class="form-control" name="lokasi" id="lokasi"
                                                        placeholder="Lokasi kejadian">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-2 col-sm-2 col-lg-2">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    {{-- <label for="tanggal" class="form-label">Tanggal kejadian</label>&nbsp;&nbsp; --}}
                                                    <input name="tanggal" type="date" class="form-control"
                                                        id="tanggal">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h6 class="mt-4">4. Siapa nama dan jabatan terlapor?</h6>
                                    <div class="row">
                                        <div class="col-8 col-sm-8 col-lg-8">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <input type="text" class="form-control" name="nama_pelapor"
                                                        id="nama_pelapor" placeholder="Masukkan nama">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3 col-sm-3 col-lg-3">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="jabatan1" class="form-control" id="jabatan1">
                                                        <option value="">-Pilih Jabatan-</option>
                                                        @foreach ($jabatan as $item)
                                                            <option value='{{ $item->id }}'>{{ $item->jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6 class="mt-4">5. Apakah ada orang lain yang terlibat?(Nama/Jabatan)</h6>
                                    <div id="elementNo5">
                                        <div class="row mb-4">
                                            <div class="col-6 col-sm-6 col-lg-6">
                                                <div class="control-group">
                                                    <div class="card-body bg-gray-200 border-radius-lg">
                                                        <input type="text" class="form-control" name="terlibat[]"
                                                            placeholder="Masukkan nama">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-lg-4">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="jabatan2[]" class="form-control">
                                                        <option value="">-Pilih Jabatan-</option>
                                                        @foreach ($jabatan as $item)
                                                            <option value='{{ $item->id }}'>{{ $item->jabatan }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2 col-sm-2 col-lg-2">
                                                <button type="button" class="btn btn-info" id="btn5"><i
                                                        class="glyphicon glyphicon-plus"></i>Tambah</button>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>6. Apakah ada saksi mata?(Nama/Jabatan)</h6>
                                    <div id="elementNo6">
                                        <div class="row mb-4">
                                            <div class="col-6 col-sm-6 col-lg-6">
                                                <div class="control-group">
                                                    <div class="card-body bg-gray-200 border-radius-lg">
                                                        <input type="text" class="form-control" name="saksi[]"
                                                            placeholder="Masukkan nama">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-4 col-sm-4 col-lg-4">
                                                <div class="card">
                                                    <div class="card-body bg-gray-200 border-radius-lg">
                                                        <select name="jabatan3[]" class="form-control">
                                                            <option value="">-Pilih Jabatan-</option>
                                                            @foreach ($jabatan as $item)
                                                                <option value='{{ $item->id }}'>{{ $item->jabatan }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 col-sm-2 col-lg-2">
                                                <button type="button" class="btn btn-info" id="btn6">
                                                    <i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>7. Bagaimana kejadian ini terjadi?(Jelaskan proses/langkah-langkah)</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    {{-- <textarea class="form-control" id="kejadian" name="kejadian">{{ old('kejadian', $laporan->kejadian) }}</textarea> --}}
                                                    <textarea name="kejadian" id="kejadian" class="form-control"></textarea>

                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>8. Apakah kejadian ini mengakibatkan kerugian secara finansial terhadap
                                        perusahaan?</h6>
                                    <div class="row">
                                        <div class="col-2 col-sm-2 col-lg-2">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="kerugian" class="form-control" id="kerugian">
                                                        <option value="">-Pilih Disini-</option>
                                                        <option value='ya'>Ya</option>
                                                        <option value='tidak'>Tidak</option>
                                                        <option value='tidak_tahu'>Tidak Tahu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>9. Jika ada, berapa besar jumlah kerugian finansial yang diperkirakan?</h6>
                                    <div class="row">
                                        <div class="col-4 col-sm-4 col-lg-4">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <label for="nama" class="form-label">Rp.</label>
                                                    <input name="jumlah_kerugian" type="number" id="jumlah_kerugian"
                                                        size="auto" placeholder="0" />
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>10. Apakah kejadian ini pernah terjadi sebelumnya?</h6>
                                    <div class="row">
                                        <div class="col-2 col-sm-2 col-lg-2">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="pernah" class="form-control" id="pernah">
                                                        <option value="">-Pilih Disini-</option>
                                                        <option value='ya'>Ya</option>
                                                        <option value='tidak'>Tidak</option>
                                                        <option value='tidak_tahu'>Tidak Tahu</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>


                                    <h6>11. Apakah terdapat dokumentasi/bukti?</h6>
                                    <div id="elementNo11">
                                        <div class="row mb-4">
                                            <div class="col-7 col-sm-7 col-lg-7">
                                                <div class="control-group">
                                                    <div class="card-body bg-gray-200 border-radius-lg">
                                                        <input type="file" name="bukti[]" class="form-control"
                                                            id="bukti">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-2 col-sm-2 col-lg-2">
                                                <button type="button" class="btn btn-info" id="btn11">
                                                    <i class="glyphicon glyphicon-plus"></i>Tambah</button>
                                            </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">
                                                <b>*Maksimal 5MB/file (pdf, doc, docx, xls,
                                                    xlsx,
                                                    ppt, pptx, jpeg, png, gif, mp3, avi)</b>
                                            </font>
                                        </div>
                                    </div>
                                    <!-- Form Tambah 11 -->
                                    <div id="elementCopy11">
                                        <div class="invisible d-hidden tambah11" style="height:0">
                                            <div class="row mb-4 copyy">
                                                <div class="col-7 col-sm-7 col-lg-7">
                                                    <div class="control-group">
                                                        <div class="card-body bg-gray-200 border-radius-lg">
                                                            <input type="file" name="bukti[]" class="form-control"
                                                                id="bukti">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-2 col-sm-2 col-lg-2">
                                                    <button type="button" class="btn btn-danger remove" id="btn11">
                                                        <i class="glyphicon glyphicon-plus"></i>Remove</button>
                                                </div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font color="#FF0000">
                                                    <b>*Maksimal 5MB/file (pdf, doc, docx,
                                                        xls,
                                                        xlsx,
                                                        ppt, pptx, jpeg, png, gif, mp3, avi)</b>
                                                </font>
                                            </div>
                                        </div>
                                    </div>

                                    <h6>12. Apakah anda telah melaporkan kejadian tersebut kepada pihak lain?</h6>
                                    <div class="row">
                                        <div class="col-2 col-sm-2 col-lg-2">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="jabatan_terlapor" class="form-control"
                                                        id="jabatan_terlapor">
                                                        <option value="">-Pilih Disini-</option>
                                                        <option value='ya'>Ya</option>
                                                        <option value='tidak'>Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>13. Apakah anda sudah berbicara dengan orang itu? Jika sudah, saran apa yang
                                        dia/mereka berikan?</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <textarea class="form-control" placeholder="Isi disini" name="berbicara"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>14. Apakah anda telah melaporkan kejadian ini ke polisi/pihak yang berwajib?
                                    </h6>
                                    <div class="row">
                                        <div class="col-2 col-sm-2 col-lg-2">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <select name="jabatan4" class="form-control" id="jabatan4">
                                                        <option value="">-Pilih Disini-</option>
                                                        <option value='ya'>Ya</option>
                                                        <option value='tidak'>Tidak</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>

                                    <h6>15. Dimanakah anda berada pada saat kejadian berlangsung?</h6>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="card">
                                                <div class="card-body bg-gray-200 border-radius-lg">
                                                    <textarea class="form-control" placeholder="Isi disini" id="posisi" name="posisi"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br>
                                    <div>
                                        <button type="submit"
                                            class="btn btn-lg bg-gradient-info  btn-lg w-200 mt-4 mb-0">Kirim
                                            Laporan</button>
                                    </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div id="elementCopy6">
            <div class="invisible d-hidden" style="height:0">
                <div class="row mb-4 copy">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <div class="control-group">
                            <div class="card-body bg-gray-200 border-radius-lg">
                                <input type="text" class="form-control" name="saksi[]" placeholder="Masukkan nama">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-lg-4">
                        <div class="card-body bg-gray-200 border-radius-lg">
                            <select name="jabatan3[]" class="form-control">
                                <option value="">-Pilih Jabatan-</option>
                                                        @foreach ($jabatan as $item)
                                                            <option value='{{ $item->id }}'>{{ $item->jabatan }}
                                                            </option>
                                                        @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-lg-2">
                        <button type="button" class="btn btn-danger hapus" id="btn6">
                            <i class="glyphicon glyphicon-plus"></i>Hapus</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form tambah 5 -->

        <div id="elementCopy5">
            <div class="invisible d-hidden" style="height:0">
                <div class="row mb-4 copy">
                    <div class="col-6 col-sm-6 col-lg-6">
                        <div class="control-group">
                            <div class="card-body bg-gray-200 border-radius-lg">
                                <input type="text" class="form-control" placeholder="Masukkan nama"
                                    name="terlibat[]">
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-lg-4 control-group">
                        <div class="card-body bg-gray-200 border-radius-lg">
                            <select name="jabatan2[]" class="form-control">
                                <option value="">-Pilih Jabatan-</option>
                                @foreach ($jabatan as $item)
                                    <option value='{{ $item->id }}'>{{ $item->jabatan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2 col-sm-2 col-lg-2">
                        <button type="button" class="btn btn-danger remove" id="btn5"><i
                                class="glyphicon glyphicon-plus"></i>Hapus</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- </main> --}}
        <!-- Form Tambah 6 -->


        @include('layouts.footer')


        <script type="text/javascript">
            $(document).ready(function() {
                $("#btn5").click(function() {
                    var html = $("#elementCopy5 .invisible").html();
                    console.log(html)
                    $("#elementNo5").append(html);
                });

                // saat tombol remove dklik control group akan dihapus
                $(document).on("click", ".remove", function() {
                    $(this).parents(".copy").remove();
                });

                $("#btn6").click(function() {
                    var html = $("#elementCopy6 .invisible").html();
                    console.log(html)
                    $("#elementNo6").append(html);
                });

                // saat tombol remove dklik control group akan dihapus
                $(document).on("click", "#btn6", function() {
                    $(this).parents(".copy").remove();
                });

                $("#btn11").click(function() {
                    var html = $(".tambah11").html();
                    console.log(html)
                    $("#elementNo11").append(html);
                });

                // saat tombol remove dklik control group akan dihapus
                $(document).on("click", ".remove", function() {
                    $(this).parents(".copyy").remove();
                });
            });
        </script>
