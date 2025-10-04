<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('includes/config.php');

// Logout old session
if(isset($_SESSION['login']) && $_SESSION['login']!=''){
    $_SESSION['login']='';
}

// Handle login form submission
if(isset($_POST['login']))
{
    $email = trim($_POST['emailid']);
    $password = md5(trim($_POST['password'])); // Hash password

    $sql = "SELECT EmailId, Password, StudentId, Status FROM tblstudents WHERE EmailId=:email AND Password=:password";
    $query = $dbh->prepare($sql);
    $query->bindParam(':email', $email, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);

    if($query->rowCount() > 0)
    {
        foreach ($results as $result) {
            $_SESSION['stdid'] = $result->StudentId;
            if($result->Status == 1)
            {
                $_SESSION['login'] = $result->EmailId;
                header("Location: dashboard.php");
                exit();
            } else {
                $error = "Your Account has been blocked. Please contact admin.";
            }
        }
    } 
    else {
        $error = "Invalid Details. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Online Library Management System" />
    <meta name="author" content="" />
    <title>Online Library Management System | User Login</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style= style = "background-color: #f2f2f2;" ></body>
            

<?php include('includes/header.php');?>

<div class="content-wrapper">
<div class="container">
<div class="row pad-botm">
<div class="col-md-12">
<h4 class="header-line" style="color:white;">USER LOGIN FORM</h4>
</div>
</div>

<div class="row">
<div class="col-md-6 col-md-offset-3">
<div class="panel panel-info" style="background-color: rgba(255,255,255,0.9);">
<div class="panel-heading">
LOGIN FORM
</div>
<div class="panel-body">
<?php if(isset($error)){ ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php } ?>
<form method="post" role="form">
<div class="form-group">
<label>Enter Email id</label>
<input class="form-control" type="email" name="emailid" required autocomplete="off" />
</div>

<div class="form-group">
<label>Password</label>
<input class="form-control" type="password" name="password" required autocomplete="off" />
<p class="help-block"><a href="user-forgot-password.php">Forgot Password</a></p>
</div>

<button type="submit" name="login" class="btn btn-info">LOGIN</button> | <a href="signup.php">Not Registered Yet?</a>
</form>
</div>
</div>
</div>
</div>  

</div>
</div>

<?php include('includes/footer.php');?>
<script src="assets/js/jquery-1.10.2.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
