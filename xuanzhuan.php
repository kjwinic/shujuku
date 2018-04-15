
<?php require_once('Connections/shujuku.php'); ?>

<?php

if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}
if (!isset($_SESSION)) {
  session_start();
}
 mysql_select_db($database_shujuku, $shujuku);
 $data= sprintf("SELECT COUNT(*) from tuoluo");
 $rs=mysql_query($data,$shujuku) or die(mysql_error());
 $sum = mysql_fetch_array($rs);
 $numrows = $sum[0];
 $maipiao = sprintf("SELECT maipiao from form1 WHERE username=%s",GetSQLValueString($_SESSION[MM_Username], "text"));
 $flag=mysql_query($maipiao,$shujuku) or die(mysql_error());
 $maipiaoflag=mysql_fetch_array($flag);
 $selectsql =  sprintf("SELECT usename from tuoluo WHERE usename=%s",GetSQLValueString($_SESSION[MM_Username], "text"));
  mysql_select_db($database_shujuku, $shujuku);
  $search = mysql_query($selectsql,$shujuku) or die(mysql_error());
   $searchflag=mysql_num_rows($search);
 if($_SESSION[MM_Username] != NULL)
 {
	 if( $maipiaoflag[0] !=0)
	 {
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
			if($searchflag)
			{
			 $deleteSQL = sprintf("DELETE FROM tuoluo WHERE usename=%s",
                       GetSQLValueString($_SESSION[MM_Username], "text"));

		  mysql_select_db($database_shujuku, $shujuku);
		  $Result1 = mysql_query($deleteSQL, $shujuku) or die(mysql_error());
		  $insertSQL = sprintf("INSERT INTO tuoluo (usename, shunxu) VALUES (%s, %s)",
							   GetSQLValueString($_SESSION[MM_Username], "text"),
							   GetSQLValueString($_POST['shunxu'], "int"));
		
		  mysql_select_db($database_shujuku, $shujuku);
		  $Result1 = mysql_query($insertSQL, $shujuku) or die(mysql_error());
		  echo "<script>alert('更改预约成功'); location.href='xuanzhuan.php'</script>";
			}
			else
			{
				 $insertSQL = sprintf("INSERT INTO tuoluo (usename, shunxu) VALUES (%s, %s)",
							   GetSQLValueString($_SESSION[MM_Username], "text"),
							   GetSQLValueString($_POST['shunxu'], "int"));
		
		  mysql_select_db($database_shujuku, $shujuku);
		  $Result1 = mysql_query($insertSQL, $shujuku) or die(mysql_error());
		  echo "<script>alert('预约成功'); location.href='xuanzhuan.php'</script>";
			}
		  }
		 }else
		 {
			 echo "<script>alert('请先买票'); </script>";
		 }
 }
 else
 {
	echo "<script>alert('请先登录'); location.href='denglu.php'</script>";
 }

//initialize the session


// ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
	
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>陀螺旋转椅项目</title>

<!-- Bootstrap -->
<link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="http://cdn.static.runoob.com/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.logina-main{position:relative;  width:400px; margin:auto; background:#fff; border-radius:3px; border:1px 
solid #c4c4c4;
padding:20px 20px 20px 20px;}
  
</style>
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
       <li ><a href="HOME.php"><span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span><span class="sr-only">(current)</span></a></li>
        <li ><a href="denglu.php">登录</a></li>
        <li><a href="zhuce.php">注册</a></li>
        
          <li><a href="maipiao.php">买票</a></li>
          
      </ul>
<ul class="nav navbar-nav navbar-right">
    <li>
  <br/>
  <?php
  if($_SESSION['MM_Username'])
  {
    echo ('欢迎会员');
	echo($_SESSION['MM_Username']); 
    }
   ?>
    </li>
    <li><a href="<?php echo $logoutAction ?>">退出</a></li>
    </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
      </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
             <h1 class="text-center">陀螺旋转椅项目</h1>
             <br/>
             <br/>
			<div class="row clearfix ">
				<div class="col-md-6 column">
               <img alt="300*200" src="picture/陀螺旋转椅.jpg" class="img-thumbnail" />
				</div>
				<div class="col-md-6 column">
                <p>前面有<?php echo $numrows; ?>人已预约</p>
                <br/>
                <br/>
                <p>预约顺序</p>
                <br/>
                 <form method="POST" action="<?php echo $editFormAction; ?>" name="form">
                   <input type="radio" name="shunxu" value="1">1
                   <input type="radio" name="shunxu" value="2">2
				   <input type="radio" name="shunxu" value="3">3
                   <input type="radio" name="shunxu" value="4">4
                   <br/>
                   <br/>
			       <input class="btn btn-primary" type="submit" value="预约"/>
                  
                   <br>
                   <input type="hidden" name="MM_insert" value="form">
                  
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>