<?php
require 'admin/dbQuery.php';
$m = new dbQuery();
$showAdmin = false;
$admin = "";
if(isset($_GET['admin'])){
	$showAdmin = true;
	$admin = '?admin';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Home</title>
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
					<h2>HOME</h2>
				</div>
				</p>
				<p>
				<div id="myCarousel" class="carousel slide" data-ride="carousel">
				    <!-- Carousel indicators -->
				    <ol class="carousel-indicators">
				        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				        <li data-target="#myCarousel" data-slide-to="1"></li>
				        <li data-target="#myCarousel" data-slide-to="2"></li>
				        <li data-target="#myCarousel" data-slide-to="3"></li>
				    </ol>   
				    <!-- Carousel items -->
				    <div class="carousel-inner">
				        <div class="active item">
				            <div style="margin:0 auto"><img src="images/<?php echo $m->getImage('slider1');?>" class="img" height="300px"/></div>
				            <div class="carousel-caption">
				              <!--<h3>First slide label</h3>
				              <p>Lorem ipsum dolor sit amet consectetur…</p>-->
				            </div>
				        </div>
				        <div class="item">
				            <div style="margin:0 auto"><img src="images/<?php echo $m->getImage('slider2');?>" class="img" height='300px'/></div>
				            <div class="carousel-caption">
				              <!--<h3>Second slide label</h3>
				              <p>Aliquam sit amet gravida nibh, facilisis gravida…</p>-->
				            </div>
				        </div>
				        <div class="item">
				            <div style="margin:0 auto"><img src="images/<?php echo $m->getImage('slider3');?>" class="img" height='300px'/></div>
				            <div class="carousel-caption">
				              <!--<h3>Third slide label</h3>
				              <p>Praesent commodo cursus magna vel…</p>-->
				            </div>
				        </div>
				        <div class="item">
				            <div style="margin:0 auto"><img src="images/<?php echo $m->getImage('slider4');?>" class="img" height='300px'/></div>
				            <div class="carousel-caption">
				              <!--<h3>Third slide label</h3>
				              <p>Praesent commodo cursus magna vel…</p>-->
				            </div>
				        </div>
				    </div>
				    <!-- Carousel nav -->
				    <a class="carousel-control left" href="#myCarousel" data-slide="prev">
				        <span class="left"><h3><b>&lt;</b></h3></span>
				    </a>
				    <a class="carousel-control right" href="#myCarousel" data-slide="next">
				        <span class="right"><h3><b>&gt;</b></h3></span>
				    </a>
				</div><!--End of carousel-->
				</p>
				<div class='row'>
					<div class='col-lg-6'>
						<div class='a panel panel-default'>
							<div class='panel-heading'>HOD's Corner</div>
							<div class='panel-body'>
								<img src="images/<?php echo $m->getImage('HODs_corner'); ?>"align="left" hspace="10px" height="150px" width="150px" class='img-thumbnail' />
								<div class='expandable'><k align="justify"><?php $m->getAbout('HODs_corner'); ?></k></div>
							</div>
						</div>
						
					</div>
					<div class='col-lg-6'>
						<div class='a panel panel-default'style="display:<?php echo $m->getVisibility('mission'); ?>;">
							<div class='panel-heading'>Mission</div>
							<div class='panel-body'><p><?php $m->getAbout('mission'); ?></p></div>
						</div>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('vision'); ?>;">
							<div class='panel-heading'>Vision</div>
							<div class='panel-body'><p><?php $m->getAbout('vision'); ?></p></div>
						</div>
						<div class='a panel panel-default' style="display:<?php echo $m->getVisibility('l_news'); ?>;">
							<div class='panel-heading'>Latest News</div>
							<div class='panel-body'>
								<div class='list-group'>
									<a href='#' class='list-group-item'>
										<h4 class='list-group-item-heading'>Resumption</h4>
										<p class='list-group-item-text'>
											Freshers are to resume on the 1st of July for the 2013/2014 School Session...
										</p>
									</a>
									<a href='#' class='list-group-item'>
										<h4 class='list-group-item-heading'>#OAUSAYSNO</h4>
										<p class='list-group-item-text'>
											OAU Students protest over the recent hike in school fees...
										</p>
									</a>
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
		<script src='js/jquery.expander.js' type="text/javascript"></script>
		<script src='js/custom.js' type="text/javascript"></script>
		<script src="js/rearrange.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				rearrange();
			});
		</script
	</body>
</html>