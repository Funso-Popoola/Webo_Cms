<?php
require 'admin/dbQuery.php';
$m = new dbQuery();
$admin = "";
$showAdmin = false;
if(isset($_GET['admin'])){
	$showAdmin = true;
	$admin = "?admin";
}
$array = $m->loadPaginator('research');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Research</title>
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
					<h2>RESEARCH</h2>
				</div>
				</p>
				<div class='row'>
					<div class='col-lg-12'>
						<div class='panel panel-default' style="display:<?php echo $m->getVisibility('papers'); ?>;">
							<div class='panel-heading'>Papers</div>
							<div class='panel-body'>
								<p>Researches have been carried out by various members of Staff and some Outstanding students...The department
								takes Pride in listing them with their Appropriate Papers in the Alphabetical order of Paper Titles. You can also download the Papers if you are so interested..</p>
								<p><div id ='papers' class='panel-body paginator'></div>
									<div id = 'papers' class='control'></div></p>
							</div>
						</div>
						<div class='panel panel-default' style="display:<?php echo $m->getVisibility('proj_and_pubs'); ?>;">
							<div class='panel-heading'>Projects and Publications</div>
							<div class='panel-body'>
								<p>Publications in the Department have increased rapidly over the years...</p>
								<p><div id ='proj_and_pubs' class='panel-body paginator'></div>
								<div id = 'proj_and_pubs' class='control'></div></p>
							</div>
						</div>
					</div>
				</div>
				<div class='row'>
					<div class='col-lg-6'>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('labs'); ?>;">
							<div class='panel-heading'>Laboratory</div>
							<div class='panel-body'>
								<div class='panel-body'>
									<p>The laboratories that took place in the department in recent times includes....</p>
									<p><div id ='labs' class='panel-body paginator'></div>
									<div id = 'labs' class='control'></div></p>
								</div>
							</div>
						</div>
					</div>
					<div class='col-lg-6'>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('conferences'); ?>;">
							<div class='panel-heading'>Conferences</div>
							<div class='panel-body'>
								<div class='panel-body'>
									<!-- <p><div id ='conf' class='panel-body paginator'></div>
									<div id = 'conf' class='control'></div></p> -->
									<?php $m->getResearch('Conference'); ?>
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
			var papers = new Paginator('papers',[4,'tr']);
			var pnp = new Paginator('proj_and_pubs',[2,'tr']);
			var labs = new Paginator('labs',[3,'tr']);
			var conf = new Paginator('conf',[3,'tr']);
			$(document).ready(function(){
				loadCon('<?php echo $array ?>','research');
				papers.init();
				pnp.init();
				labs.init();
				conf.init();
				rearrange();
			});
		</script>
	</body>
</html>