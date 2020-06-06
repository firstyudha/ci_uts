<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Book Store by Yudha</title>
    <link rel="shortcut icon" href="favicon.ico" />
    <!-- CDN CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- CDN JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>
    <!-- fontawesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</head>

<body>


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand col-md-2 mx-0 px-0" href="<?= base_url(); ?>home">
            <h1 class="text-success">Book Store</h1>
        </a>
    </nav>

    <div class="container">
        <div class="row mt-4">
            <div class="col-md-4 offset-md-4">
            <?php $message = $this->session->flashdata('msg'); if(isset($message)): ?>
                <div class="alert text-white bg-danger"><center><i class="fas fa-exclamation-triangle"></i> <?= $message; ?></center></div>
            <?php endif; ?>
                <div class="card bg-success" >
                    <div class="card-body">
                        <center><i class="fas fa-user-lock display-1 text-white"></i></center>
                        <br>
                        <h5 class="text-white text-center">Please, Login...</h5>
                        <form action="<?= base_url(); ?>login/auth" method="post">
                            
                            <input type="text" name="username" required class="form-control" placeholder="fill the username...">
                            
                            <input type="password" name="password" required class="mt-3 form-control" placeholder="fill the password...">
                            <br>
                            
                            <button class="btn bg-white text-primary float-right" type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
                            <button class="btn bg-white text-danger float-right mr-1" type="reset"><i class="fas fa-retweet"></i> Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>

    <footer class="footer fixed-bottom bg-success">
        <div class="container text-center mt-3 mb-3">
            <span class="text-white">Copyright by @ Yudha - 2020</span>
        </div>
    </footer>

</body>

</html>