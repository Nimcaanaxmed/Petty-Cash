<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Petty Cash</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('assets/modules/fontawesome/css/all.min.css')}}">
 <!-- toastr -->
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{asset('assets/modules/bootstrap-social/bootstrap-social.css')}}">
   <!-- toastr -->
   <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('assets/css/components.css')}}">
  <!-- Start GA -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>
@php 
 
 $setting = App\Models\Setting::find(1);
 @endphp 
<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="{{ asset($setting->logo) }}" alt="logo" width="100" height="100" class="shadow-light rounded-circle">
            
            </div>
            

            <div class="card card-primary">
             
                <div class="card-header justify-content-center"><h5> {{ $setting->name}}</h5>   
                   
              
                </div>
                
                   

                
          

              <div class="card-body">
              <!-- <center><p class="justify-content-center"><b>Login to start your session.</b></p></center> -->
                <form method="POST" action="{{route('login')}}" class="needs-validation" novalidate="">
                    @csrf
                  <div class="form-group">
                    <label for="email">Email:<label style="color: red">*</label></label>
                    <input id="email" type="text" placeholder="Enter.." class="form-control @error('login') is-invalid @enderror" name="login" tabindex="1" required autofocus>
                        @error('login')
                                <span class="text-danger"> {{ $message }} </span>
                         @enderror
                    <div class="invalid-feedback">
                      Please enter your email.
                    </div>
                  </div>

                  <div class="form-group">
        <div class="d-block">
            <label for="password"  class="control-label">Password:<label style="color: red">*</label></label>
            <div class="float-right">
                <a href="{{route('password.request')}}" class="text-small">
                    Forget Password?
                </a>
            </div>
        </div>
        <div class="input-group">
            <input id="password" type="password" placeholder="Enter.." class="form-control" name="password" tabindex="2" required>
            <div class="input-group-append">
                <span class="input-group-text" id="togglePassword">
                    <i class="fas fa-eye"></i>
                </span>
            </div>
        </div>
        <div class="invalid-feedback">
        Please enter your password.
        </div>
    </div>

                 

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                    <i class="fas fa-sign-in-alt"></i> Login
                    </button>
                  </div>
                </form>
               

              </div>
            </div>
           
            <div class="simple-footer">
               BY DHB IT TEAM.
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="{{asset('assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('assets/modules/popper.js')}}"></script>
  <script src="{{asset('assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('assets/js/stisla.js')}}"></script>
  
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{asset('assets/js/scripts.js')}}"></script>
  <script src="{{asset('assets/js/custom.js')}}"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

<script>
    $(document).ready(function () {
        // Check the session for different alert types and display corresponding iziToast notifications
        @if(session('alert-type') == 'success')
            iziToast.success({
                title: 'Success',
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'error')
            iziToast.error({
                title: 'Error',
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'info')
            iziToast.info({
                
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @elseif(session('alert-type') == 'warning')
            iziToast.warning({
                title: 'Warning',
                message: '{{ session('toastr') }}',
                position: 'topRight'
            });
        @endif
    });
</script>

<script>
        document.getElementById('togglePassword').addEventListener('click', function () {
            const passwordField = document.getElementById('password');
            const icon = this.querySelector('i');

            // Toggle the type attribute
            if (passwordField.type === 'password') {
                passwordField.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordField.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });
    </script>

</body>
</html>


