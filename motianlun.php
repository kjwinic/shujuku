
<?php require_once('Connections/shujuku.php'); ?>

<?php
if (!isset($_SESSION)) {
  session_start();
}
 mysqli_select_db($shujuku,$database_shujuku);
 $data= sprintf("SELECT COUNT(*) from motianlun");
 $rs=mysqli_query($shujuku,$data);
 $sum = mysqli_fetch_array($rs);
 $numrows = $sum[0];
 if(!empty($_SESSION['MM_Username']))
 {
   $use=$_SESSION['MM_Username'];
 }
 else $use="";
 $maipiao = sprintf("SELECT maipiao from form1 WHERE username='$use'");
 $flag=mysqli_query($shujuku,$maipiao);
 $maipiaoflag=mysqli_fetch_array($flag);
 $selectsql =  sprintf("SELECT usename from motianlun WHERE usename='$use'");
  mysqli_select_db($shujuku ,$database_shujuku);
  $search = mysqli_query($shujuku,$selectsql);
   $searchflag=mysqli_num_rows($search);
 if($use)
 {
	 if( $maipiaoflag[0] !=0)
	 {
		if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
			if($searchflag)
			{
			 $deleteSQL = sprintf("DELETE FROM motianlun WHERE usename='$use'"
                      );

		  mysqli_select_db($shujuku,$database_shujuku);
		  $Result1 = mysqli_query($shujuku,$deleteSQL);
		  $insertSQL = sprintf("INSERT INTO motianlun (usename, shunxu) VALUES (%s, %s)",
							  $use,
							  $_POST['shunxu']);
		
		  mysqli_select_db($shujuku,$database_shujuku);
		  $Result1 = mysqli_query($shujuku ,$insertSQL);
		  echo "<script>alert('更改预约成功'); location.href='motianlun.php'</script>";
			}
			else
			{
				 $insertSQL = sprintf("INSERT INTO motianlun (usename, shunxu) VALUES (%s, %s)",
							   $_SESSION['MM_Username'],
							   $_POST['shunxu']);
		
		  mysqli_select_db($shujuku,$database_shujuku);
		  $Result1 = mysqli_query($shujuku,$insertSQL);
		  echo "<script>alert('预约成功'); location.href='motianlun.php'</script>";
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
<title>摩天轮项目</title>

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
             <h1 class="text-center">摩天轮项目</h1>
             <br/>
             <br/>
			<div class="row clearfix ">
				<div class="col-md-6 column">
               <img alt="300*200" src="picture/摩天轮.jpg" class="img-thumbnail" />
				</div>
				<div class="col-md-6 column">
                <p>前面有<?php echo $numrows; ?>人已预约</p>
                <br/>
                <br/>
                <p>预约顺序</p>
                <br/>
                 <form method="POST" action="" name="form"><!--<?php echo $editFormAction; ?>-->
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