<?php
require 'dbQuery.php';
$m = new dbQuery();
$array = $m->loadCon();

//make sure user is logged in, function will redirect use if not logged in
login_required();

//if logout has been clicked run the logout function which will destroy any active sessions and redirect to the login page
if(isset($_GET['logout'])){
    logout();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Settings</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="../js/jquery.min.js"></script>
  <link href="../css/boots.css" rel="stylesheet"/>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/config.js"></script>
  <script src="../js/jquery.form.js"></script>
  <script src="../js/jquery.redirect.js"></script>
  <link href="../css/style.css" rel="stylesheet"/>
  <script src = "ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class='wrapper'>
    <!-- the  container for the whole body content starts-->
        <p>
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                </button>
                <a href="#" class="navbar-brand">Settings</a>
                <div class="collapse navbar-collapse"/>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="../index.php?admin">View Website</a></li>
                        <li><a href="help.html">Help</a></li>
                        <li><a href="<?php echo config::DIRADMIN.'settings.php';?>?logout">Logout</a></li>
                    </ul>
                </div>
            </div>
          </div>
          <div class="container">
            <!-- the  settings(all) starts-->
                <div class="hero-unit">
                <!-- the  banner starts-->
                    <div class="banner">
                        
                    </div> <!-- end of banner-->
                    <hr/>
                    <div class="row">
                        <!-- the row content goes in here-->
                        <div class="col-sm-3">
                            <!-- the navigation bar goes in here-->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#general" data-toggle="tab">General</a></li>
                                <li><a href="#home" data-toggle="tab">Home</a></li>
                                <li><a href="#news_events" data-toggle="tab">News And Events</a></li>
                                <li><a href="#resrch" data-toggle="tab">Research</a></li>
                                <li><a href="#res" data-toggle="tab">Resource</a></li>
                                <li><a href="#cos_and_prog" data-toggle="tab">Courses and Programmes</a></li>
                                <li><a href="#pple" data-toggle="tab">People</a></li>
                                <li><a href="#timetable" data-toggle="tab">Timetable</a></li>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                            </ul>
                        </div><!-- col ; end of navigation bar-->
                    <div class="col-sm-9">
                        <!-- the  content of all tabs-->
                        <div class="tab-content">
                            <!-- tab contents proper-->
                            <div class="tab-pane active" id="general">
                                <!-- the content of general tab-->   
                                <h1>General</h1>
                                <form id='general_form'role ='form' enctype="multipart/form-data" method="POST" action="dbEntry.php">
                                    <div id="general_accordion" class="accordion">
                                    <!-- the general accordion-->
                                        <div class="accordion-group">
                                            <!-- the  layout in general settings-->
                                            <div class="accordion-heading">
                                                <a href="#generalCollapse" data-parent="#general_accordion" data-toggle="collapse" class="accordion-toggle">Layout</a>
                                            </div> <!-- end accordion heading-->
                                            <div class="accordion-body collapse in" id="generalCollapse">
                                                <div class="accordion-inner">
                                                <!--<form role='form' id="general_">-->
                                                    <div class='form-group'>
                                                        <label for='dept_name'>Department:</label>
                                                        <input class="form-control" type="text" name="dept_name" value="<?php echo $m->getLayout('dept_name'); ?>">
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for="Columns">Columns</label>
                                                        <div>
                                                           <label class="checkbox-inline">
                                                              <input type="radio" name="column_num" value="2" <?php echo($m->getTheme('theme') =='2' ? ' checked' : ''); ?>/>2 column
                                                           </label>
                                                           <label class="checkbox-inline">
                                                              <input type="radio" name="column_num" value="3" <?php echo($m->getTheme('theme') =='3' ? ' checked' : ''); ?>/>3 column
                                                           </label>
                                                        </div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label>Primary Colour:
                                                            <input id="color" type="color" name="primary_color" value="<?php $m->getLayout('pri_color'); ?>">
                                                        </label>
                                                        <label>Secondary Colour:
                                                            <input type="color" name="second_color" value="<?php $m->getLayout('sec_color'); ?>">
                                                        </label>
                                                        <label>Tertiary Colour:
                                                            <input type="color" name="tertiary_color" value="<?php $m->getLayout('ter_color'); ?>">
                                                        </label>
                                                    </div>
                                                <!--</form>-->
                                                </div> <!-- end of accordion-inner -->
                                            </div> <!-- end of accordion-body collapse-->
                                        </div><!-- end of accordion-group -->
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#imageCollapse" data-parent="#general_accordion" data-toggle="collapse" class="accordion-toggle">Image Upload</a>
                                            </div>
                                            <div class="accordion-body collapse" id="imageCollapse">
                                                <div class="accordion-inner">
                                                <!--<form role='form'>-->
                                                    <div class="form-group">
                                                        <label>Slider Image 1:
                                                            <input type="file" name="slider1" value="<?php $m->getImage('HODs_corner'); ?>" />
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slider Image 2:
                                                            <input type="file" name="slider2" value="<?php $m->getImage('HODs_corner'); ?>" />
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slider Image 3:
                                                            <input type="file" name="slider3" value="<?php $m->getImage('HODs_corner'); ?>" />
                                                        </label>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Slider Image 4:
                                                            <input type="file" name="slider4" value="<?php $m->getImage('HODs_corner'); ?>" />
                                                        </label>
                                                    </div>
                                                <!--</form>-->
                                                </div><!-- end of accordion-inner-->
                                            </div><!-- end of accordion-body collapse-->
                                        </div><!-- end of accordion-group-->
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#visCollapse" data-parent="#general_accordion" data-toggle="collapse" class="accordion-toggle">Visibility</a>
                                            </div>
                                            <div class="accordion-body collapse" id="visCollapse">
                                                <div class="accordion-inner">
                                                <!--<form role='form'>-->
                                                    <div class='form-group'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <h4>News and Events<span style='float:right;'><input id='News_and_Events' checked name='News_and_Events' class='chk' type='checkbox' style='-webkit-transform:scale(1.5,1.5);margin-right:20px;'/></span></h4>
                                                            </div>
                                                            <div class='panel-body'>
                                                                <div>
                                                                    <label class='checkbox-inline'>In the Media<input type='checkbox' checked id= 'in_the_media' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Announcements<input type='checkbox' checked id= 'announcements' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Public Lectures and Seminars<input type='checkbox' checked id= 'pub_seminars' class='sub_chk'/></label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <h4>Research<span style='float:right;'><input id='Research' checked class='chk' name='Research' type='checkbox' style='-webkit-transform:scale(1.5,1.5);margin-right:20px;'/></span></h4>
                                                            </div>
                                                            <div class='panel-body'>
                                                                <div>
                                                                    <label class='checkbox-inline'>Labs<input type='checkbox' checked id= 'labs' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Papers<input type='checkbox' checked id= 'papers' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Projects/Publications<input type='checkbox' checked id='proj_and_pubs' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Conferences<input type='checkbox' checked id='conferences' class='sub_chk'/></label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <h4>Resources<span style='float:right;'><input id='Resources' checked class='chk' name='Resources' type='checkbox' style='-webkit-transform:scale(1.5,1.5);margin-right:20px;'/></span></h4>
                                                            </div>
                                                            <div class='panel-body'>
                                                                <div>
                                                                    <label class='checkbox-inline'>Course Notes<input type='checkbox' checked id='res_cos_notes' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Assignments<input type='checkbox' checked id='res_assignments' class='sub_chk'/></label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <h4>People<span style='float:right;'><input id='People' class='chk' checked name='People' type='checkbox' style='-webkit-transform:scale(1.5,1.5);margin-right:20px;'/></span></h4>
                                                            </div>
                                                            <div class='panel-body'>
                                                                <div>
                                                                    <label class='checkbox-inline'>Alumni<input type='checkbox' checked id='alumni' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Student Groups<input type='checkbox' checked id='stud_group' class='sub_chk'/></label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='panel panel-default'>
                                                            <div class='panel-heading'>
                                                                <h4>Others</h4>
                                                            </div>
                                                            <div class='panel-body'>
                                                                <div>
                                                                    <label class='checkbox-inline'>Mission<input type='checkbox'checked id='mission' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Vision<input type='checkbox' checked id='vision' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Latest news<input type='checkbox' checked id='l_news' class='sub_chk'/></label>
                                                                    <label class='checkbox-inline'>Success Story<input type='checkbox' checked id='suc_story' class='sub_chk'/></label>
                                                                </div>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                <!--</form>-->
                                                </div><!-- end of accordion-inner-->
                                            </div><!-- end of accordion-body collapse-->
                                        </div>
                                        <div class="form-group">
                                            <!--<button name="" class="btn-group">Save</button>-->
                                            <input type="hidden" name="all_forms" value="layout"/>
                                            <button id='general' class='gen btn btn-default' type="submit" name="save_general" value="Save">Save</button>
                                        </div>
                                    </div> <!--end accordion-->
                                </form>
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="home">
                                <h1>Home</h1>
                                <!-- start the form for home settings -->
                                <form id ='home_form' role ='form' enctype="multipart/form-data" method="POST" action="dbEntry.php">
                                    <div id="home_accordion" class="accordion">
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#hodCollapse" data-parent="#home_accordion" data-toggle="collapse" class="accordion-toggle">HOD's Corner</a>
                                            </div>
                                            <div class="accordion-body collapse in" id="hodCollapse">
                                                <div class="accordion-inner">
                                                    <div class='form-group'>
                                                        <label>HOD's Picture:
                                                            <input type="file" name="hodzpicture" value="<?php $m->getImage('HODs_corner'); ?>" />
                                                        </label>
                                                    </div>
                                                    <div class='form-group' id='home_'>
                                                        <label for='corner'>HOD's Corner:</label>
                                                        <textarea id='hodztext' class='ckeditor form-control' name="hodztext"><?php $m->getAbout('HODs_corner'); ?></textarea>
                                                    </div>
                                                </div><!-- end accordion-inner -->
                                            </div><!-- end accordion-body collapse -->
                                        </div><!-- end accordion-group -->
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <a href="#mvCollapse" data-parent="#home_accordion" data-toggle="collapse" class="accordion-toggle">Mission and Vision</a>
                                            </div>
                                            <div class="accordion-body collapse" id="mvCollapse">
                                                <div class="accordion-inner">
                                                    <div class='form-group'>
                                                        <label for='mission'>Mission:</label>
                                                        <textarea id='mission' class='ckeditor form-control' name="mission"><?php $m->getAbout('mission'); ?></textarea>
                                                    </div>
                                                    <div class='form-group'>
                                                        <label for='vision'>Vision:</label>
                                                        <textarea id='vision' class='ckeditor form-control' name="vision"><?php $m->getAbout('vision'); ?></textarea>
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <!--<button class="btn-group">Save</button>-->
                                            <input type="hidden" name="all_forms" value="home"/>  
                                            <button id='home' class='gen btn btn-default' type="submit" name="save_home" value="Save">Save</button>
                                        </div>
                                    </div> <!--end accordion-->     
                                </form>
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="news_events">
                                <h1>News and Events</h1>
                                
                                <div id="news_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#newsCollapse" data-parent="#news_accordion" data-toggle="collapse" class="accordion-toggle">News and Events</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="newsCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="news_">
                                                        <!-- start the form for news and events -->
                                                        <div id='news' class="conDiv"></div>
                                                        <div id='news' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        
                                                        <div class='row'>
                                                            <button id='news' class='addNew btn' name='add_news' style='float:left; margin:2px;'>Add</button>
                                                            <button id='news' class='delete btn' name='add_news' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        <input id='news' class = 'sub btn btn-default' type="submit" name="save_news" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        
                                </div> <!--end accordion-->
                            </div>   
                            </div><!-- end of tab-pane-->
                              <div class="tab-pane" id="resrch">
                                <h1>Research</h1>
                                 <!-- start the form for general settings -->
                                <div id="research_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#researchCollapse" data-parent="#research_accordion" data-toggle="collapse" class="accordion-toggle">Research</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="researchCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="research_">
                                                        <!-- research contents enter here -->
                                                        <div id='research' class='conDiv'></div>
                                                        <div id='research' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='hidden' name='date' value='2014-05-28 00:00:00'/>
                                                        <input type='hidden' name='all_forms' value='research'/>
                                                        <div class='row'>
                                                            <button id='research' class='addNew btn' name='add_research' style='float:left; margin:2px;'>Add</button>
                                                            <button id='research' class='delete btn' name='add_research' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        <input id='research' class = 'sub btn btn-default' type="submit" name="save_research" value="Save"/>
                                                    </div>
                                                </form>
                                                <!--<form enctype="multipart/form-data" method="POST" action="dbEntry.php">-->
                                            </div>
                                        </div>
                                </div> <!--end accordion-->
                            </div>
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="res">
                                <h1>Resource</h1>
                                <!-- start the form for general settings -->
                                <div id="resource_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#resourcesCollapse" data-parent="#resource_accordion" data-toggle="collapse" class="accordion-toggle">Course Notes and Assignments</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="resourcesCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="resources_">
                                                        <!-- resources contents enter here -->
                                                        
                                                        <div id='resources' class='conDiv'></div>
                                                        <div id='resources' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <input type='hidden' name='res_date' value='2014-05-28 00:00:00'/>
                                                        <input type='hidden' name='all_forms' value='research'/>
                                                        <div class='row'>
                                                            <button id='resources' class='addNew btn' name='add_cosnote' style='float:left; margin:2px;'>Add</button>
                                                            <button id='resources' class='delete btn' name='delete_cosnote' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        <input id='resources' class = 'sub btn btn-default' type="submit" name="save_res" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>      
                                    </div>
                                </div> <!--end accordion-->
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="cos_and_prog">
                                <h1>Courses and Programmes</h1>
                                <!-- start the form for general settings -->
                                <div id="cos_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#coursesCollapse" data-parent="#cos_accordion" data-toggle="collapse" class="accordion-toggle">Courses</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="coursesCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="courses_">
                                                        <!-- resources contents enter here -->
                                                        

                                                        <div id='courses' class='conDiv'></div>
                                                        <div id='courses' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <button id='courses' class='addNew btn' name='add_cos' style='float:left; margin:2px;'>Add</button>
                                                            <button id='courses' class='delete btn' name='delete_cos' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        <input id='courses' class = 'sub btn btn-default' type="submit" name="save_cos" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>    
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#progCollapse" data-parent="#cos_accordion" data-toggle="collapse" class="accordion-toggle">Programmes</a>
                                        </div>
                                        <div class="accordion-body collapse" id="progCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="programmes_">
                                                        <!-- resources contents enter here -->
                                                        

                                                        <div id='prog' class='conDiv'></div>
                                                        <div id='prog' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <button id='prog' class='addNew btn' name='add_prog' style='float:left; margin:2px;'>Add</button>
                                                            <button id='prog' class='delete btn' name='delete_prog' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        <input id='prog' class='sub btn btn-default' type="submit" name="save_prog" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>           
                                    </div>
                                </div> <!--end accordion-->
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="pple">
                                <h1>People</h1>
                                <!-- start the form for general settings -->
                                <form enctype="multipart/form-data" method="POST" action="dbEntry.php">
                                <div id="people_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#staffCollapse" data-parent="#people_accordion" data-toggle="collapse" class="accordion-toggle">Staff</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="staffCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="resources_">
                                                        <!-- resources contents enter here -->
                                                        
                                                        <div id='staff' class='conDiv'></div>
                                                        <div id='staff' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <button id='staff' class='addNew btn' name='add_staff' style='float:left; margin:2px;'>Add</button>
                                                            <button id='staff' class='delete btn' name='delete_staff' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        
                                                        <input id = 'staff' class = 'sub btn btn-default' type="submit" name="save_staff" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#stud_groupCollapse" data-parent="#resource_accordion" data-toggle="collapse" class="accordion-toggle">Student Group</a>
                                        </div>
                                        <div class="accordion-body collapse" id="stud_groupCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="students_">
                                                        <!-- resources contents enter here -->
                                                        
                                                        <div id='stud_group' class='conDiv'></div>
                                                        <div id='stud_group' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <button id='stud_group' class='addNew btn' name='add_stud_group' style='float:left; margin:2px;'>Add</button>
                                                            <button id='stud_group' class='delete btn' name='delete_stud_group' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                  
                                                        <input id='stud_group' class='sub btn btn-default' type="submit" name="save_stud_group" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#alumniCollapse" data-parent="#resource_accordion" data-toggle="collapse" class="accordion-toggle">Alumni</a>
                                        </div>
                                        <div class="accordion-body collapse" id="alumniCollapse">
                                            <div class="accordion-inner">
                                                <form role='form'>
                                                    <div class="form-group" id="alumni_">
                                                        <!-- resources contents enter here -->
                                                        
                                                        <div id='alumni' class='conDiv'></div>
                                                        <div id='alumni' class='holder row'></div>
                                                    </div>
                                                    <div class='form-group'>
                                                        <div class='row'>
                                                            <button id='alumni' class='addNew btn' name='add_alumni' style='float:left; margin:2px;'>Add</button>
                                                            <button id='alumni' class='delete btn' name='delete_alumni' style='float:left; margin:2px;'>Delete</button>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <!--<button class="btn-group">Save</button>-->
                                                        
                                                        <input id='alumni' class='sub btn btn-default' type="submit" name="save_alumni" value="Save"/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>           
                                </div> <!--end accordion-->
                            </div><!-- end of tab-pane-->
                            <div class="tab-pane" id="timetable">
                                <h1>Timetable</h1>
                                <!-- start the form for general settings -->
                                <div id="time_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#timeCollapse" data-parent="#time_accordion" data-toggle="collapse" class="accordion-toggle">Course Notes and Assignments</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="timeCollapse">
                                            <div class="accordion-inner">
                                                <form role='form' id = 'timetable_form' enctype="multipart/form-data" method="POST" action="dbEntry.php">
                                                    <div class='form-group'>
                                                       <label for='timetable'>Timetable:</label>
                                                       <textarea class='ckeditor form-control' name="timetable"><?php $m->getTimetable(); ?></textarea>
                                                       <input type="hidden" name="all_forms" value="timetable"/>
                                                       <button id='timetable' class='gen btn btn-default' type="submit" name="save_time" value="Save">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>      
                                    </div>
                                </div> <!--end accordion-->
                            </div><!-- end of tab-pane-->
                              <div class="tab-pane" id="about">
                                <h1>About</h1>
                                <!-- start the form for general settings -->
                                <form id = 'about_form' enctype="multipart/form-data" method="POST" action="dbEntry.php">
                                <div id="about_accordion" class="accordion">
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#historyCollapse" data-parent="#about_accordion" data-toggle="collapse" class="accordion-toggle">history</a>
                                        </div>
                                        <div class="accordion-body collapse in" id="historyCollapse">
                                            <div class="accordion-inner">
                                                <div class='form-group'>
                                                   <label for='history'>History:</label>
                                                   <textarea class='ckeditor form-control' name="history"><?php $m->getAbout('history'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#contactCollapse" data-parent="#about_accordion" data-toggle="collapse" class="accordion-toggle">Contact Details</a>
                                        </div>
                                        <div class="accordion-body collapse" id="contactCollapse">
                                            <div class="accordion-inner">
                                                <div class='form-group'>
                                                   <label for='c_details'>Contact Details:</label>
                                                   <textarea class='ckeditor form-control' name="contact_details"><?php $m->getAbout('contactDetails'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#academicsCollapse" data-parent="#about_accordion" data-toggle="collapse" class="accordion-toggle">Academics</a>
                                        </div>
                                        <div class="accordion-body collapse" id="academicsCollapse">
                                            <div class="accordion-inner">
                                                <div class='form-group'>
                                                   <label for='academics'>Academics:</label>
                                                   <textarea class='ckeditor form-control' name="academics"><?php $m->getAbout('academics'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>   
                                    <div class="accordion-group">
                                        <div class="accordion-heading">
                                            <a href="#suc_stryCollapse" data-parent="#about_accordion" data-toggle="collapse" class="accordion-toggle">Success Story</a>
                                        </div>
                                        <div class="accordion-body collapse" id="suc_stryCollapse">
                                            <div class="accordion-inner">
                                                <div class='form-group'>
                                                   <label for='s_story'>Success Story:</label>
                                                   <textarea class='ckeditor form-control' name="succ_stry"><?php $m->getAbout('successStories'); ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    <div class="form-group">
                                            <input type="hidden" name="all_forms" value="about"/>
                                            <button id='about' class='gen btn btn-default' type="submit" name="save_about" value="Save">Save</button>
                                        </div>
                                </div> <!--end accordion-->
                                </form>
                            </div><!-- end of tab-pane-->      
                    </div><!-- tab-content -->
                  </div><!-- col -->
                </div><!-- row -->
              </div>
            </div>
        </p>
        <div class='push'></div>
    </div>
    <div class="footer" style='background-color:#3d288e;'>
      <div class="container">
        <p class="text-muted">Webo CMS &copy; 2014</p>
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
          loadCon('<?php echo $array?>');
          $('input[type=file]').change(function(e){
                $(this).parent().find('.help-block').html('Current File: '+$(this).val().replace(/C:\\fakepath\\/i, ''));
            });

      });
    </script>
</body>
</html>
