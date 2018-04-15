<?php require_once('Connections/shujuku.php'); ?>


<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['usename'])) {
  $loginUsername=$_POST['usename'];
  $password=$_POST['passward'];
  $name="";
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "welcome.php";

  $MM_redirecttoReferrer = false;
  mysqli_select_db($shujuku,$database_shujuku);
 

  $LoginRS__query=sprintf("SELECT username, password FROM form1 WHERE username='$loginUsername' AND password='$password'"
   );

  $LoginRS = mysqli_query($shujuku,$LoginRS__query) or die(mysqli_error());
   if (!$LoginRS) {  printf("Error: %s\n", mysqli_error($shujuku));  exit(); }  
  $loginFoundUser = mysqli_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    mysqli_query($shujuku,"set names 'utf8'");
	if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	   

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
	            // echo "<script>alert('用户名或密码错误登陆失败'); location.href='denglu.php'</script>";
   
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>登录页面</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css"> 
	body{
		
		background:#FDFDFD url(picture/denglu.jpg) no-repeat fixed bottom;
		background-size:100%;
		
	}
	.container_center
	{
		padding:10px;
		
		position:fixed;
		 top:40%;
         right:20%;
		width:350px;
		height:300px;
		border:2px;
		box-shadow: 10px 10px 5px #888888;
        border-radius:25px;
		text:center;
	}
    </style>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid"> 
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#defaultNavbar1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
      <a class="navbar-brand" >菜单</a></div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="defaultNavbar1">
      <ul class="nav navbar-nav">
       <li><a href="HOME.php"><span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span><span class="sr-only">(current)</span></a></li>
        <li class="active" ><a href="denglu.php">登录</a></li>
        <li ><a href="zhuce.php">注册</a></li>
          <li><a href="maipiao.php">买票</a></li>
      </ul>
 <ul class="nav navbar-nav navbar-right">
 
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
  <div class="container">
 
  <div class="container_center">
    <h2 class="text-center">用户登录</h2>
    <br/>
	<div class="row clearfix">
		<div class="col-md-12 column">
	<div class="row clearfix">
		<div class="col-md-12 column">
          <form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" >
            <table width="325">
              <tr>
                <td width="77" height="51" class="text-center" >   用户名</td>
                <td colspan="2" ><label for="usename"></label>
                  <input name="usename" type="text" id="usename"></td>
              </tr>
              <tr>
                <td width="77" height="64" class="text-center"  >密码</td>
                <td colspan="2"><label for="passward"></label>
                  <input type="password" name="passward" id="passward"></td>
              </tr>
          
              <tr>
              <td>
              </td>
                <td width="44"  > 
                </td>
                <td width="188">
                 <input class="btn btn-primary" type="submit" name="sub" id="sub" value="登录">
                </td>
                </tr>
            </table>
          </form>
        </div>
	</div>
  </div>
  		</div>
	</div>
</div>
  


</body>
</html>

