<!DOCTYPE html>
<html lang="en"> 
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $page_title;?></title>

		<meta name="description" content="top menu &amp; navigation" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		 <link rel="icon"  type="image/png" href="<?php echo base_url();?>assets/favicon.ico">
		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />
		<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="<?php echo base_url();?>assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url();?>assets/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/respond.min.js"></script>
		<![endif]-->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script> -->
		<style type="text/css">
			.shadow
			{
				background: white;
				border-radius: 10px;
				padding: 10px;
				margin-bottom:  5px;	
				 box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22);
				width: inherit;
    			display: inline-block;
			}
			
		</style>
		
	</head>

	<body class="skin-1">
		<div id="navbar" class="navbar navbar-default ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-leaf"></i>
							Attendance APP
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="<?php echo base_url();?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Jason
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="#">
										<i class="ace-icon fa fa-cog"></i>
										Settings
									</a>
								</li>

								<li>
									<a href="<?php echo base_url('profile');?>">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo base_url('logout');?>">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar  responsive ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				
<?php
	
function nest_list($array,$flag=TRUE)
{
	if ($flag==TRUE) {
		$flag=FALSE;
		$output= "<ul class='nav nav-list'>";		
	}
	else
	{
		$output= "<ul class='submenu'>";
	}
	if (!empty($array)) {

		
		foreach ($array as $key ) {	
		// 	
			if ($key->active=='YES') {

				$a_link=$key->link=='#'?'#':base_url($key->link);	
			$output.="<li class='hover'> 
						<a href='".$a_link."'>
							<i class='menu-icon fa ".$key->icon."'></i>
							<span class='menu-text'> ".$key->name." </span>
						</a>

						<b class='arrow'></b>";
			
					if (!empty($key->child)) {
										
						$output.= nest_list($key->child,FALSE);
					}
					
			$output.= "</li>";
			}			
		}
	}
	return $output.= "</ul>";
	
}
	echo nest_list($menu_list,TRUE);
 	
?>
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			
			</div>

			<div class="main-content" style="height: 70vh">
				<div class="main-content-inner">
					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn" onclick="window.history.go(-1); return false;" title="GoTo Back">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>							
						</div><!-- /.ace-settings-container -->

						<div class="page-header">
							<h1>
								Home
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									 Dashboard
								</small>
							</h1>
						</div>
						<div style="margin-bottom: 25px;">
						