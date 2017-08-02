<?php 
  include "include/init.php";
  include "include/page/page.php";

  if($_POST){
    foreach($_POST['check'] as $key=>$val){
      $sql = "SELECT * FROM wd_service WHERE ser_id = $val";
      $service = sql_fn($sql);
      // echo "<pre>";
      // print_r($service);
      // exit;

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

      $sql = "DELETE FROM wd_service WHERE ser_id=$val";
      mysql_query($sql);
    }
    if(mysql_affected_rows()){
        alert("删除成功!","service_list.php");
    }
  }
  
  $current = isset($_GET['page'])?$_GET['page']:1;
  $count = "SELECT COUNT(ser_id) as count FROM wd_service";
  $strint = mysql_query($count);
  if($strint){
    $counts = mysql_fetch_assoc($strint);
  }
  $count = $counts['count'];
  // echo $count;
  $limit = 3;
  $size = 3;
  $strpage = ($current-1)*$limit;
  $page = page($current,$count,$limit,$size);
  // exit;


  $sql = "SELECT * FROM wd_service ORDER BY ser_id ASC LIMIT $strpage,$limit";
  $services = sql_fn($sql);
  // print_r($nav);
  //缩略图
  // $sql = "SELECT * FROM wd_banner";
  // $ban = sql_fn($sql);
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
  <link rel="stylesheet" href="include/page/css.css">
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
  <div class="pull-left"> <a class="navbar-brand" href="index.php">
    <div class="navbar-logo"><img src="images/logo.png" alt="logo"></div>
    </a> </div>
  <div class="pull-right header-btns">
    <a class="user"><span class="glyphicons glyphicon-user"></span> admin</a>
    <a href="login.php" class="btn btn-default btn-gradient" type="button"><span class="glyphicons glyphicon-log-out"></span> 退出</a>
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
        <li class="active">广告管理</li>
      </ol>
    </div>
    <div class="container">

	 <div class="row">
        <div class="col-md-12">
			<div class="panel">
                <div class="panel-heading">
                  <div class="panel-title">案例列表</div>
                  <a href="service_add.php" class="btn btn-info btn-gradient pull-right"><span class="glyphicons glyphicon-plus"></span> 添加缩略图</a>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                <div class="panel-body">
                  <h2 class="panel-body-title">案例</h2>
                  <table class="table table-striped table-bordered table-hover dataTable">
                      <tr class="active">
                        <th class="text-center" width="100"><input type="checkbox" value="" id="checkall" class=""> 全选</th>
                        <th>标题</th>
                        <th>缩略图1</th>
                        <th>缩略图2</th>
                        <th width="200">操作</th>
                      </tr>
                      <?php foreach($services as $val){ ?>
                    	<tr class="success">
                        <td class="text-center"><input type="checkbox" value="<?php echo $val['ser_id'] ?>" name="check[]" class="cbox"></td>
                        <td><?php echo $val['ser_title'] ?></td>
                        <td><img src="<?php echo THUPATH.$val['ser_thum1'] ?>" alt=""></td>
                        <td><img src="<?php echo THUPATH.$val['ser_thum2'] ?>" alt=""></td>
                        <td>
		                      <div class="btn-group">
		                        <a href="service_edit.php?id=<?php echo $val['ser_id'] ?>" class="btn btn-default btn-gradient"><span class="glyphicons glyphicon-pencil"></span></a>
		                        <a onclick="return confirm('确定要删除吗？')" href="service_del.php?did=<?php echo $val['ser_id'] ?>" class="btn btn-default btn-gradient dropdown-toggle"><span class="glyphicons glyphicon-trash"></span></a>
		                      </div>
                        </td>
                      </tr>
                      <?php } ?>
                  </table>
                  
                  <div class="pull-left">
                  	<button type="submit" class="btn btn-default btn-gradient pull-right delall"><span class="glyphicons glyphicon-trash"></span></button>
                  </div>
                  
                  <div class="pull-right">
                    <ul class="pagination" id="paginator-example">
                      <?php echo $page; ?>
                    </ul>
                  </div>
                </div>
                </form>
              </div>
          </div>
        </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
</body>
</html>