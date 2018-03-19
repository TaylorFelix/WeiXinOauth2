<?php
define("CORPID","");  //企业微信上的设置中的找到这个参数
define("CORPSECRET","");  //企业微信上的设置-权限管理-应用权限开发者凭据找这个参数
$token_access_url = "https://qyapi.weixin.qq.com/cgi-bin/gettoken?corpid=".CORPID."&amp;corpsecret=".CORPSECRET;

$res = file_get_contents($token_access_url);
$arr_result = json_decode($res,true);

define("ACCESS_TOKEN",$arr_result['access_token']);
define("CODE", $_GET['code']);
define("state",$_GET['state']); 
$make_menu_url = "https://qyapi.weixin.qq.com/cgi-bin/user/getuserinfo?access_token=".ACCESS_TOKEN."&amp;code=".CODE."&amp;agentid=0";
$res2 = file_get_contents($make_menu_url);
$arr_result2 = json_decode($res2,true);
define("USERID", $arr_result2['UserId']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
 <meta charset="UTF-8">  
    <title>人员信息验证</title>
</head>
<body>
<div class="wrapper">  
         <div class="container">  
         <h1>人员信息验证</h1>  
         <FORM name="submit"  action="index.php" method="POST">
         <div class="enter">
         <input type="text" placeholder="工号" name='username'>  
         <input type="password" placeholder="身份证号" name='pass'>  
         <input type="hidden" value= <?php echo ACCESS_TOKEN; ?> placeholder="access_token" name='access_token'>  
         <input type="hidden" value=  <?php echo USERID; ?> placeholder="userid" name='userid'>  
         <input type="submit" value="确认" name="Submit" class="btn_submit">
         </div>
         </FORM>
</div>
</body>
</html>