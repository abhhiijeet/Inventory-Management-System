<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_user where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:index.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <style>
         h2{
            text-align: center;
         }
         body {
            background-color: #1967b1;
            font-family: "Times New Roman", Times, serif;
            text-align: center;
         }
         form {
            border-radius: 1rem;
            background-color: #fff;
            max-width: 500px;
            margin: 50px auto;
            padding: 30px 20px;
            box-shadow: 2px 5px 10px rgba(0, 0, 0, 0.5);
         }
         .form-control {
            text-align: left;
            margin-bottom: 25px;
         }
         .form-control label {
            display: block;
            margin-bottom: 10px;
         }
         .form-control input,
         .form-control select,
         .form-control textarea {
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            padding: 10px;
            display: block;
            width: 95%;
         }
         .form-control input[type="radio"],
         .form-control input[type="checkbox"] {
            display: inline-block;
            width: auto;
         }
         button {
            background-color: #05c46b;
            border: 1px solid #777;
            border-radius: 2px;
            font-family: inherit;
            font-size: 21px;
            display: block;
            width: 100%;
            margin-top: 50px;
            margin-bottom: 20px;
         }
	</style>
   </head>
   <body class="bg-dark">
      <form method="post">
         <div class="form-control">
            <h2>Login Page</h2>
               <label>Username</label>
                  <input type="text" name="username" class="form-control" placeholder="Username" required>
         </div>
         <div class="form-control">
               <label>Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Password" required>
         </div>
         <button type="submit" name="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
            <div class="field_error"><?php echo $msg?></div>
		</form>
   </body>
</html>