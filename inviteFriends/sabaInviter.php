<?php
date_default_timezone_set("America/Chicago");
$date = date("m-d-Y");
if (isset($_POST["btn"])) {
    $data = $_POST["frm"];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sql = "INSERT INTO invitefriends (name,lastname,email,numPeople,date) VALUES ('$data[name]','$data[lastname]','$data[email]','$data[numPeople]','$date')";
    mysqli_query($conn, $sql);
    header("location:sabaInviter.php?email=$data[email] ");
}
if (isset($_POST['add'])) {
    $email = $_GET['email'];
    $data2 = $_POST['frm'];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sql1 = "INSERT INTO newfriends_tbl (name,lastname,phone,email_inviter,email) VALUES ('$data2[namef]','$data2[lastnamef]','$data2[phonef]','$email','$data2[emailf]')";
    mysqli_query($conn, $sql1);

    // header("location:listfriends.php");
}


// when doing submit =>it does not translat information from 'Add friends';


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saba Invite</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../sabaStyle.css">

    <!-- <style>
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
    </style> -->

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
        <div class="row justify-content-center "  >
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
        <div class="card my-4 ">
            <div class="card-body h3 text-primary mx-auto"> Invite Friends :</div>
        </div>
         <form method="post" action="" id="add_info">
            <div class="form-row row">
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputFname4">First Name <span class='text-danger'>*</span> </label>
                    <input type="text" name="frm[name]" class="form-control" id="inputFname4" placeholder="First Name" required />
                </div>
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputLname4">Last Name <span class='text-danger'>*</span></label>
                    <input type="text" name="frm[lastname]" class="form-control" id="inputLname4" placeholder="Last Name" required />
                </div>
            </div>
            <div class="form-group mb-3">
                <label htmlFor="exampleInputEmail1">
                    <FiMail /> Email address <span class='text-danger'>*</span>
                </label>
                <input type="email" name="frm[email]" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3">
                <div>
                    How many people are you going to add? <span class='text-danger'>*</span>
                </div>
                <select class="mb-4" name="frm[numPeople]" id="nump" onchange="handleChange()" class="form-select" aria-label="Default select example" required>
                    <option> Add Friends</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    <option value="4">Four</option>
                    <option value="5">Five</option>
                </select>

            </div>
            <input type="submit" id="sub_add" name="btn" class="btn btn-primary" />
        </form>
        <?php if (isset($_GET['email'])) { ?>
            <div class="alert alert-info text-center mt-3">
                please add your friends
            </div>
        <?php } ?>
        <!-- ********************************************** -->
        <!-- modal ..... -->
        <!-- Button trigger modal  -->
        <button type="button" class="btn btn-primary mt-2" data-toggle="modal" data-target="#exampleModalCenter">
            Add Friends
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"> Add Friends </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body" id="mymodal">
                        <form action="" method="post">
                            <div id="demo ">
                                <div class="card ">
                                    <div class="card-body" id="show_item">
                                        <div class=' p-3 '>
                                            <div class=' h4'>
                                                person #
                                            </div>
                                            <div class="form-row row">
                                                <div class="form-group col-12  mb-3">
                                                    <label htmlFor="Fname4">First Name <span class='text-danger'>*</span></label>
                                                    <input type="text" name="frm[namef]" id='nameP' class="form-control" id="Fname4" placeholder="First Name" required />
                                                </div>
                                                <div class="form-group col-12 mb-3">
                                                    <label htmlFor="Lname4">Last Name <span class='text-danger'>*</span></label>
                                                    <input type="text" name="frm[lastnamef]" class="form-control" id="Lname4" placeholder="Last Name" />
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 row">
                                                <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                                                <input type="tel" id="phone4" name="frm[phonef]" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded' />
                                            </div>
                                            <!-- adding email -->
                                            <div class="form-group mb-3 row">
                                                <label htmlFor="email" class='col-12'>Email <span class='text-danger'>*</span></label>
                                                <input type="email" id="email" name="frm[emailf]"  placeholder='m@gmail.com' class='col-12 border rounded' />
                                            </div>
                                            <!-- end adding email -->
                                            <div class='d-flex justify-content-center'>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <input type="submit" name="add" id="addmore" class="btn btn-primary w-25" value="Add ">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- <div class="modal-footer"> -->
                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                    <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    <!-- </div> -->
                </div>
            </div>
        </div>
        <!-- end modal -->
    </div>

    <!-- footer -->
    <div class="footer-bottom ">
        <article class="store-info" data-section-type="storeInfo">
            <address>West Sam Houston Parkway South Suite 103, Houston, TX</address>
            713.774.808
        </article>
        <div class="footer-copyright">
            <p class="powered-by text">© 2023 Saba Center </p>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $("#addmore").click(function(e) {
                e.preventDefault();
                $("#show_item").prepend(`   <div class=' p-3 ' >
                                                <div class=' h4'>
                                                    person #
                                                </div>
                                                <div class="form-row row">
                                                    <div class="form-group col-12 col-md-6 mb-3">
                                                        <label htmlFor="Fname4">First Name <span class='text-danger'>*</span></label>
                                                        <input type="text" id='nameP' class="form-control" id="Fname4" placeholder="First Name" required />
                                                    </div>
                                                    <div class="form-group col-12 col-md-6 mb-3">
                                                        <label htmlFor="Lname4">Last Name <span class='text-danger'>*</span></label>
                                                        <input type="text" class="form-control" id="Lname4" placeholder="Last Name" />
                                                    </div>
                                                </div>
                                                <div class="form-group mb-3 row">
                                                    <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                                                    <input type="tel" id="phone4" name="phone" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded' />
                                                </div>
                                                <div>
                                                    <input type="button" id="removeitem" class="btn btn-danger w-25" value="Remove">
                                                </div>
                                            </div>`
                                        )
            })
            $(document).on("click", "#removeitem", function(e) {
                e.preventDefault();
                let remove =$("#removeitem").parent().parent();
                $(remove).remove();
            })



        })
    </script> -->
</body>

</html>