<?php
$conn = mysqli_connect("localhost", "root", "", "php_test");
$sql = "SELECT * FROM invitefriends";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invite Friends list</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h2 class="m-5">Invite Friends</h2>
        <table class="table text-center border">
            <thead >
                <tr>
                    <th class="border"  scope="col">use_id</th>
                    <th class="border"  scope="col">Name</th>
                    <th class="border"  scope="col">Last name</th>
                    <th class="border"  scope="col">Email</th>
                    <th class="border"  scope="col">numPeople</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_assoc($result)){
                ?>
                <tr>
                    <th class="border"  scope="row"><?php echo $row["user_id"] ?> </th>
                    <td class="border" ><?php echo $row["name"] ?></td>
                    <td class="border" ><?php echo $row["lastname"] ?></td>
                    <td class="border" ><?php echo $row["email"] ?></td>
                    <td class="border" ><a href="listfriends.php?email=<?php echo $row['email'] ?> "><?php echo $row["numPeople"] ?> </a></td>
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