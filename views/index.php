
<?php
include '../config/db_login.php';

if(isset($_POST['login'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  
  // Melakukan query ke database untuk memeriksa kecocokan username dan password
  $query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
  $result = mysqli_query($koneksi, $query);
  
  // Memeriksa hasil query
  if(mysqli_num_rows($result) == 1){
      // Login berhasil
      // Lakukan tindakan yang sesuai, seperti mengarahkan pengguna ke halaman beranda
      header("Location: data_tagihan.php");
      exit();
  } else {
      // Login gagal
      // Tampilkan pesan error atau lakukan tindakan lain yang sesuai
      $hasil = '<input type="password" class="bg-danger form-control" id="notice" placeholder="Username Atau Password Salah!" name="password" disabled  >';
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Web database UI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <style>
        #login-form {
          height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        #notice::placeholder {
          color: white;
        }
    </style>

</head>
  <body>
    
    <div id="login-form">
            <div class="container" style="width: 500px;" >
                <div class="card">  
                <div class="card-body">
                    <h2 class="card-title text-center">Login Admin</h2>
                    <form method="post">
                    <div class="form-group m-2">
                        <label for="username">Username:</label>
                        <input type="text" class="form-control" id="username" placeholder="Masukkan Username" name="username" required>
                    </div>
                    <div class="form-group m-2">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" placeholder="Masukkan Password" name="password" required>
                    </div>
                    <div class="form-group m-2">
                        <?php if(isset($_POST['login'])){ echo $hasil; }?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block m-2" name="login">Login</button>
                    </form>
                </div>
                </div>
            </div>
    </div>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>