<?php 
$id = $_GET["id"];
$conn=mysqli_connect("localhost","root","","php_test");
$sql ="SELECT * FROM user_tbl WHERE user_id = '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

// after edit ===> update data 
if(isset($_POST['btn'])){
    $data = $_POST['frm'];
    var_dump($data);
    $sql1 = "UPDATE user_tbl SET name='$data[name]', lastname='$data[lastname]',email='$data[email]', phone='$data[phone]', purpose='$data[purpose]', comment='$data[comment]'  WHERE user_id= '$id'  ";
    mysqli_query($conn,$sql1);
    header('location: listcontact.php');
}


?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="card my-5 ">
            <div class="card-body h3 text-primary mx-auto"> Please Edit from contact form. </div>
        </div>
        <form action="" method="post">
            <div class="form-row row">
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputFname4">First Name <span class='text-danger'>*</span> </label>
                    <input type="text" name="frm[name]" value="<?php echo $row['name'] ?>" class="form-control" id="inputFname4" placeholder="First Name"  />
                </div>
                <div class="form-group col-12 col-md-6 mb-3">
                    <label htmlFor="inputLname4">Last Name <span class='text-danger'>*</span></label>
                    <input type="text" name="frm[lastname]" value="<?php echo $row['lastname'] ?>" class="form-control" id="inputLname4" placeholder="Last Name"  />
                </div>
            </div>
            <div class="form-group mb-3">
                <label htmlFor="exampleInputEmail1">
                    <FiMail /> Email address <span class='text-danger'>*</span>
                </label>
                <input type="email" name="frm[email]" value="<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"  />
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mb-3 row">
                <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                <input type="tel" id="phone4" name="frm[phone]" value="<?php echo $row['phone'] ?>" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded'  />
            </div>
            <div class="form-group mb-3 row">
                <div class='h4 col-12'>Purpose of contact</div>
                <div class="" style="display:flex;flex-direction:column">
                    <div class="form-check">
                        <input class="form-check-input" type="radio"  name="frm[purpose]" id="exampleRadios1" value="Suggestions" <?php if($row['purpose'] == "Suggestions"){echo "checked"; } ?> />
                        <label class="form-check-label" htmlFor="exampleRadios1">
                            Suggestions
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios2" value="Technical issue with Website" <?php if($row['purpose'] == "Technical issue with Website"){echo "checked"; } ?> />
                        <label class="form-check-label" htmlFor="exampleRadios2">
                            Technical issue with Website
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Complains" <?php if($row['purpose'] == "Complains"){echo "checked"; } ?> />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Complains
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Community matters" <?php if($row['purpose'] == "Community matters" ){echo "checked"; } ?> />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Community matters
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="frm[purpose]" id="exampleRadios3" value="Other" <?php if($row['purpose'] == "other" ){echo "checked"; } ?> />
                        <label class="form-check-label" htmlFor="exampleRadios3">
                            Other
                        </label>
                        <div class='text-secondary font-italic'>Please describe details below</div>
                    </div>
                </div>
            </div>
            <div class="form-group mb-4">
                <label htmlFor="exampleFormControlTextarea1">Comments </label>
                <textarea name="frm[comment]" class="form-control" id="exampleFormControlTextarea1" rows="4"> <?php echo $row['comment'] ?> </textarea>
            </div>
            <button type="submit" name="btn" class="btn btn-primary">Submit</button>
        </form>
        <?php if(isset($_GET['contact'])){ ?>
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