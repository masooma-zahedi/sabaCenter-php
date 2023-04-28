<?php

if (isset($_POST["btn"])) {
    $data = $_POST["frm"];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sql = "INSERT INTO invitefriends (name,lastname,email,numPeople) VALUES ('$data[name]','$data[lastname]','$data[email]','$data[numPeople]')";
    mysqli_query($conn, $sql);
    header("location:sabaInviter.php?email=$data[email] ");
}
if (isset($_POST['add'])) {
    $email = $_GET['email'];
    $data2 = $_POST['frm'];
    $conn = mysqli_connect("localhost", "root", "", "php_test");
    $sql1 = "INSERT INTO newfriends_tbl (name,lastname,phone,email_inviter) VALUES ('$data2[namef]','$data2[lastnamef]','$data2[phonef]','$email')";
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

</head>

<body>



    <div class="container">
        <h2>Invite Friends : </h2>
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
        <button type="button" class="btn btn-primary mt-4" data-toggle="modal" data-target="#exampleModalCenter">
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
        <!-- <form action="" method="post">
            <div id="demo ">
                <div class="card w-50">
                    <div class="card-header">
                        Add Friends
                    </div>
                    <div class="card-body" id="show_item">
                        <div class=' p-3 '>
                            <div class=' h4'>
                                person #
                            </div>
                            <div class="form-row row">
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label htmlFor="Fname4">First Name <span class='text-danger'>*</span></label>
                                    <input type="text" name="frm[namef]" id='nameP' class="form-control" id="Fname4" placeholder="First Name" required />
                                </div>
                                <div class="form-group col-12 col-md-6 mb-3">
                                    <label htmlFor="Lname4">Last Name <span class='text-danger'>*</span></label>
                                    <input type="text" name="frm[lastnamef]" class="form-control" id="Lname4" placeholder="Last Name" />
                                </div>
                            </div>
                            <div class="form-group mb-3 row">
                                <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                                <input type="tel" id="phone4" name="frm[phonef]" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded' />
                            </div>
                            <div class='d-flex justify-content-center'>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input type="submit" name="add" id="addmore" class="btn btn-primary w-25" value="Add More">
                    </div>
                </div>
            </div>
        </form> -->
    </div>

    <!-- <script>
        function handleChange(){
            var x = document.getElementById("nump").value;
            document.getElementById("demo").innerHTML = "";
            for(let i = 1; i <= x; i++){
                let demo =document.getElementById("demo");
                let newhtml = "";

                
                newhtml +=`<div  class=' p-3 '>
              <div class=' h4'>
                person # ${i}
              </div>
              <div class="form-row row">
                <div class="form-group col-12 col-md-6 mb-3">
                  <label htmlFor="Fname4">First Name <span class='text-danger'>*</span></label>
                  <input type="text" id='nameP' class="form-control" id="Fname4" placeholder="First Name" required />
                </div>
                <div class="form-group col-12 col-md-6 mb-3">
                  <label htmlFor="Lname4">Last Name <span class='text-danger'>*</span></label>
                  <input type="text" class="form-control" id="Lname4" placeholder="Last Name"  />
                </div>
              </div>
              <div class="form-group mb-3 row">
                <label htmlFor="phone4" class='col-12'>Phone <span class='text-danger'>*</span></label>
                <input type="tel" id="phone4" name="phone" maxlength="13" placeholder='+1 (201)555-0123' class='col-12 border rounded'  />
              </div>
              <div class='d-flex justify-content-center'>
                <hr class='border border-warning' style={{ width: '80%' }} />
              </div>
            </div>
            `

            demo.innerHTML += newhtml;       
        }
        }
    </script> -->

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