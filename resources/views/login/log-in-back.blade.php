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
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>

@include('layout.navbar')

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-6 d-lg-flex d-none h-100 my-auto pe-0 position-absolute top-0 start-0 text-center justify-content-center flex-column">
              <div class="position-relative bg-gradient-primary h-100 m-3 px-7 border-radius-lg d-flex flex-column justify-content-center" style="background-image: url('../assets/img/illustrations/wbs_reg.png'); background-size: cover;">
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column ms-auto me-auto ms-lg-auto me-lg-5">
              <div class="card card-plain">
                <div class="card-header">
                  <h4 class="font-weight-bolder">Login</h4>
                  <p class="mb-0">Silakan LOGIN untuk submit laporan. Jika anda belum memiliki akun/baru
pertama kali melakukan pengaduan silahkan <a href="register" class="text-primary text-gradient font-weight-bold">Register</a> terlebih dahulu</p>
                </div>
                <div class="card-body">
                  <form role="form">
                    <div class="input-group input-group-outline mb-6">
					
                        <div class="card-body">
                            <h5 class="font-weight-bolder"><i class="fa fa-envelope text-success me-1"></i>Login dengan Alamat Email Anda</h5>
                             <form role="form">
                             
                                <div class="input-group input-group-outline mb-3">
                                  </div>
                                   <div class="input-group input-group-outline mb-3">
                                     <input type="text" class="form-control" placeholder="Masukkan Email/Nomor WhatsApp">
                                   </div>
                   
				
  <div class="row">
    <div class="col-sm-6">
    </div>
    <div class="col-sm-6">
     
       <p class="mb-1 text-xs mx-auto">  <i class="fa fa-whatsapp opacity-6 text-dark me-1"></i><a href="login.wa" class="text-primary text-gradient font-weight-bold">Login dengan Nomor Whatsapp</a></p>
    </div>
  </div>

				 
                    <div class="text-center">
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0">Kirim Kode Verifikasi (OTP)</button>
                    </div>
                  </form>
                </div>
                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                  <p class="mb-2 text-sm mx-auto">
                    Belum punya akun?
                    <a href="register" class="text-primary text-gradient font-weight-bold">Register</a>
                  </p>
                </div>
				
              </div>

            </div>
			
          </div>
		  
		  
        </div>
      </div>
	  
    </section>
  </main>
  
      <div class="modal fade" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
      <div class="modal-dialog modal- modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title font-weight-normal" id="modal-title-default"><strong>Reset Password !</strong></h6>
           
          </div>
          <div class="modal-body">
		  <form>
  <div class="row">
  <p class="text-sm mx-auto">Silahkan masukkan alamat email yang telah terdaftar, password baru akan dikirim ke email anda</p>
	<div class="input-group input-group-outline my-3">
    <input type="email" class="form-control" maxlength="30" placeholder="Masukkan alamat email">
  </div>
  </div>
  
	
  
  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Reset Password</button>
                  </div>
</form>
		   </div>
          <div class="modal-footer">
            
            <button type="button" class="btn btn-link  ml-auto" data-bs-dismiss="modal">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>