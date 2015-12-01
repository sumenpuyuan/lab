<?php
        if(isset($_SERVER['HTTP_REFERER']))
        {
                if(strpos($_SERVER['HTTP_REFERER'],'lab.52nongda.com/DynamicModules/RegisterAndLogin')==7 || strpos($_SERVER['HTTP_REFERER'],"labpuyuan.nat123.net")==7)
                {

                }
                else
                {
                        header("location:error.html");
                        exit();
                }
        }
?>
<html>
<body>
<h2>欢迎实验室同学访问</h2>
<img src="lot/1.jpg"><br><br>
<a href="screen.php">refresh catch img</a>
</body>
</html>