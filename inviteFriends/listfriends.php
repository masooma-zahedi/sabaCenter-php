<?php
if(isset($_GET['email'])){
    $email_in = $_GET['email'];
}
// echo $email_in . "<br/>";
$conn = mysqli_connect("localhost", "root", "", "php_test");
$sql1 = "SELECT * FROM newfriends_tbl WHERE email_inviter='$email_in' ";
$rows = mysqli_query($conn, $sql1);
$sql2 = "SELECT * FROM invitefriends WHERE email = '$email_in' ";
$rowinviter = mysqli_query($conn, $sql2);
$resinviter = mysqli_fetch_assoc($rowinviter);
// var_dump($resinviter) ;
// 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sqladd = "SELECT * FROM newfriends_tbl WHERE  user_id = '$id'";
    $rowaddinfo = mysqli_query($conn, $sqladd);
    $resadd = mysqli_fetch_assoc($rowaddinfo);
    var_dump($resadd);
    $sqlsendadd = "INSERT INTO members_tbl (name,lastname,phone,email) VALUE ('$resadd[name]', '$resadd[lastname]', '$resadd[phone]', '$resadd[email]') ";
    mysqli_query($conn,$sqlsendadd);
    $sqldelete = "DELETE FROM newfriends_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:listfriends.php?email=$email_in");

}

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $sqldelete = "DELETE FROM newfriends_tbl WHERE  user_id = '$id'";
    mysqli_query($conn, $sqldelete);
    header("location:listfriends.php?email=$email_in");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new friends</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card-body bg-primary rounded h5 text-light">
            <?php echo $resinviter['name']." ".$resinviter['lastname']; ?> introduce : 
        </div>
        <table class="table text-center border">
            <thead>
                <tr>
                    <th class="border" scope="col">use_id</th>
                    <th class="border" scope="col">Name</th>
                    <th class="border" scope="col">Last name</th>
                    <th class="border" scope="col">phone</th>
                    <th class="border" scope="col">add to group</th>
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
                        <!-- <td class="border"> -->
                        <td class="border">
                            <a href="listfriends.php?email=<?php echo $resinviter['email'] ?>&id=<?php echo $res["user_id"] ?>" class="btn btn-info btn-sm px-3">add</a>
                            <a href="listfriends.php?email=<?php echo $resinviter['email'] ?>&delete=<?php echo $res["user_id"] ?>" class="btn btn-danger btn-sm ">delete</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>