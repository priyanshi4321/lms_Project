if(isset($_POST['login']))
{
    // CAPTCHA CHECK TEMPORARILY DISABLED FOR DEMO
    // if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
    //     echo "<script>alert('Incorrect verification code');</script>" ;
    // } 
    // else {

    $username=$_POST['username'];
    $password=md5($_POST['password']);
    $sql ="SELECT UserName,Password FROM admin WHERE UserName=:username and Password=:password";
    $query= $dbh -> prepare($sql);
    $query-> bindParam(':username', $username, PDO::PARAM_STR);
    $query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
    {
        $_SESSION['alogin']=$_POST['username'];
        echo "<script type='text/javascript'> document.location ='admin/dashboard.php'; </script>";
    } else{
        echo "<script>alert('Invalid Details');</script>";
    }

    // }   <-- ensure if you removed the commented else you DO NOT leave an extra brace
}
