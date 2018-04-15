<?php require_once('Connections/shujuku.php'); ?>
<?php


// *** Redirect if username exists
$MM_flag="MM_insert";
if (isset($_POST[$MM_flag])) {
 // $MM_dupKeyRedirect="loginfail";
  $loginUsername = $_POST['username'];
  $LoginRS__query = sprintf("SELECT username FROM form1 WHERE username='$loginUsername'");
  mysqli_select_db($shujuku,$database_shujuku);
  $LoginRS=mysqli_query($shujuku,$LoginRS__query) or die(mysql_error());
  $loginFoundUser = mysqli_num_rows($LoginRS);

  //if there is a row in the database, the username was found - can not add the requested username
  if($loginFoundUser){
    $MM_qsChar = "?";
    //append the username to the redirect page
    if (substr_count($MM_dupKeyRedirect,"?") >=1) $MM_qsChar = "&";
    $MM_dupKeyRedirect = $MM_dupKeyRedirect . $MM_qsChar ."requsername=".$loginUsername;
     echo "<script type='text/javascript'>alert('用户名已存在');location='javascript:history.back()';</script>";    //header ("Location: $MM_dupKeyRedirect");
    exit;
  }
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form")) {
  $insertSQL = sprintf("INSERT INTO form1 (username, password, name,maipiao) VALUES (%s, %s, %s,'0')",
                     $_POST['username'],
                     $_POST['password'], 
                     $_POST['name']);

  mysqli_select_db( $shujuku,$database_shujuku);
  $Result1 = mysqli_query($shujuku,$insertSQL);

  $insertGoTo = "denglu.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  echo "<script>alert('注册成功'); location.href='denglu.php'</script>";
 // header(sprintf("Location: %s", $insertGoTo));

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>注册页面</title>
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
	body
	{	
		background:#FDFDFD url(picture/zhuce.jpg) no-repeat fixed bottom;
		background-size:100%;
		
	}
	.container_center
	{
		padding:30px 10px 10px 10px;
		
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
    
    <script type="text/javascript">
function MM_validateForm() { //v4.0
  if (document.getElementById){
    var i,p,q,nm,test,num,min,max,errors='',args=MM_validateForm.arguments;
    for (i=0; i<(args.length-2); i+=3) { test=args[i+2]; val=document.getElementById(args[i]);
      if (val) { nm=val.name; 
	        if(nm == 'username') nm='用户名';
			  if(nm == 'name') nm='姓名';
			    if(nm == 'password') nm='密码';
	    if ((val=val.value)!="") {
         if (test!='R') { num = parseFloat(val);
          if (isNaN(val))errors+='- '+nm+' 必须是输入数字\n';
          if (test.indexOf('inRange') != -1) { p=test.indexOf(':');
            min=test.substring(8,p); max=test.substring(p+1);
            if (num<min || max<num) errors+='- '+nm+' 需要输入数字'+min+' and '+max+'.\n';
      } } } else if (test.charAt(0) == 'R') errors += '- '+nm+' 需要输入\n'; }
    } if (errors) alert('注册时出现错误\n'+errors);
    document.MM_returnValue = (errors == '');
} }
    </script>
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
        <li ><a href="denglu.php">登录</a></li>
        <li class="active"><a href="zhuce.php">注册</a></li>
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
    <h2 class="text-center">新用户注册</h2>
    <br/>
	<div class="row clearfix">
		<div class="col-md-12 column">
	<div class="row clearfix">
		<div class="col-md-12 column">
 
   <form action="<?php echo $editFormAction; ?>" name="form" method="POST" onSubmit="MM_validateForm('username','','RisNum','name','','R','password','','R');return document.MM_returnValue" >
   <div class="row clearfix">
				<div class="col-md-3 column text-center">
                <label>手机号</label>
				</div>
				<div class=" col-md-1 column text-center" >
                <input name="username" type="text" id="username" >
                </div>
              
				
    </div>
    <br/>
     <div class="row clearfix">
				<div class="col-md-3 column text-center">
                <label>姓名</label>
				</div>
				<div class=" col-md-1 column text-center" >
                <input name="name" type="text" id="name" >
                
				</div>
    </div>
      <div class="row clearfix ">
      <br/>
				<div class="col-md-3 column text-center">
                <label>密码</label>
				</div>
				<div class="col-md-1 column ">
                <input name="password" type="password" id="password">
				</div>
    </div>
 	<div class="row clearfix text-center">
		<div class="column">
        <br/>
     <input  class="btn btn-primary" type="submit" name="sub" value="注册">
     </div>
     </div>
 	<input type="hidden" name="MM_insert" value="form">
   </form>
  	</div>
	</div>
  </div>
  		</div>
	</div>
</div>
  


</body>
</html>

