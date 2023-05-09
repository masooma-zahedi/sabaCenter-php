<?php
// you must fixed delete in cantact in loginPage.php
date_default_timezone_set("America/Chicago");
session_start();

// ****************** contactUs page php**********
if (isset($_SESSION['name'])) {
    // include_once("../functions/function.php");
    $conn1 = mysqli_connect("localhost", "root", "", "php_test");
    $sql1 = "SELECT * FROM user_tbl";
    $result1 = mysqli_query($conn1, $sql1);
} else {
    header("location:../contactF/formContact.php?login=error1");
}
if (isset($_GET['deleteC'])) {
    $id = $_GET['deleteC'];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sqldelete = "DELETE FROM user_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:loginPages.php?email=m@ms.com");
}


// ***************** inviter page php**************
$conn2 = mysqli_connect("localhost", "root", "", "php_test");
$sql2 = "SELECT * FROM invitefriends";
$result2 = mysqli_query($conn2, $sql2);

// delete Part//
if (isset($_GET['deleteI'])) {
    $id = $_GET['deleteI'];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sqldeleteI = "DELETE FROM invitefriends WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldeleteI);
    header("location:loginPages.php?email=m@ms.com&deleteIn=true");
}


// ******************** list new friends page php **********************
/////////////// showing new friends////////////////
if (isset($_GET['email'])) {
    $email_in = $_GET['email'];
}
// echo $email_in . "<br/>";
$conn = mysqli_connect("localhost", "root", "", "php_test");
$sql1 = "SELECT * FROM newfriends_tbl WHERE email_inviter='$email_in' ";
$rows = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM invitefriends WHERE email = '$email_in' ";
$rowinviter = mysqli_query($conn, $sql2);
$resinviter = mysqli_fetch_assoc($rowinviter);


///////////// Add new friends to data base////////////
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sqladd = "SELECT * FROM newfriends_tbl WHERE  user_id = '$id'";
    $rowaddinfo = mysqli_query($conn, $sqladd);
    $resadd = mysqli_fetch_assoc($rowaddinfo);
    var_dump($resadd);
    $sqlsendadd = "INSERT INTO members_tbl (name,lastname,phone,email) VALUE ('$resadd[name]', '$resadd[lastname]', '$resadd[phone]', '$resadd[email]') ";
    mysqli_query($conn, $sqlsendadd);
    $sqldelete = "DELETE FROM newfriends_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:loginPages.php?email=$email_in&go=newfriend");
}
//  ///////// delete a new friends////////////
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM newfriends_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:loginPages.php?email=$email_in&go=newfriend");
}

// /////////////////////////// members php/////////////////////
$conn = mysqli_connect("localhost", "root", "", "php_test");
$sql = "SELECT * FROM members_tbl";
$resM = mysqli_query($conn, $sql);
// //// delete members////////////////////////
if (isset($_GET['deleteM'])) {
    $id = $_GET['deleteM'];
    $sqldelete = "DELETE FROM members_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:loginPages.php?email=$email_in&deleteMem=true");
}




?>

<!-- ************************************** HTML PART********************** -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>loginPages</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../sabaStyle.css">

</head>

