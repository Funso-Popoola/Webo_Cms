<?php
require 'admin/dbQuery.php';
$m = new dbQuery();
$admin="";
$showAdmin = false;
if(isset($_GET['admin'])){
	$showAdmin = true;
	$admin = '?admin';
}
$array = $m->loadPaginator('news');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>News</title>
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
	            </div><!-- END NAV -->
				<p>
				<div class='jumbotron'>
					<h2>NEWS</h2>
				</div>
				</p>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='panel panel-default' style="display:<?php echo $m->getVisibility('in_the_media'); ?>;">
							<div class='panel-heading'>In The Media:</div>
							<div class='panel-body'>
								<?php $m->getNews('In_The_Media'); ?>
								<!-- <div id='in_the_media' class='list-group paginator'></div>
								<div id = 'in_the_media' class='control'></div> -->
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-6'>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('announcements'); ?>;" >
							<div class='panel-heading'>Announcements</div>
							<div class='panel-body'>
								<?php $m->getNews('Announcement'); ?>
								<!-- <div id='announcements' class='list-group paginator'></div>
								<div id = 'announcements' class='control'></div> -->
							</div>
						</div>
					</div>
					<div class='col-lg-6'>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('pub_seminars'); ?>;">
							<div class='panel-heading'>Public Seminars</div>
							<div class='panel-body'>
								<div class='panel-body'>
									<?php $m->getNews('Seminars'); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='panel panel-default'>
							<div class='panel-heading'>Calender/Time Table</div>
							<div class='panel-body'>
								<div class='panel-body'>
									<div id='tTime'><p><?php $m->getTimeTable();?></p></div>
								</div>
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
		<script src="js/rearrange.js" type="text/javascript"></script>
		<script type="text/javascript">
			var announcements = new Paginator('announcements',[1,'a']);
			var in_the_media = new Paginator('in_the_media',[3,'a']);
			$(document).ready(function(){
				loadCon('<?php echo $array ?>','news');
				in_the_media.init();
				announcements.init();
				/*stud_group.showPage(0,1);
				alumni.showPage(0,1);*/
				rearrange();
				$('#tTime').find('table').addClass('table table-striped table-bordered table-condensed');
			});
		</script>
	</body>
</html>