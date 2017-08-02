<?php 
    include "include/init.php";

    //修改导航
    if($_GET){
        $up_id = $_GET['id'];
        $sql = "SELECT * FROM wd_service WHERE ser_id=$up_id";
        $service = getArr($sql);

    }
    if($_POST){
        $link1 = @$service['ser_img1'];
        $link2 = @$service['ser_img2'];
        $thuimg1 = @$service['ser_thum1'];
        $thuimg2 = @$service['ser_thum2'];
        // echo $thuimg;
        // exit;
        $name = 'upload';
        $deldir1 = PATH.$name.'/'.$link1;
        $deldir2 = PATH.$name.'/'.$link2;
        $thudir1 = THU.$thuimg1;
        $thudir2 = THU.$thuimg2;
        // echo $deldir;
        // exit;
        @unlink($deldir1);    //删除本地图片
        @unlink($deldir2);    //删除本地图片
        @unlink($thudir1);
        @unlink($thudir2);

        // $sqld = "DELETE FROM wd_case WHERE case_id=$up_id";
        // mysql_query($sqld);

        $url = PATH.$name;
        $upload = array();
        $arr=array();
        $upload = more_upload($arr,$name,$url,$size='1048576',$type=array('jpg','jpeg','png','gif'));
        // print_r($upload);
        // exit;
        $i=1;
        $thu = array();
        foreach($upload as $key=>$val){
	        $img = $url.'/'.$upload[$key]['filename'];
	        $imginfo = getimagesize($img);
	        $son_width = 150;
	        $son_height = $imginfo[1]*$son_width/$imginfo[0];
	        $uri = THU;
	        $thumdpath = ltrim(strrchr($upload[$key]['filename'],'/'),'/');
	        $thumd = thumd_img($img,$son_width,$son_height,$uri,$thumdpath);
	        // print_r($upload);
	        // echo $thumd;
	        // exit;
	        $thu[] = $thumd;
	        $ser_img = $upload[$key]['filename'];
	        $ser_title = $_POST['link'];
	        if($i==1){
	        	$ser_img1 = $ser_img;
	        }else{
	        	$ser_img2 = $ser_img;
	        }
	        $i++;
		}
        // $sql = "INSERT INTO wd_case(case_id,case_img,case_title,case_thum) VALUES('$up_id','$case_img','$case_title','$case_thum')";
        $sql = "UPDATE wd_service SET ser_img1='$ser_img1',ser_img2='$ser_img2',ser_title='$ser_title',ser_thum1='$thu[0]',ser_thum2='$thu[1]' WHERE ser_id=$up_id";
        mysql_query($sql);
        alert("修改成功!","service_list.php");
    }

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <title>CMS内容管理系统</title>
    <meta name="keywords" content="Admin">
    <meta name="description" content="Admin">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Core CSS  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="css/glyphicons.min.css">

    <!-- Theme CSS -->
    <link rel="stylesheet" type="text/css" href="css/theme.css">
    <link rel="stylesheet" type="text/css" href="css/pages.css">
    <link rel="stylesheet" type="text/css" href="css/plugins.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.css">

    <!-- Boxed-Layout CSS -->
    <link rel="stylesheet" type="text/css" href="css/boxed.css">

    <!-- Demonstration CSS -->
    <link rel="stylesheet" type="text/css" href="css/demo.css">

    <!-- Your Custom CSS -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- Core Javascript - via CDN -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/uniform.min.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
</head>

<body>
<!-- Start: Header -->
<header class="navbar navbar-fixed-top" style="background-image: none; background-color: rgb(240, 240, 240);">
    <div class="pull-left"><a class="navbar-brand" href="index.php">
        <div class="navbar-logo"><img src="images/logo.png" alt="logo"></div>
    </a></div>
    <div class="pull-right header-btns">
        <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
        <a href="login.php" class="btn btn-default btn-gradient" type="button"><span
                class="glyphicons glyphicon-log-out"></span> 退出</a>
    </div>
</header>
<!-- End: Header -->

<!-- Start: Main -->
<div id="main">
    <!-- Start: Sidebar -->
    <aside id="sidebar" class="affix">
    <div id="sidebar-search">
        <div class="sidebar-toggle"><span class="glyphicon glyphicon-resize-horizontal"></span></div>
    </div>
    <div id="sidebar-menu">
      <ul class="nav sidebar-nav">
        <li>
          <a href="index.php"><span class="glyphicons glyphicon-home"></span><span class="sidebar-title">后台首页</span></a>
        </li>
        <li><a href="nav_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">导航管理</span></a>
        </li>
        <li><a href="banner_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">广告管理</span></a>
        </li>
        <li class="active"><a href="service_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">服务管理</span></a>
        </li>
        <li><a href="case_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">案例管理</span></a>
        </li>
        <li>
          <a href="news_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">资讯管理</span></a>
        </li>
        <li><a href="part_list.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">合作伙伴</span></a>
        </li>
        <li>
          <a href="user.php"><span class="glyphicons glyphicon-list"></span><span class="sidebar-title">系统管理员</span></a>
        </li>
      </ul>
    </div>
  </aside>
    <!-- End: Sidebar -->
    <!-- Start: Content -->
    <section id="content">
        <div id="topbar" class="affix">
            <ol class="breadcrumb">
                <li><a href="index.php"><span class="glyphicon glyphicon-home"></span></a></li>
                <li class="active">修改图片</li>
            </ol>
        </div>
        <div class="container">

            <div class="row">
                <div class="col-md-10 col-lg-8 center-column">
                    <form action="" method="post" class="cmxform" enctype="multipart/form-data">
                        <div class="panel">
                            <div class="panel-heading">
                                <div class="panel-title">编辑缩略图</div>
                                <div class="panel-btns pull-right margin-left">
                                    <a href="service_list.php"
                                       class="btn btn-default btn-gradient dropdown-toggle"><span
                                            class="glyphicon glyphicon-chevron-left"></span></a>
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">标题</span>
                                            <input type="text" name="link" value="<?php echo $service['ser_title']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">原缩略图</span>
                                            <img src="<?php echo THUPATH.$service['ser_thum1']; ?>" alt="">
                                            <img src="<?php echo THUPATH.$service['ser_thum2']; ?>" alt="">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group"><span class="input-group-addon">图片</span>
                                            <input type="file" name="upload[]" value="" class="form-control" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input type="submit" value="提交" class="submit btn btn-blue">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </section>
    <!-- End: Content -->
</div>
<!-- End: Main -->
<link type="text/css" rel="stylesheet" href="umeditor/themes/default/_css/umeditor.css">
<script src="umeditor/umeditor.config.js" type="text/javascript"></script>
<script src="umeditor/editor_api.js" type="text/javascript"></script>
<script src="umeditor/lang/zh-cn/zh-cn.js" type="text/javascript"></script>
<script type="text/javascript">
    var ue = UM.getEditor('myEditor', {
        autoClearinitialContent: true,
        wordCount: false,
        elementPathEnabled: false,
        initialFrameHeight: 300
    });
</script>
</body>

</html>