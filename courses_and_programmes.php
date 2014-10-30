<?php
require 'admin/dbQuery.php';
$m = new dbQuery();
$admin="";
$showAdmin = false;
if(isset($_GET['admin'])){
	$showAdmin = true;
	$admin = '?admin';
}
$array = $m->loadPaginator('courses');
//$array = str_replace('t','',stripslashes(json_encode(json_decode($array))));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Courses</title>
		<link href="css/s.css" rel="stylesheet" type="text/css" />
		<link href="css/boots.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div id="wrapper">
		<p>
			<div class='container'>
				<div class="navbar navbar">
					<div class='row' style='padding:5px;'>
						<div class='col-lg-2'>
							<span class='left'><img src="images/logo.png" alt="Webo CMS" title="Webo CMS" border="0" align="left" class='img' /></span>
						</div>
						<div class='left col-lg-9'>
							<div class='center'><h3><center><?php $m->getLayout('dept_name'); ?></center></h3><h4><center> OBAFEMI AWOLOWO UNIVERSITY</center></h4><h5><center> ILE-IFE, OSUN STATE, NIGERIA</center></h5></div>
						</div>   	
		            </div>
		              <div class="navbar-collapse">
		              <?php
			              		if($showAdmin){
			              			echo "<ul class='nav navbar-nav navbar-left'>";
			              			echo "<li><a href='admin/settings.php'>Back to Settings</a></li>";
			              			echo "</ul>";
			              		}
			              	?>
		                <?php $m->getPages($admin);?>
		              </div>
	            </div>
				<!-- END NAV -->
				<p>
				<div class='jumbotron'>
					<h2>Courses</h2>
				</div>
				</p>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='panel panel-default'>
							<div class='panel-heading'>Undergraduate:</div>
							<div class='panel-body'>
								<!-- <div id='courses' class='list-group paginator'></div>
								<div id = 'courses' class='control'></div> -->
								<?php $m->getCourses('underg') ?>
							</div>
						</div>
					</div>
				</div>
			</div><!--End of Container-->
			</p>
			<div class='push'></div>
		</div><!-- close wrapper -->
		<div class="footer">
	      <div class="container">
	      	<p class="text-muted"><?php $m->getLayout('dept_name'); ?> &copy; 2014</p>
	      </div>
	    </div>
		<!-- close footer -->
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
		<script src="js/paginator.js" type="text/javascript"></script>
		<script type="text/javascript">
			var courses = new Paginator('courses',[2,'tr']);
			$(document).ready(function(){
				loadCon('<?php echo $array ?>','courses');
				courses.init();
			});
		</script>
	</body>
</html>
				