<body>
    <!--**************** header ************* -->
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
                            <a class="nav-link " href="login.php">Login</a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!-- ******************** nav inside**************8 -->
    <!-- <nav> -->
    <div class="nav nav-tabs container" id="nav-tab" role="tablist">
        <a class="nav-item nav-link <?php if (!isset($_GET['go']) & !isset($_GET['deleteIn']) & !isset($_GET['deleteMem'])) {
                                        echo 'active';
                                    } ?> " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">contactUs</a>
        <a class="nav-item nav-link <?php if(isset($_GET['deleteIn'])){echo 'active show';} ?>" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">inviterFriends</a>
        <a class="nav-item nav-link <?php if (isset($_GET['go'])) {
                                        echo 'active show';
                                    }  ?>" id="nav-contact-tab" data-toggle="tab" href="#newFriends" role="tab" aria-controls="nav-contact" aria-selected="false">New Friends</a>
        <!--////////// working on members///////////// -->
        <a class="nav-item nav-link <?php if(isset($_GET['deleteMem'])){ echo "active show";} ?>" id="nav-profile-tab" data-toggle="tab" href="#members" role="tab" aria-controls="nav-profile" aria-selected="false">members</a>
        <!-- end members -->
        <a href="expier.php" class="btn btn-warning" style="line-height:2;">logout</a>

    </div>
    <!--///////////////////////////// </nav> ///////////////////////-->
    <!-- ****************** cantact page************ -->
    <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade <?php if (!isset($_GET["go"]) & !isset($_GET['deleteIn']) & !isset($_GET['deleteMem'])) {
                                        echo 'active show';
                                    } ?>" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="container" id="contactUs">
                <div class="card my-5 ">
                    <div class="card-body h3 text-primary mx-auto">
                        <p class="card-text">Contact Page</p>
                        <!-- <a href="expier.php" class="btn btn-primary ">Logout</a> -->
                    </div>
                </div>
                <table class="table border">
                    <thead>
                        <tr>
                            <th scope="col" class="border">User_id</th>
                            <th scope="col" class="border">Name</th>
                            <th scope="col" class="border">Last Name</th>
                            <th scope="col" class="border">Email</th>
                            <th scope="col" class="border">Phone</th>
                            <th scope="col" class="border">Purpose</th>
                            <th scope="col" class="border">Comment</th>
                            <th scope="col" class="border">Delete</th>
                            <th scope="col" class="border">Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                            <tr>
                                <th scope="row"><?php echo $row["user_id"] ?> </th>
                                <td class="border"><?php echo $row["name"] ?></td>
                                <td class="border"><?php echo $row["lastname"] ?></td>
                                <td class="border"><?php echo $row["email"] ?></td>
                                <td class="border"><?php echo $row["phone"] ?></td>
                                <td class="border"><?php echo $row["purpose"] ?></td>
                                <td class="border"><?php echo $row["comment"] ?></td>
                                <td><a href="loginPages.php?deleteC=<?php echo $row['user_id'] ?>" class="btn btn-danger btn-sm ">delete</a></td>
                                <td class="border"><?php echo $row["date"] ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ***************************** Invinter Friends Page************ -->
        <div class="tab-pane fade <?php if(isset($_GET['deleteIn'])){ echo "active show";} ?> " id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container">
                <div class="card my-5 ">
                    <div class="card-body h3 text-primary mx-auto">
                        <p class="card-text"> inviteFriends Page</p>
                    </div>
                </div>
                <table class="table text-center border">
                    <thead>
                        <tr>
                            <th class="border" scope="col">use_id</th>
                            <th class="border" scope="col">Name</th>
                            <th class="border" scope="col">Last Name</th>
                            <th class="border" scope="col">Email</th>
                            <th class="border" scope="col">Date</th>
                            <th class="border" scope="col">NumPeople</th>
                            <th class="border" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = mysqli_fetch_assoc($result2)) {
                        ?>
                            <tr>
                                <th class="border" scope="row"><?php echo $row["user_id"] ?> </th>
                                <td class="border"><?php echo $row["name"] ?></td>
                                <td class="border"><?php echo $row["lastname"] ?></td>
                                <td class="border"><?php echo $row["email"] ?></td>
                                <td class="border"><?php echo $row["date"] ?></td>
                                <td class="border"><a href="loginPages.php?email=<?php echo $row['email'] ?>&go=newfriend "> <?php echo $row["numPeople"] ?> </a></td>
                                <td><a href="loginPages.php?email=m@ms.com&deleteIn=true&deleteI=<?php echo $row['user_id'] ?>" class="btn btn-danger btn-sm ">delete</a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ****************************** New Friends List -->
        <div class="tab-pane fade <?php if (isset($_GET['go'])) {
                                        echo "active show";
                                    } ?>" id="newFriends" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="container">
                    <div class="card-body bg-primary text-center rounded h5 text-light my-5">
                        <?php
                            if(isset($_GET["go"])){
                                echo $resinviter['name'] . " " . $resinviter['lastname']; ?> introduce on <?php echo $resinviter['date'] ;
                            }else{
                                echo "No New Friends";
                            }
                        ?>
                    </div>
                <table class="table text-center border">
                    <thead>
                        <tr>
                            <th class="border" scope="col">use_id</th>
                            <th class="border" scope="col">Name</th>
                            <th class="border" scope="col">Last name</th>
                            <th class="border" scope="col">Phone</th>
                            <th class="border" scope="col">Email</th>
                            <th class="border" scope="col">Add or Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($res = mysqli_fetch_assoc($rows)) {
                        ?>
                            <tr>
                                <th class="border" scope="row"><?php echo $res["user_id"] ?> </th>
                                <td class="border"><?php echo $res["name"] ?></td>
                                <td class="border"><?php echo $res["lastname"] ?></td>
                                <td class="border"><?php echo $res["phone"] ?></td>
                                <td class="border"><?php echo $res["email"] ?></td>
                                <td class="border">
                                    <a href="loginPages.php?email=<?php echo $resinviter['email'] ?>&id=<?php echo $res["user_id"] ?>" class="btn btn-info btn-sm px-3">add</a>
                                    <a href="loginPages.php?email=<?php echo $resinviter['email'] ?>&delete=<?php echo $res["user_id"] ?>" class="btn btn-danger btn-sm ">delete</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- ****************************** end new friends -->
        <div class="tab-pane fade <?php if(isset($_GET['deleteMem'])){ echo "active show";} ?>" id="members" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="container">
                <div class="card my-5 ">
                    <div class="card-body h3 text-primary mx-auto"> Members </div>
                </div>
                <!-- //////////////////////start table's members /////////-->
                <table class="table text-center border">
                    <thead>
                        <tr>
                            <th class="border" scope="col">use_id</th>
                            <th class="border" scope="col">Name</th>
                            <th class="border" scope="col">Last Name</th>
                            <th class="border" scope="col">Phone</th>
                            <th class="border" scope="col">Email</th>
                            <th class="border" scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rowM = mysqli_fetch_assoc($resM)) {
                        ?>
                            <tr>
                                <th class="border" scope="row"><?php echo $rowM["user_id"] ?> </th>
                                <td class="border"><?php echo $rowM["name"] ?></td>
                                <td class="border"><?php echo $rowM["lastname"] ?></td>
                                <td class="border"><?php echo $rowM["phone"] ?> </td>
                                <td class="border"><?php echo $rowM["email"] ?></td>
                                <td><a href="loginPages.php?deleteM=<?php echo $rowM['user_id'] ?>" class="btn btn-danger btn-sm ">delete</a></td>


                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <!-- end table's members -->
            </div>
        </div>
    </div>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>



    <!-- footer -->
        <div class="footer-bottom ">
            <article class="store-info" data-section-type="storeInfo">
                <address>West Sam Houston Parkway South Suite 103, Houston, TX</address>
                713.974.808
            </article>
            <div class="footer-copyright">
                <p class="powered-by text">© 2023 Saba Center </p>
            </div>
        </div>




    <!-- ******************************** Bootstrap Script************* -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>