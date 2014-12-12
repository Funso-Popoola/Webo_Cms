<?php
/**
 * Class to handle all db operations
 *
 **/
require_once 'dbHandler.php';
require_once 'config.php';
require 'Zebra_Pagination.php';

 class dbQuery {

    var $db;

    public function __construct(){
         $this->db = new dbHandler(config::HOST, config::USERNAME, config::PASSWORD);
         $this->db->selectDatabase(config::DB_NAME);
    }


    public function getSiteTitle() {
        $query = "SELECT value FROM layout WHERE name = 'dept_name'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        echo $row['value'];    
    }

    //General Content Functions
    public function setAbout($history,$contact_details,$academics,$succ_stry) {
        $query = "UPDATE generalcontent SET  contentValue = CASE WHEN contentName = 'history' THEN '".mysql_real_escape_string($history) .
            "' WHEN contentName = 'contactDetails' THEN '".mysql_real_escape_string($contact_details) .
            "' WHEN contentName = 'successStories' THEN '".mysql_real_escape_string($succ_stry) .
            "' WHEN contentName = 'academics' THEN '".mysql_real_escape_string($academics) .
            "' END WHERE contentName  in ('history','contactDetails','successStories','academics');";
        $result = mysql_query($query) or die(mysql_error());    
    }
    public function getAbout($what) {
        $query = "SELECT contentValue FROM generalcontent WHERE contentName = '".$what."'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        echo $row['contentValue'];    
    }
    
    public function setHODscorner($url,$text) {
        $queryI = "UPDATE images SET url = '" . $url . "' WHERE name = 'HODs_corner'";
        $resultI = mysql_query($queryI) or die(mysql_error());
        $query = "UPDATE generalcontent SET contentValue = '" . mysql_real_escape_string($text) . "' WHERE contentName = 'HODs_corner'";
        $result = mysql_query($query) or die(mysql_error());
	}
    public function setMissionVision($mission,$vision) {
        $queryM = "UPDATE generalcontent SET contentValue = '" . mysql_real_escape_string($mission) . "' WHERE contentName = 'mission'";
        $resultM = mysql_query($queryM) or die(mysql_error());
        $queryV = "UPDATE generalcontent SET contentValue = '" . mysql_real_escape_string($vision) . "' WHERE contentName = 'vision'";
        $resultV = mysql_query($queryV) or die(mysql_error());    
    }
    
    //Layout Functions
    public function setLayout($dept_name,$column_num,$primary,$secondary,$tertiary,$slider1,$slider2,$slider3,$slider4) {
        $query = "UPDATE layout SET  value = CASE WHEN name = 'theme' THEN '". $column_num .
            "' WHEN name = 'pri_color' THEN '". $primary .
            "' WHEN name = 'sec_color' THEN '". $secondary .
            "' WHEN name = 'ter_color' THEN '". $tertiary .
            "' WHEN name = 'dept_name' THEN '". $dept_name .
            "' END WHERE name  in ('theme','pri_color','sec_color','ter_color','dept_name') ;";
        $result = mysql_query($query) or die(mysql_error());  
        $queryImg = "UPDATE images SET url = CASE WHEN name = 'slider1' THEN '". $slider1 .
            "' WHEN name = 'slider2' THEN '". $slider2 .
            "' WHEN name = 'slider3' THEN '". $slider3 .
            "' WHEN name = 'slider4' THEN '". $slider4 .
            "' END WHERE name  in ('slider1','slider2','slider3','slider4') ;";
        $resultImg = mysql_query($queryImg) or die(mysql_error());
    }
    public function getLayout($what) {
        $query = "SELECT value FROM layout WHERE name = '".$what."'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        echo $row['value'];    
    }
    public function getTheme($what) {
        $query = "SELECT value FROM layout WHERE name = '".$what."'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        return $row['value'];    
    }
    
    //Research Functions
    public function setResearch($title,$type,$url,$description,$author) {
        $query = "INSERT INTO research (title, type, url, description, author) VALUES ('" .
            mysql_real_escape_string($title) . "', '" . $type . "', '" . $url . "', '".
            mysql_real_escape_string($description) ."', '" .
            mysql_real_escape_string($author) . "');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updateResearch($id,$title,$type,$url,$description,$author) {
        $query = sprintf("UPDATE research set title = '%s', type = '%s', url = '%s', description = '%s', author = '%s'".
            " where id = '%s' " ,mysql_real_escape_string($title),mysql_real_escape_string($type),
            mysql_real_escape_string($url),mysql_real_escape_string($description),
            mysql_real_escape_string($author),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getResearch($what) {
        $pagination = new Zebra_Pagination();
        $records_per_page = 3;
        echo "<table class='table table-striped table-bordered table-condensed'>";
        echo "<thead><tr><th>Title</th><th>Description</th><th>Author</th></tr></thead>";
        echo "<tbody>";
        $pagination->navigation_position(
            isset($_GET['navigation_position']) && in_array(
                $_GET['navigation_position'],
                array('left', 'right')
            ) ? $_GET['navigation_position'] : 'outside'
        );

        $getrese = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM research WHERE type ='".$what."' LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."") or die(mysql_error());

        $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);
        while ($row = mysql_fetch_array($getrese)) {
            //extract($row);
            $title = $row['title'];
            $url = $row['url'];
            $description = $row['description'];
            $author = $row['author'];
            echo "<tr><td><a href='".$url."'>".$title."<a/></td><td>".$description."</td><td>".$author."</td></tr>";
        }  
        echo "</tbody>";
        echo "</table>";

        // render the pagination links
        $pagination->render();        
    }
    
    //News Functions
    public function setNews($type,$title,$content,$author,$date_upload) {
        $query = "INSERT INTO `news` (`type`, `title`, `content`, `author`, `date_upload`) VALUES ('"
            . $type . "', '" . mysql_real_escape_string($title) . "', '" . mysql_real_escape_string($content)
            . "', '". mysql_real_escape_string($author) ."', '" . $date_upload .
            "');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updateNews($id,$type,$title,$content,$author,$date_upload) {
        $query = sprintf("UPDATE news set type = '%s', title = '%s', content = '%s', author = '%s', date_upload = '%s' where id = '%s' " ,
            mysql_real_escape_string($type),mysql_real_escape_string($title),mysql_real_escape_string($content),
            mysql_real_escape_string($author),mysql_real_escape_string($date_upload),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getNews($what) {
        $pagination = new Zebra_Pagination();
        if($what == "In_The_Media"){
            $records_per_page = 3;   
        }else{
            $records_per_page = 2;
        }

        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $query = "SELECT SQL_CALC_FOUND_ROWS * FROM news WHERE type ='".$what."' LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page.""; 
        $getnew = mysql_query($query) or die(mysql_error());

        $no = 1;
        $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

        // pass the total number of records to the pagination class
        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);
        while ($row = mysql_fetch_array($getnew)) {
            extract($row);
            $newz = $row['content'];
            echo "<a href='#' class='list-group-item'>";
            echo "<h4 class='list-group-item-heading'>".$title."</h4>";
            echo "<p class='list-group-item-text'>". $content . "</p>";
            echo "<a href='#'> by " . $author . " on " . $date_upload . "</a>";
            echo "</a>";
        }

        // render the pagination links
        $pagination->render();
    }
    
    //People Functions
    public function setPeople($name,$url,$category,$description) {
        $query = "INSERT INTO people (name, link, category, description) VALUES ('" . mysql_real_escape_string($name) . "', '" . $url . "', '" . $category . "', '". mysql_real_escape_string($description) ."');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updatePeople($id,$name,$url,$category,$description) {
        $query = sprintf("UPDATE people set name = '%s', link = '%s', category = '%s', description = '%s' where id = '%s' " ,mysql_real_escape_string($name),mysql_real_escape_string($url),mysql_real_escape_string($category),mysql_real_escape_string($description),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getPeople($what) {
        $pagination = new Zebra_Pagination();
        if($what == "staff"){
          $records_per_page = 3;  
        }else{
            $records_per_page = 1;
         }

        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $getrese = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM people WHERE category ='".$what."'LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."") or die(mysql_error());
        $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

        // pass the total number of records to the pagination class
        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);
        while ($row = mysql_fetch_array($getrese)) {
            extract($row);
            $resource = $row['name'];
            echo "<div class='row'>";
            echo "<img src='images/images014.jpg' align='left' hspace='10px' height='150px' width='150px' class='img-thumbnail' />";
            echo "<p align='justify'><h3><a href='".$link."'>".$name."</a></h3>";
            echo "<p align='justify'><a href='".$link."'>".$description."</a>";
            echo "</div>"; 
        }
        // render the pagination links
        $pagination->render();
    }
    
    //Courses Functions
    public function setCourses($code,$title,$type,$description) {
        $query = "INSERT INTO courses (code, title, type, description) VALUES ('" . $code . "', '" . mysql_real_escape_string($title) . "', '" . $type . "', '". mysql_real_escape_string($description) ."');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updateCourses($id,$code,$title,$type,$description) {
        $query = sprintf("UPDATE courses set code = '%s', title = '%s', type = '%s', description = '%s' where id = '%s' " ,mysql_real_escape_string($code),mysql_real_escape_string($title),mysql_real_escape_string($type),mysql_real_escape_string($description),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getCourses($what) {
        $pagination = new Zebra_Pagination();
        $records_per_page = 10;

        echo "<table class='table table-striped table-bordered table-condensed'>";
        echo "<thead><tr><th>S/N</th><th>Course Code</th><th>Course Title</th><th>Description</th></tr></thead>";
        echo "<tbody>";

        $pagination->navigation_position(isset($_GET['navigation_position']) && in_array($_GET['navigation_position'], array('left', 'right')) ? $_GET['navigation_position'] : 'outside');
        $getrese = mysql_query("SELECT SQL_CALC_FOUND_ROWS * FROM courses WHERE type ='".$what."' LIMIT " . (($pagination->get_page() - 1) * $records_per_page) . ', ' . $records_per_page."") or die(mysql_error());
        $no = 1;
        $rows = mysql_fetch_assoc(mysql_query('SELECT FOUND_ROWS() AS rows'));

        // pass the total number of records to the pagination class
        $pagination->records($rows['rows']);

        // records per page
        $pagination->records_per_page($records_per_page);

        while ($row = mysql_fetch_array($getrese)) {
            extract($row);
            //$course = $row['code'];
            echo "<tr><td>".$row['id']."</td><td>".$code."</td><td>".$title."</td><td>".$description."</td></tr>";
            $no += 1;
        } 
        echo "</tbody>"; 
        echo "</table>"; 

        // render the pagination links
        $pagination->render();
    }
    
    //Programme Functions
    public function setProgram($name,$type,$description) {
        $query = "INSERT INTO programs (name, type, description) VALUES ('" . mysql_real_escape_string($name) . "', '" . $type . "', '". mysql_real_escape_string($description) ."');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updateProgram($id,$name,$type,$description) {
        $query = sprintf("UPDATE programs set name = '%s', type = '%s', description = '%s' where id = '%s' " ,mysql_real_escape_string($name),mysql_real_escape_string($type),mysql_real_escape_string($description),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getProgram($what) {
        echo "<table>";
        echo "<tr><td>S/N</td><td>Name</td><td>Description</td></tr>";
        $getrese = mysql_query("SELECT * FROM programs WHERE type ='".$what."'") or die(mysql_error());
        while ($row = mysql_fetch_array($getrese)) {
            extract($row);
            $resource = $row['name'];
            echo "<tr><td>".$id."</td><td>".$name."</td><td>".$description."</td></tr>";
        }  
        echo "</table>"; 
    }
    
    //Resources Functions
    public function setResources($title,$code,$type,$url,$description,$author,$date) {
        $query = "INSERT INTO resources (title, code, type, url, description, author, date_upload) VALUES ('" . mysql_real_escape_string($title) . "', '" . $code . "', '" . $type . "', '". $url ."', '". mysql_real_escape_string($description) ."', '". mysql_real_escape_string($author) ."', '" . $date . "');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function updateResources($id,$title,$code,$type,$url,$description,$author,$date) {
        $query = sprintf("UPDATE resources set code = '%s', title = '%s', type = '%s', url = '%s', description = '%s', author = '%s', date_upload = '%s' where id = '%s' " ,mysql_real_escape_string($code),mysql_real_escape_string($title),mysql_real_escape_string($type),mysql_real_escape_string($url),mysql_real_escape_string($description),mysql_real_escape_string($author),mysql_real_escape_string($date),mysql_real_escape_string($id));
        $result = mysql_query($query) or die(mysql_error());
    }

    public function getResources($what) {
        echo "<table class='table table-striped table-bordered table-condensed'>";
        echo "<thead><tr><th>Title</th><th>Code</th><th>Description</th><th>Author</th><th>Date</th></tr></thead>";
        echo "<tbody>";
        $getrese = mysql_query("SELECT * FROM resources WHERE type ='".$what."'") or die(mysql_error());
        while ($row = mysql_fetch_array($getrese)) {
            extract($row);
            $title = $row['title'];
            $url = $row['url'];
            $code = $row['code'];
            $description = $row['description'];
            $author = $row['author'];
            $date_upload = $row['date_upload'];
            echo "<tr><td><a href='upload/".$url."'>".$title."<a/></td><td>".$code."</td><td>".$description."</td><td>".$author."</td><td>".$date_upload."</td></tr>";
        } 
        echo "</tbody>"; 
        echo "</table>"; 
    }
    
    //Time-Table Functions
    public function setTimetable($timetable) {
        $query = sprintf("UPDATE timetable SET timetable='%s'",mysql_real_escape_string($timetable));
        $result = mysql_query($query) or die(mysql_error());
    }
    public function getTimetable() {
        $query = "SELECT * from timetable";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        echo $row['timetable']; 
    }
    
    //Image Functions
    public function setImage($name,$pageName,$url) {
        $query = "INSERT INTO images (name, pageName, url) VALUES ('" . $name . "', '" . $pageName . "', '". $url ."');";
        $result = mysql_query($query) or die(mysql_error());
    }
    public function getImage($what) {
        $query = "SELECT url FROM images WHERE name = '".$what."'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        return $row['url']; 
    }

    public function checkPresence($table,$key,$value){
        $query = sprintf("SELECT id from %s where %s = '%s' ", mysql_real_escape_string($table), mysql_real_escape_string($key), mysql_real_escape_string($value));
        $result = mysql_query($query) or die(mysql_error());
        if (mysql_num_rows($result) > 0){
            $row = mysql_fetch_assoc($result);
            $id = $row['id'];
            return array('id'=>$id,'result'=>true);
        }else{
            return array('result'=>false);
        }
    }

    public function deleteEntry($table,$key,$value){
        //$query = sprintf("DELETE from example where name = '%s' ", mysql_real_escape_string($name));
        $query = sprintf("delete from %s where %s = '%s'",mysql_real_escape_string($table),mysql_real_escape_string($key),mysql_real_escape_string($value));
        $result = mysql_query($query) or die(mysql_error());
        //echo "delllleetteee".mysql_affected_rows($result);
    }


    public function getPages($admin){
        echo '<ul class="nav navbar-nav navbar-right">';
        echo "<li><a href='index.php$admin' >Home</a></li>";
        $getrese = mysql_query("SELECT * FROM cms WHERE visibility ='true'") or die(mysql_error());
        while ($row = mysql_fetch_array($getrese)) {
            extract($row);
            $resource = $row['pageName'];
            echo "<li><a href='".strtolower($resource).".php$admin' >".str_replace('_', ' ',$resource)."</a></li>";
        } 
        echo "<li><a href='about.php$admin' >About</a></li>";
        echo "</ul>"; 
    }



    public function toggleVisibility($id,$status,$type){
        if($type == 'page'){
            $query = sprintf("UPDATE cms set visibility = '%s' where pageName = '%s' " ,mysql_real_escape_string($status),mysql_real_escape_string($id));
        }else{
            $query = sprintf("UPDATE visibility set visibility = '%s' where contentName = '%s' " ,mysql_real_escape_string($status),mysql_real_escape_string($id));
        }
        
        $result = mysql_query($query) or die(mysql_error());
    }

     public function getVisibility($what){
        $query = "SELECT visibility FROM visibility WHERE contentName = '".$what."'";
        $result = mysql_query($query) or die(mysql_error());
        $row = mysql_fetch_array($result);
        return $row['visibility'];  
    }

    public function loadCon(){
        $array = array('news'=>array(),'people'=>array(),'programs'=>array(),'research'=>array(),'resources'=>array(),'courses'=>array(),'vis'=>array(),'sub_vis'=>array());
        $tNames = array('news','people','programs','research','resources','courses','cms','visibility');
        $vis = array('Research'=>'','News_and_events'=>'','Courses_and_programmes'=>'','People'=>'','Resources'=>'');
        $sub_vis = array('in_the_media'=>'','announcements'=>'','pub_seminars'=>'','labs'=>'','papers'=>'','proj_and_pubs'=>'','conferences'=>'','res_cos_notes'=>'','res_assignments'=>'','alumni'=>'','stud_group'=>'','mission'=>'','vision'=>'','suc_story'=>'','l_news'=>'');
        for($i=0;$i<count($array);$i++){
          $query = sprintf("select * from %s",mysql_real_escape_string($tNames[$i]));
          $count = 0;
          $a1 = array();
          $a2 = array();
          $a3 = array();
          $a4 = array();
          $a5 = array();
          $a6 = array();
          $result = mysql_query($query) or die(mysql_error());
          while ($row = mysql_fetch_assoc($result)) {
            if($tNames[$i] == 'news'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['content'];
              $a4[$count] = $row['author'];
              $array['news'] = array('title'=>$a1,'type'=>$a2,'content'=>$a3,'author'=>$a4);
            }else if($tNames[$i] == 'people') {
              $a1[$count] = $row['name'];
              $a2[$count] = $row['link'];
              $a3[$count] = $row['category'];
              $a4[$count] = $row['description'];
              $array['people'] = array('name'=>$a1,'link'=>$a2,'category'=>$a3,'description'=>$a4);
            }else if($tNames[$i] == 'programs'){
              $a1[$count] = $row['name'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['description'];
              $array['programs'] = array('name'=>$a1,'type'=>$a2,'description'=>$a3); 
            }else if($tNames[$i] == 'research'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['url'];
              $a4[$count] = $row['description'];
              $a5[$count] = $row['author'];
              $array['research'] = array('title'=>$a1,'type'=>$a2,'url'=>$a3,'description'=>$a4,'author'=>$a5);
            }else if($tNames[$i] == 'resources'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['code'];
              $a3[$count] = $row['type'];
              $a4[$count] = $row['url'];
              $a5[$count] = $row['description'];
              $a6[$count] = $row['author'];
              $array['resources'] = array('title'=>$a1,'code'=>$a2,'type'=>$a3,'url'=>$a4,'description'=>$a5,'author'=>$a6);
            }else if($tNames[$i] == 'courses'){
              $a1[$count] = $row['code'];
              $a2[$count] = $row['title'];
              $a3[$count] = $row['type'];
              $a4[$count] = $row['description'];
              $array['courses'] = array('code'=>$a1,'title'=>$a2,'type'=>$a3,'description'=>$a4);
            } else if($tNames[$i] == 'cms'){
                $vis[$row['pageName']]=$row['visibility'];
                $array['vis'] = $vis;
            }else if($tNames[$i] == 'visibility'){
                $sub_vis[$row['contentName']]=$row['visibility'];
                $array['sub_vis'] = $sub_vis;
            }  
            
            $count++;     
          }
        }

        $array = str_replace('rn','',stripslashes(json_encode($array)));
        return $array;
    }


    public function loadPaginator($page){
        //$array = array('news'=>array(),'people'=>array(),'programs'=>array(),'research'=>array(),'resources'=>array(),'courses'=>array());
        //$tNames = array('news','people','programs','research','resources','courses');
        switch($page){
            case 'news':
                $tName = 'news';
                break;
            case 'people':
                $tName = 'people';
                break;
            case 'programs':
                $tName = 'programs';
                break;
            case 'research':
                $tName = 'research';
                break;
            case 'resources':
                $tName = 'resources';
                break;
            case 'courses':
                $tName = 'courses';
                break; 
        }
          $query = sprintf("select * from %s",mysql_real_escape_string($tName));
          $a1 = array();
          $a2 = array();
          $a3 = array();
          $a4 = array();
          $a5 = array();
          $a6 = array();
          $count = 0;
          $result = mysql_query($query) or die(mysql_error());
          while ($row = mysql_fetch_assoc($result)) {
            if($tName == 'news'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['content']);
              $a4[$count] = $row['author'];
              $a5[$count] = $row['date_upload'];
              $array= array('title'=>$a1,'type'=>$a2,'content'=>$a3,'author'=>$a4,'date_upload'=>$a5);
            }else if($tName == 'people') {
              $a1[$count] = $row['name'];
              $a2[$count] = $row['link'];
              $a3[$count] = $row['category'];
              $a4[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['description']);
              $array = array('name'=>$a1,'link'=>$a2,'category'=>$a3,'description'=>$a4);
            }else if($tName == 'programs'){
              $a1[$count] = $row['name'];
              $a2[$count] = $row['type'];
              $a3[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['description']);
              $array = array('name'=>$a1,'type'=>$a2,'description'=>$a3); 
            }else if($tName == 'research'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['url'];
              $a4[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['description']);
              $a5[$count] = $row['author'];
              $array = array('title'=>$a1,'type'=>$a2,'url'=>$a3,'description'=>$a4,'author'=>$a5);
            }else if($tName == 'resources'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['code'];
              $a3[$count] = $row['type'];
              $a4[$count] = $row['url'];
              $a5[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['description']);
              $a6[$count] = $row['author'];
              $array = array('title'=>$a1,'code'=>$a2,'type'=>$a3,'url'=>$a4,'description'=>$a5,'author'=>$a6);
            }else if($tName == 'courses'){
              $a1[$count] = $row['code'];
              $a2[$count] = $row['title'];
              $a3[$count] = $row['type'];
              $a4[$count] = preg_replace("@[\\r|\\n|\\t]+@", "", $row['description']);
              $array = array('code'=>$a1,'title'=>$a2,'type'=>$a3,'description'=>$a4);
            }
            $count++;     
        }
        //var_dump($array);
        //$array = preg_replace("@[\\r|\\n|\\t]+@", "", $array);
        $array = str_replace('rn','',json_encode($array)); 
        //var_dump($array);
        return $array;
    }
   
 }
 
 
    /**
 *  
 *     private $conn;
 *     private $dBs;
 *
 *     function __construct() {
 *         require_once dirname(__FILE__) . '/data.php';
 *         // opening db connection
 *         $db = new dbConnect();
 *         $this->conn = $db->connect();
 *         //$this->dBs = $db->selectDb();
 *     }
 */
 ?>