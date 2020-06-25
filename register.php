<?php
ob_start();
session_start();

if (isset($_SESSION['user']) != "") {
    header("Location: index.php");
}
include_once 'dbconnect.php';

if (isset($_POST['signup'])) {

    $uname = trim($_POST['uname']); // get posted data and remove whitespace
    $email = trim($_POST['email']);
    $upass = trim($_POST['pass']);

    // hash password with SHA256;
    $password = hash('sha256', $upass);

    // check email exist or not
    $stmt = $conn->prepare("SELECT email FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $stmt->close();

    $count = $result->num_rows;

    if ($count == 0) { // if email is not found add user

       if(!empty($_POST["upass"]) && ($_POST["password"] == $_POST["cpassword"])) {
    $password = test_input($_POST["password"]);
    $cpassword = test_input($_POST["cpassword"]);
    if (strlen($_POST["$upass"]) <= '8') {
         $errTyp="warning";
    $errMSG = "Your Password Must Contain At Least 8 Characters!";
    }
    elseif(!preg_match("#[0-9]+#",$upass)) {
         $errTyp="warning";
    $errMSG = "Your Password Must Contain At Least 1 Number!";
    }
    elseif(!preg_match("#[A-Z]+#",$upass)) {
         $errTyp="warning";
    $errMSG = "Your Password Must Contain At Least 1 Capital Letter!";
    }
    elseif(!preg_match("#[a-z]+#",$upass)) {
         $errTyp="warning";
    $errMSG = "Your Password Must Contain At Least 1 Lowercase Letter!";
    }
}
elseif(!empty($_POST["upass"])) {
     $errTyp="warning";
    $errMSG = "Please Check You've Entered Or Confirmed Your Password!";
} 
        else
{
        $stmts = $conn->prepare("INSERT INTO users(username,email,password) VALUES(?, ?, ?)");
        $stmts->bind_param("sss", $uname, $email, $password);
        $res = $stmts->execute();//get result
        $stmts->close();

        $user_id = mysqli_insert_id($conn);
        if ($user_id > 0) {
            $_SESSION['user'] = $user_id; // set session and redirect to index page
            if (isset($_SESSION['user'])) {
                print_r($_SESSION);
                header("Location: index.php");
                exit;
            }

        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again";
        }
    }
    }
     else {
        $errTyp = "warning";
        $errMSG = "Email is already used";
    }

}
?>

<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    <script type="text/javascript">

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    re = /^\w+$/;
    if(!re.test(form.username.value)) {
      alert("Error: Username must contain only letters, numbers and underscores!");
      form.username.focus();
      return false;
    }

    if(form.pass.value != "") {
      if(form.pass.value.length < 6) {
        alert("Error: Password must contain at least six characters!");
        form.pass.focus();
        return false;
      }
      if(form.pass.value == form.username.value) {
        alert("Error: Password must be different from Username!");
        form.pass.focus();
        return false;
      }
      re = /[0-9]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one number (0-9)!");
        form.pass.focus();
        return false;
      }
      re = /[a-z]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one lowercase letter (a-z)!");
        form.pass.focus();
        return false;
      }
      re = /[A-Z]/;
      if(!re.test(form.pass.value)) {
        alert("Error: password must contain at least one uppercase letter (A-Z)!");
        form.pass.focus();
        return false;
      }
    } else {
      alert("Error: Please check that you've entered and confirmed your password!");
      form.pass.focus();
      return false;
    }

    alert("You entered a valid password: " + form.pass.value);
    return true;
  }

</script>

</head>
<body>

    <div class="container-fluid">

        <div class="row" style="background-image: url('images/ori.jpg');background-position:center;background-size:100%">

            <div class="col-md-8"> </div>
            <div class="col-md-4" style="background-color:white;">
                <div id="login-form" style="height:750px">
                    <form name="form" method="post" autocomplete="off">

                        <div class="col-md-12">
                            <br /><br /> <br />

                            <div class="form-group">
                                <h2 class="" style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:xx-large"> <b>Register </b></h2>
                            </div>

                            <div class="form-group">
                                <hr />
                            </div>

                            <?php
                            if (isset($errMSG)) {

                            ?>
                            <div class="form-group">
                                <div class="alert alert-<?php echo ($errTyp == " success") ? "success" : $errTyp; ?>
                                    ">
                                    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                </div>
                            </div>
                            <?php
                            }
                            ?>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="uname" class="form-control" placeholder="Enter Username" required style="height:60px" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" required style="height:60px" />
                                </div>
                            </div>
                            
                            <div class="form-group" onsubmit="return checkForm(this);">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="pass" class="form-control" placeholder="Enter Password"
                                           required style="height:60px" />
                                </div>
                            </div>
                            
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" id="TOS" value="This"><a href="#">
                                        I agree with
                                        terms of service
                                    </a>
                                </label>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg" style="height:50px">Register</button>
                            </div>

                            <div class="form-group">
                                <hr />
                            </div>

            


                            </span>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/tos.js"></script>
    
    


</body>
</html>
