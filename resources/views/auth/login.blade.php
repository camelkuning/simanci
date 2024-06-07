<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login | Simanci</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-dark">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center">
                                    <img src="https://www.ukdw.ac.id/public_html/wp-content/uploads/2017/10/logo-ukdw.png" alt="" class="img-fluid w-25">
                                    <h3 class="text-center font-weight-light my-4">SELAMAT DATANG DI SIMANCI</h3>
                                </div>
                                <div class="card-body">
                                    <form action="/postlogin" method="POST">
                                        @csrf
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="email_user" id="inputEmail" type="email"
                                                placeholder="name@example.com" />
                                            <label for="inputEmail">Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" id="inputPassword"
                                                type="password" placeholder="Password" />
                                            <label for="inputPassword">Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-dark w-full" type="submit"><i class="bi bi-box-arrow-in-right"></i>Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Simanci | UKDW &copy; Varel & Lexi</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="js/scripts.js"></script>
    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'Tidak Bisa Login!',
                text: '{{ $errors->first() }}',
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif
</body>

</html>
