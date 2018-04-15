<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

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
<title>欢迎页面</title>

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
       <li class="active"><a href="HOME.php"><span class="glyphicon glyphicon-home" aria-hidden="true"> HOME</span><span class="sr-only">(current)</span></a></li> 
        <li ><a href="denglu.php">登录</a></li>
        <li><a href="zhuce.php">注册</a></li>
         <li><a href="maipiao.php">买票</a></li>
      </ul>
      
<ul class="nav navbar-nav navbar-right">


  <li>
  <br/>
    欢迎会员 <?php echo ($_SESSION['MM_Username']); ?></li>
    <li>
    <a href="<?php echo $logoutAction ?>">退出</a></li>
    </ul>
    </div>
    <!-- /.navbar-collapse --> 
  </div>
  <!-- /.container-fluid --> 
</nav>
<div class="container">
<div class="row clearfix">
<div class ="col-md-12 column">
<h1 class="text-center">游乐园项目</h1>
</div>
</div>

	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="row">
				<div class="col-md-6">
					<div class="thumbnail">
						<img alt="300x200" src="picture/摩天轮.jpg" />
						<div class="caption">
							<h3>
								摩天轮
							</h3>
							<p>
								
摩天轮是一种大型转轮状的机械建筑设施，上面挂在轮边缘的是供乘客乘搭的座舱（Gondola）。乘客坐在摩天轮慢慢的往上转，可以从高处俯瞰四周景色。最常见的摩天轮存在的场合是游乐园（或主题公园）与园游会，作为一种游乐场机动游戏，与云霄飞车、旋转木马合称是“乐园三宝”。但摩天轮也经常单独存在于其他的场合，通常作为活动的观景台使用。
							</p>
							<p>
								 <a class="btn btn-primary" href="motianlun.php" >预约</a> 
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<img alt="300x200" src="picture/陀螺旋转椅.jpg" />
						<div class="caption">
							<h3>
								陀螺旋转椅
							</h3>
							<p>
								
陀螺旋转椅，又名旋风旋转椅，该椅子完全摆脱了传统座椅四平八稳的模式，它没有就坐的固定方向，但只要坐进这个酷似大陀螺的椅子，就可以360度随心所欲地旋转。
							</p>
							<p>
								 <a class="btn btn-primary" href="xuanzhuan.php" >预约</a> 
							</p>
						</div>
					</div>
				</div>
                </div>
				<div class="row">
				<div class="col-md-6">
					<div class="thumbnail">
						<img alt="300x200" src="picture/过山车.jpg" />
						<div class="caption">
							<h3>
								过山车
							</h3>
							<p>
				过山车（Roller coaster，或又称为云霄飞车），是一种机动游乐设施，常见于游乐园和主题乐园中。拉马库斯·阿德纳·汤普森（LaMarcus Adna Thompson）是第一个注册过山车相关专利技术的人（1885年1月20日），并曾制造过数10个过山车设施，因此被誉称为“重力之父”（Father of Gravity）。过山车虽然惊悚恐怖，但是基本上是非常安全的设施。
							</p>
							<p>
								<a class="btn btn-primary" href="guoshanche.php" >预约</a> 
							</p>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="thumbnail">
						<img alt="300x200" src="picture/旋转木马.jpeg" />
						<div class="caption">
							<h3>
								旋转木马
							</h3>
							<p>					
旋转木马或回转木马游乐场机动游戏的一种，即旋转大平台上有装饰成木马且上下移动的座位供游客乘坐。最早记录的旋转木马出现于拜占庭帝国时期。约1860年欧洲出现第一个以蒸汽推动的旋转。
							</p>
							<p>
								<a class="btn btn-primary" href="xuanzhuanmuma.php" >预约</a> 
							</p>
						</div>
					</div>
				</div>
          </div>
          </div>
          </div>
 </div>
</body>
</html>
