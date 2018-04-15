<?php require_once('Connections/shujuku.php'); ?>
<?php
if (!isset($_SESSION)) {
  session_start();
}


if(!empty($_SESSION['MM_Username']))
{
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}
$user=$_SESSION['MM_Username'];
  $updateSQL = sprintf("UPDATE form1 SET maipiao=1 WHERE username='$user'");

  mysqli_select_db($shujuku,$database_shujuku);
  $Result1 = mysqli_query($shujuku,$updateSQL);
 echo "<script>alert('买票成功');location.href='welcome.php'</script>";
}
else
{
echo "<script>alert('请先登录'); location.href='denglu.php'</script>";
}
?>

 
