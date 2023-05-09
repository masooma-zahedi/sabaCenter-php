<?php
error_reporting(E_ALL ^ E_WARNING); 
session_start();
$conn = mysqli_connect("localhost", "root", "", "php_test");
if ($_COOKIE['user_remember'] && $_COOKIE['user_pass']) {

    $sql1 = "SELECT * FROM admin_tbl WHERE username = '$_COOKIE[user_remember]'";
    $row1 = mysqli_query($conn, $sql1);
    $res1 = mysqli_fetch_assoc($row1);
    // var_dump($res1);
    // die("333333");
    if (SHA1($_COOKIE['user_pass']) == $res1['password']) {
        
        $_SESSION['name'] = $res1['username'];
        // echo "good job";
        header("location:loginPages.php?email=m@ms.com");
    }

}


if (isset($_POST['btn'])) {
    $data = $_POST['frm'];
    $user_remember = $data["username"];
    $user_pass = $data["password"];

    //start " Remember Me Part"
    if (isset($data['rememberme'])) {
        setcookie("user_remember", $user_remember, time() + (60*60*2));
        setcookie("user_pass", $user_pass, time() + (60*60*2));
    } else {
        echo "no remember";
    }


    // end "remember me part"


    $sql = "SELECT * FROM admin_tbl WHERE username = '$data[username]'";
    $row = mysqli_query($conn, $sql);
    $res = mysqli_fetch_assoc($row);
    var_dump($res);

    if (SHA1($data['password']) == $res['password']) {
        session_start();
        $_SESSION['name'] = $res['username'];
        echo "good job";
        header("location:loginPages.php?email=m@ms.com");
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
    <link rel="stylesheet" href="../sabaStyle.css">

</head>

<body>
    <!-- start header -->
    <div class="header container-fluid" style="background-color :#e3f2fd">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light h2">
                <a class="navbar-brand" href="../sabacenter.php" style="color:#0088cc;text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black; ">Saba Center</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse h5" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link" href="../sabacenter.php">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../contactF/formContact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="../inviteFriends/sabaInviter.php">Invite Friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Donate</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link " href="#">Login</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- end header -->
    <div class="container">
        <!-- start carousel -->
        <div class="row justify-content-center ">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/saba.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/slide2.JPG" alt="Second slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/slide3.JPG" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/slide4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/slide5.JPG" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="../images/slide6.jpg" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- end carousel -->
    </div>
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
            <div class="form-group">
                <input type="checkbox" name="frm[rememberme]" class=""> Remember Me for 2 hours
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </form>

    </div>

    <!-- footer -->
    <div class="footer-bottom fixed-bottom">
        <article class="store-info" data-section-type="storeInfo">
            <address>West Sam Houston Parkway South Suite 103, Houston, TX</address>
            713.974.808
        </article>
        <div class="footer-copyright">
            <p class="powered-by text">© 2023 Saba Center </p>
        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>