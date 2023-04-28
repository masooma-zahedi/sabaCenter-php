<?php
if(isset($_POST['btn'])){
$data = $_POST['frm'];
$conn = mysqli_connect("localhost","root","","php_test");
$sql = "SELECT * FROM admin_tbl WHERE username = '$data[username]'";
$row = mysqli_query($conn,$sql);
$res = mysqli_fetch_assoc($row);
var_dump($res);

if(SHA1($data['password']) == $res['password']){
    session_start();
    $_SESSION['name']= $res['username'];
    // echo "good job";
    // header("location:../contactF/listcontact.php?login=true");
    header("location:loginPages.php");
}

 

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="card container my-4">
        <div class="card-body text-center text-warning h3">Login Form</div>
    </div>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">username</label>
                <input type="text" name="frm[username]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter username">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="frm[password]" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </form>
        <!-- <?php
        if (isset($_GET["login"])) {
            if ($_GET['login'] == 'error') {
                echo '
            <div class="cord">
                <div class="cord-body h4 text-center text-danger">Error login !!!</div>
            </div>';
            } else if ($_GET['login'] == 'error1') {
                echo '
            <div class="cord">
                <div class="cord-body h4 text-center text-danger">please login first!!!</div>
            </div>';
            }else if ($_GET['login'] == 'logout') {
                echo '
            <div class="cord">
                <div class="cord-body h4 text-center text-danger">logout</div>
            </div>';
            }
        } ?> -->

    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>