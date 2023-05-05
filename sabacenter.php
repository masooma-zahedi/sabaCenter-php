<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SabaCenter</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="sabaStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- header -->
    <div class="header container-fluid" style="background-color :#e3f2fd">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light h2">
                <a class="navbar-brand" href="#">Saba Center</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse h5" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactF/formContact.php">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="inviteFriends/sabaInviter.php">Invite Friends</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="#">Donate</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="login/login.php">Login</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- main content -->
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
                        <img class="d-block w-100 h-100" src="./images/saba.jpg" alt="First slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="./images/slide2.JPG" alt="Second slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="./images/slide3.JPG" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="./images/slide4.jpg" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="./images/slide5.JPG" alt="Third slide">
                    </div>
                    <div class="carousel-item" id="boxcarousel">
                        <img class="d-block w-100 h-100" src="./images/slide6.jpg" alt="Third slide">
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
        <!-- about us -->
        <div id="aboutUs" class='mt-4 container  pt-1' style=" text-align:justify">
            <p>
                Saba Center is a community based non-profit organization serving mainly Afghan community in Greater Houston area Texas. If you like to engage and be part of our mission, there are many ways you can contribute and help us provide better services to our community.
            </p>
        </div>
        <!-- content -->
        <div class='d-flex justify-content-center mb-2'>
            <hr class='border border-secondary ' style=" width: 70% " />
        </div>
        <div class='row ' style=" text-align:justify">
            <div class="col-12 col-lg-4 mb-3 px-3" id='contactUs' style=" text-align:justify">
                <p class='text-justify'>
                    We would like to have contacts of as many community members in Greater Houston area as possible. If you know a new comer or someone that might not know about Saba Center, please do us a huge favor and submit their contact info clicking on the bottom below.
                </p>
                <a href="inviteFriends/sabaInviter.php" class='btn btn-primary btn-lg'>
                    Invite Friend
                </a>
            </div>
            <div class="col-12 col-lg-4 mb-3 px-3" id='donate'>
                <p>
                    For any means of contribution to to Saba Center programs, use the link below or click on Donate on top menu to send our financial contribution
                </p>
                <a href="#" class='btn btn-primary btn-lg'>
                    One Time Contribution
                </a>
            </div>
            <div class="col-12 col-lg-4 mb-3 px-3" id='inviteFriends'>
                <p>
                    We welcome any comments, suggestion and ideas you might have that can help us improve our services and reach out to more community members. To submit your suggestions, use contact-us page on top menu or click on bottom below.
                </p>
                <a href="contactF/formContact.php" class='btn btn-primary btn-lg'>
                    Contact Us
                </a>
            </div>
        </div>

    </div>
    <!-- footer -->
    <div class="footer-bottom">
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

</body>

</html>