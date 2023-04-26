<?php
session_start();
if(isset($_SESSION['name'])){
  $conn = mysqli_connect("localhost", "root", "", "php_test");
  $sql = "SELECT * FROM user_tbl";
  $result = mysqli_query($conn, $sql);
}
else{
  header("location:formContact.php?login=error1");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saba Center Contact</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <div class="card my-5 ">
      <div class="card-body h3 text-primary mx-auto">
        <p class="card-text">Contact Page</p>
        <a href="expier.php" class="btn btn-primary ">Logout</a>
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
          <th scope="col" class="border">delete</th>
          <th scope="col" class="border">edit</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <th scope="row"><?php echo $row["user_id"] ?> </th>
            <td class="border"><?php echo $row["name"] ?></td>
            <td class="border"><?php echo $row["lastname"] ?></td>
            <td class="border"><?php echo $row["email"] ?></td>
            <td class="border"><?php echo $row["phone"] ?></td>
            <td class="border"><?php echo $row["purpose"] ?></td>
            <td class="border"><?php echo $row["comment"] ?></td>
            <td class="border"><a href="deletecontact.php?id=<?php echo $row["user_id"] ?>" class="btn btn-danger">delete</a></td>
            <td class="border"><a href="editcontact.php?id=<?php echo $row["user_id"] ?>" class="btn btn-warning">edit</a></td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
    <?php if (isset($_GET['delete'])) { ?>
      <div class="card">
        <div class="card-body text-danger mx-auto h5">User Deleted !</div>
      </div>
    <?php } ?>
  </div>


  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>