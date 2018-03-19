<?php   
$emp_no=$_POST['username'];  
$shengfenzheng=$_POST['pass'];  
$access_token=$_POST['access_token']; 
$userid=$_POST['userid']; 
$link = mysqli_connect('yourhost','','','database');  
$query=mysqli_query($link,"insert into wechatqiye(name_id,emp_no)value('$userid','$emp_no')");//找到与输入用户名相同的信息，注意要取出的信息有两项  

if($query){  
$send_url = "https://qyapi.weixin.qq.com/cgi-bin/user/authsucc?access_token=".$access_token."&amp;userid=".$userid."";
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $send_url);
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,FALSE);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,FALSE);
  curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (compatible; MSIE 5.01;Windows NT 5.0)');
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1);
  curl_setopt($ch, CURLOPT_AUTOREFERER,1);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
  $info = curl_exec($ch);
  if(curl_errno($ch)){
   echo 'Errno'.curl_error($ch);
  }
  curl_close($ch);

 print_r($info);
    echo "<script language=JavaScript>alert('驗證成功');</script>";    
        } else {
        echo "<script language=JavaScript>alert('驗證失敗請重新認證');</script>";
       }
?> 