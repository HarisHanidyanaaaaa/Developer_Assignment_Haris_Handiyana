<!DOCTYPE html>
<html lang="en">

 <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ url('') }}/temp/assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="{{ url('') }}/temp/assets/vendors/css/vendor.bundle.base.css">
         <style>
        
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; 
            background-color: #f8f9fa; 
        }
       
        .container {
            max-width: 500px; 
        }
       
        .card {
            border: 1px solid #ddd; 
            border-radius: 50px; 
            box-shadow: 0 4px 8px rgba(0,0,0,0.1); 
            background-color: #fff; 
            padding: 20px; 
        }
    </style>
    <link rel="stylesheet" href="{{ url('') }}/temp/assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="assets/images/favicon.ico" />
  </head>

<body>


     <div
            class="modal fade"
            id="modalId"
            tabindex="-1"
            role="dialog"
            aria-labelledby="modalTitleId"
            aria-hidden="true"
        >
           <form action="{{ route('User-Register') }}" role="form" method="post">
                    @csrf
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitleId">
                                    Register Form
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group mb-3">

                                    <input type="text" class="form-control" id="inputData" placeholder="Nama Anda" name="name">
                                </div>
                                <div class="form-group mb-3">

                                    <input type="email" class="form-control" id="inputData" placeholder="Emal Anda" name="email">
                                     @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                                </div>
                                <div class="form-group mb-3">

                                    <input type="password" class="form-control" id="inputData" placeholder="Password Anda" name="password">
                                </div>
                                <div class="form-group mb-3">

                                     <input type="text" class="form-control"  name="role" value="user" readonly hidden >

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
        </div>
        <div class="container">
    <div class="col-md-4 w-50">
        <div class="card mb-3">
            
            <div class="card-body">
                <h3 class="card-title">Silahkan Login Terlebih Dahulu</h3>
            </div>
             @if (session('success'))
        <div class="alert alert-success" role="alert">
            <span>{{ session('success') }}</span>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger" role="alert">
            <span>{{ session('error') }}</span>
        </div>
    @endif
            <form action="{{ route('check') }}" method="POST" role="form">
                @csrf
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" placeholder="Racikan Nama" name="racikan_nama" value="empty" hidden>
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Email Anda</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Password Anda</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="validationCheckbox" onchange="toggleLoginButton()">
                            <label class="form-check-label" for="validationCheckbox">
                                Pastikan Email dan Password sudah terisi !
                            </label>
                        </div>
                </div>
                 @if ($errors->has('email') || $errors->has('password'))
                            <div class="alert alert-danger" role="alert">
                                <span>Tolong isi email dan password terlebih dahulu</span>
                            </div>
                        @endif
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="loginButton" style="display: none;">Login</button>
                    Belum punya Akun ? <a href=""  type="button"   data-bs-toggle="modal" data-bs-target="#modalId">Register Disini</a>
                </div>
            </form>
        </div>
    </div>
    
</div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

        
        <script>
            var modalId = document.getElementById('modalId');
        
            modalId.addEventListener('show.bs.modal', function (event) {
                  // Button that triggered the modal
                  let button = event.relatedTarget;
                  // Extract info from data-bs-* attributes
                  let recipient = button.getAttribute('data-bs-whatever');
        
                // Use above variables to manipulate the DOM
            });
        </script>
            <script>
        // Function to toggle login button based on checkbox status
        function toggleLoginButton() {
            var checkbox = document.getElementById('validationCheckbox');
            var loginButton = document.getElementById('loginButton');

            if (checkbox.checked) {
                loginButton.style.display = 'block'; // Munculkan tombol login jika checkbox dicentang
            } else {
                loginButton.style.display = 'none'; // Sembunyikan tombol login jika checkbox tidak dicentang
            }
        }
    </script>
   <script src="{{ url('') }}/temp/assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ url('') }}/temp/assets/vendors/chart.js/Chart.min.js"></script>
    <script src="{{ url('') }}/temp/assets/js/jquery.cookie.js" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('') }}/temp/assets/js/off-canvas.js"></script>
    <script src="{{ url('') }}/temp/assets/js/hoverable-collapse.js"></script>
    <script src="{{ url('') }}/temp/assets/js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ url('') }}/temp/assets/js/dashboard.js"></script>
    <script src="{{ url('') }}/temp/assets/js/todolist.js"></script>
</html>