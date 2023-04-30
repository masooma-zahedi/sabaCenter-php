<?php
if (isset($_POST['btn'])) {
    // echo "hi masooma";
    $data = $_POST["frm"];
    // echo $data["name"];
    // var_dump($data);
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sql = "INSERT INTO user_tbl (name,lastname,email,phone,purpose,comment) VALUES ('$data[name]','$data[lastname]','$data[email]','$data[phone]','$data[purpose]','$data[comment]')";

    mysqli_query($conn, $sql);
    header("location:formContact.php?contact='true'");
}


?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
       #boxcarousel{
        height: 400px;
        width: 700px;
       }
       @media only screen and (max-width: 600px) {
        #boxcarousel{
            height: 300px;
            width: 400px;
        }
       }
    </style>

</head>

<body>
    <!-- header -->
    <div class="header container-fluid" style="background-color :#e3f2fd">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light h2">
                <a class="navbar-brand" href="../sabacenter.php">Saba Center</a>
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
                            <a class="nav-link " href="../login/login.php">Login</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- end header -->

    <div class="container">
        <!-- start carousel -->
        <div class="row justify-content-center" >
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
        <div class="card my-5 ">
            <div class="card-body h3 text-primary mx-auto"> Please fill out the form below and we’ll be in touch. </div>
        </div>
        <form action="" method="post">
            <div class="form-row row">
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputFname4">First Name <span class='text-danger'>*</span> </label>
                    <input type="text" name="frm[name]" class="form-control" id="inputFname4" placeholder="First Name" />
                </div>
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputLname4">Last Name <span class='text-danger'>*</span></label>
                    <input type="text" name="frm[lastname]" class="form-control" id="inputLname4" placeholder="Last Name" />
                </div>
            </div>
            <div class="form-group mb-3">
                <label htmlFor="exampleInputEmail1">
                    <FiMail /> Email address <span class='text-danger'>*</span>
                </label>
                <input type="email" name="frm[email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3 row">
                <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                <input type="tel" id="phone4" name="frm[phone]" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded' />
            </div>
            <div class="form-group mb-3 row">
                <div class='h4 col-12'>Purpose of contact</div>
                <div class="" style="display:flex;flex-direction:column">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios1" value="Suggestions" checked />
                        <label class="form-check-label" htmlFor="exampleRadios1">
                            Suggestions
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios2" value="Technical issue with Website" />
                        <label class="form-check-label" htmlFor="exampleRadios2">
                            Technical issue with Website
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Complains" />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Complains
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Community matters" />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Community matters
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Other" />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Other
                        </label>
                        <div class='text-secondary font-italic'>Please describe details below</div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label htmlFor="exampleFormControlTextarea1">Comments </label>
                <textarea name="frm[comment]" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </form>
        <?php if (isset($_GET['contact'])) { ?>
            <div class="card my-3">
                <div class="card-body text-success  h6 mx-auto">Send information!</div>
            </div>
        <?php } ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>