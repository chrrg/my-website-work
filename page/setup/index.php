<?php
//安装网站！！！！！！
include "../config.php";
?>
<h3>

<?php

    function insert($file,$database,$name,$root,$pwd)//
    {
        //将表导入数据库
        header("Content-type: text/html; charset=utf-8");
        $_sql = file_get_contents($file);
        $_arr = explode("\n", $_sql);
        $_mysqli = new mysqli($name,$root,$pwd);
        if (mysqli_connect_errno()) 
        {
            exit('您能通过浏览器访问到此页说明您的php环境已正常运作！但是数据库环境异常，请检查您的mysql数据库密码是否正确，配置文件在page/config.php内。</h3>');
        }
        else{
            //执行sql语句
            $_mysqli->query('set names utf8;'); //设置编码方式
            foreach ($_arr as $_value) {
				if (trim($_value)=='')continue;
                $_mysqli->query($_value);
				$errr=mysqli_error($_mysqli);
				if ($errr!=''){
					print('<div>'.$_value.'</div><div>最后一次错误信息<span style="color:red;">'.$errr.'</span></div>');
					die;
				}
            }
        }
        $_mysqli->close();
        $_mysqli = null;
    }


    insert("database.sql","",$database_path,$database_username,$database_password);
    //文件名，数据库名字,域名，用户名，密码
?>

恭喜您，数据库尝试自动导入数据，请不要重复刷新执行此页面。<br />
现在<a href="../../">点此进入“继往开来 走向新时代”主题网站</a><br />
如果遇到子页面内容为空，说明数据库导入未成功，请手动到MySQL数据库后台选择database.sql导入即可！

</h3>
