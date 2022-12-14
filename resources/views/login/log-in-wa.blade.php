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
               
                <div class="card-body">
				 <h5 class="font-weight-bolder"><i class="fa fa-whatsapp text-success me-1"></i>Login dengan Nomor WhatsApp</h5>
                  <form role="form">
                    
                    <div class="input-group input-group-outline mb-3">
                      <input type="text" class="form-control" placeholder="Masukkan Nomor WhatsApp yg telah didaftarkan">
                    </div>
                   
  <div class="row">
    <div class="col-sm-6">
     
    </div>
    
    <div class="col-sm-6">
     
       <p class="mb-1 text-xs mx-auto text-right"><i class="fa fa-key opacity-6 text-dark me-1"></i><a href="welcome" class="text-primary text-gradient font-weight-bold">Login dengan Email</a></p>
    </div>
  </div>

				 
                    <div class="text-center">
                      <button type="button" class="btn btn-lg bg-gradient-primary btn-lg w-100 mt-4 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModalSignUp">Kirim Kode Verifikasi (OTP)</button>
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
	
document.addEventListener("DOMContentLoaded", function(event) {
  
  function OTPInput() {
const inputs = document.querySelectorAll('#otp > *[id]');
for (let i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput();

    
});
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.0.4"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
<div class="row">
   
    <!-- Modal -->
    <div class="modal fade" id="exampleModalSignUp" tabindex="-1" role="dialog" aria-labelledby="exampleModalSignTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
          <div class="modal-body p-0">
            <div class="card card-plain">
              <div class="card-header pb-0 text-center">
                  <h5 class="">Masukkan kode verifikasi (OTP)</h5>
                  <p class="mb-0">Kode verifikasi (OTP) telah dikirim melalui WhatsApp ke Nomor : 0812 XXXX XXX</p>
              </div>
              <div class="card-body pb-3">

				<form>
  <div class="row" id="otp">
    <div class="col-md-2 ">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="first" maxlength="1" autocomplete="off" class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
	<div class="col-md-2">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="second" maxlength="1" autocomplete="off"  class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
	<div class="col-md-2">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="third" maxlength="1" autocomplete="off"  class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
	<div class="col-md-2">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="fourth" maxlength="1" autocomplete="off"  class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
	<div class="col-md-2">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="fifth" maxlength="1" autocomplete="off"  class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
	<div class="col-md-2">
      <div class="input-group input-group-lg input-group-outline my-3">
        <input type="text" id="sixth" maxlength="1" autocomplete="off"  class="form-control text-center font-weight-bold form-control-lg">
      </div>
    </div>
    
  </div>
  
	<p id="wait" class="mt-4 text-sm text-center"> Mohon tunggu <strong><span id="countdowntimer"></span></strong> detik untuk mengirim ulang.</p>
	<p id="kode"  class="mt-4 text-sm text-center" style="display: none">Tidak menerima kode verifikasi (OTP)?
		<a href="../pages/send-otp.html" class="text-primary text-gradient font-weight-bold">Kirim ulang </a>(1/3)
    </p>
  
  <div class="text-center">
                    <button type="button" class="btn bg-gradient-primary btn-lg btn-rounded w-100 mt-4 mb-0">Login</button>
                  </div>
</form>

			
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
    var timeleft = 10;
    var downloadTimer = setInterval(function(){
    timeleft--;
    document.getElementById("countdowntimer").textContent = timeleft;
    if(timeleft <= 0){
        clearInterval(downloadTimer);
		document.getElementById('wait').style.display = 'none';
		document.getElementById('kode').style.display = 'block';
		}
		else{
		document.getElementById('wait').style.display = 'block';
		document.getElementById('kode').style.display = 'none';
		}
    },1000);
</script>	
