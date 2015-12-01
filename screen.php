
<?php
	if(strpos($_SERVER['HTTP_REFERER'],"labpuyuan.nat123.net")==7)
{
	header("refresh:5;url=http://labpuyuan.nat123.net/index.php?key=1");
	session_start();
	$_SESSION['key']=1;
	$a='sudo fswebcam -d/dev/video0 -r 320x240 /home/wwwroot/default/lot/1.jpg
';
system($a);
echo "please wati 5 seconds";
//header("refresh:5;url:http://sumenpuyuan.imwork.net");
}
	else
{
//	echo $_SERVER['HTTP_'];
	header("location:error.html");
}
?>

