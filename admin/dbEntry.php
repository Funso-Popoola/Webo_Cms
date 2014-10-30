<?php 
require 'dbQuery.php';
require 'less_css/Less.php';
$m = new dbQuery();

if(isset($_POST['action'])){
    if($_POST['action'] == 'delete'){
        if($_POST['caller'] == 'news'){
            //echo 'ttttt'.$_POST['data'];
            $m->deleteEntry('news','title',$_POST['data']);
        }else if($_POST['caller'] == 'staff'){
            $m->deleteEntry('people','name',$_POST['data']);
        }else if($_POST['caller'] == 'stud_group'){
            $m->deleteEntry('people','name',$_POST['data']);
        }else if($_POST['caller'] == 'alumni'){
            $m->deleteEntry('people','name',$_POST['data']);
        }else if($_POST['caller'] == 'research'){
            $m->deleteEntry('research','title',$_POST['data']);
        }else if($_POST['caller'] == 'resources'){
            $m->deleteEntry('resources','title',$_POST['data']);
        }else if($_POST['caller'] == 'courses'){
            $m->deleteEntry('courses','code',$_POST['data']);
        }else if($_POST['caller'] == 'prog'){
            $m->deleteEntry('programs','name',$_POST['data']);
        }
    }else if($_POST['action'] == 'visibility'){
            $m->toggleVisibility($_POST['id'],$_POST['data'],$_POST['type']);
        }

    
}

if(isset($_POST['all_forms'])){
    $all_form = $_POST['all_forms'];
    if ($all_form == 'layout'){
        $dept_name = $_POST['dept_name'];
        $column_num = $_POST['column_num'];
        $primary = $_POST['primary_color'];
        $secondary = $_POST['second_color'];
        $tertiary = $_POST['tertiary_color'];
        $slider1 = getImageFilename('slider1');
        $slider2 = getImageFilename('slider2');
        $slider3 = getImageFilename('slider3');
        $slider4 = getImageFilename('slider4');
        if($slider1 == -2) {
            $slider1 = $m->getImage('slider1');
        }
        if ($slider2 == -2){
            $slider2 = $m->getImage('slider2');
        }
        if($slider3 == -2){
            $slider3 = $m->getImage('slider3');
        }
        if($slider4 == -2){
            $slider4 = $m->getImage('slider4');
        }
        if(($slider1 != -1) && ($slider2 != -1) && ($slider3 != -1) && ($slider4 != -1)){
           $m->setLayout($dept_name,$column_num,$primary,$secondary,$tertiary,$slider1,$slider2,$slider3,$slider4);
        }
        editColor($primary,$secondary,$tertiary);
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");
    }elseif ($all_form == 'home'){
        $hodztext = $_POST['hodztext'];
        $hodzpicture = getImageFilename('hodzpicture');
        echo $hodzpicture;
        $mission = $_POST['mission'];
        $vision = $_POST['vision'];
        if($hodzpicture == -2){
            $hodzpicture = $m->getImage('HODs_corner');
            echo $hodzpicture;
        }
        if($hodzpicture != -1){
           $m->setHODscorner($hodzpicture,$hodztext);
           $m->setMissionVision($mission,$vision);
        }
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");
    }elseif ($all_form == 'mission') {
        $text = $_POST['mission'];
        $m->setMissionVision($text);
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");
    }elseif ($all_form == "news") {
        $type = $_POST['news_type'];
        $title = $_POST['title'];
        $content = $_POST['news_content'];
        $author = $_POST['news_author'];
        $date = $_POST['date'];
        $v = $m->checkPresence('news','title',$title);
        if($v['result']){
            $m->updateNews($v['id'],$type,$title,$content,$author,$date);
        }else{
            $m->setNews($type,$title,$content,$author,$date);
        }
        
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");
    }elseif ($all_form == 'programmes') {
        $prog_name = $_POST['prog_name'];
        $prog_type = $_POST['prog_type'];
        $prog_details = $_POST['prog_details'];
        $v = $m->checkPresence('programs','name',$prog_name);
        if($v['result']){
            $m->updateProgram($v['id'],$prog_name,$prog_type,$prog_details);
        }else{
            $m->setProgram($prog_name,$prog_type,$prog_details);
        }
    }elseif($all_form == 'courses'){
        $cos_code = $_POST['cos_code'];
        $cos_title = $_POST['cos_title'];
        $cos_type = $_POST['cos_type'];
        $cos_desc = $_POST['cos_desc'];
        $v = $m->checkPresence('courses','code',$cos_code);
        if($v['result']){
            $m->updateCourses($v['id'],$cos_code,$cos_title,$cos_type,$cos_desc);
        }else{
           $m->setCourses($cos_code,$cos_title,$cos_type,$cos_desc); 
        }
    }elseif ($all_form == "research") {
        $type = $_POST['research_type'];
        $title = $_POST['research_title'];
        $url = $_POST["research_link"];
        $description = $_POST['research_desc'];
        $author = $_POST['research_author'];
        
        $v = $m->checkPresence('research','title',$title);
        if($v['result']){
            $m->updateResearch($v['id'],$title,$type,$url,$description,$author);
        }else{
           $m->setResearch($title,$type,$url,$description,$author);
        }   
    }elseif ($all_form == 'resources'){
        $res_url = "";
        $res_title = $_POST['res_title'];
        $res_desc = $_POST['res_desc'];
        $res_cos = $_POST['res_cos'];
        $res_author = $_POST['res_author'];
        $res_type = $_POST['res_type'];
        if(!empty($_FILES)){
             //print_r($_FILES['res_url']);
             //echo 'bbbbbb'.$_FILES[$filee]["name"][0];
             $res_url = getFilename($_FILES['res_url']);
             $res_date = $_POST['date'];
             $v = $m->checkPresence('resources','title',$res_title);
             if($v['result']){
                 $m->updateResources($v['id'],$res_title,$res_cos,$res_type,$res_url,$res_desc,$res_author,$res_date);
             }else{
               $m->setResources($res_title,$res_cos,$res_type,$res_url,$res_desc,$res_author,$res_date);
             }
        }
        
          
        //if($cosnote_url != -1){
           
        //}
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");
    }elseif ($all_form == 'people') {
        if($_POST['staff_cat']=='staff'){
            $staff_name = $_POST['staff_name'];
            $staff_link = $_POST['staff_link'];
            $staff_bio = $_POST['staff_details'];
            $staff_cat = $_POST['staff_cat']; 
            $v = $m->checkPresence('people','name',$staff_name);
            if($v['result']){
                $m->updatePeople($v['id'],$staff_name,$staff_link,$staff_cat,$staff_bio);
            }else{
               $m->setPeople($staff_name,$staff_link,$staff_cat,$staff_bio);
            } 
        }else if($_POST['staff_cat']=='stud_group'){
            $student_name = $_POST['student_name'];
            $student_link = $_POST['student_link'];
            $student_cat = $_POST['staff_cat'];
            $student_desc = $_POST['student_desc'];
            $v = $m->checkPresence('people','name',$student_name);
            if($v['result']){
                $m->updatePeople($v['id'],$student_name,$student_link,$student_cat,$student_desc);
            }else{
                $m->setPeople($student_name,$student_link,$student_cat,$student_desc);
            }
           
        }else if($_POST['staff_cat']=='alumni'){
            $alumni_name = $_POST['alumni_name'];
            $alumni_link = $_POST['alumni_link'];
            $alumni_cat = $_POST['staff_cat'];
            $alumni_desc = $_POST['alumni_desc'];
            $v = $m->checkPresence('people','name',$alumni_name);
            if($v['result']){
                $m->updatePeople($v['id'],$alumni_name,$alumni_link,$alumni_cat,$alumni_desc);
            }else{
                $m->setPeople($alumni_name,$alumni_link,$alumni_cat,$alumni_desc);
            }
            
        }
        
    }elseif ($all_form == 'about'){
        $history = $_POST['history'];
        $contact_details = $_POST['contact_details'];
        $academics = $_POST['academics'];
        $succ_stry = $_POST['succ_stry'];
        
        $m->setAbout($history,$contact_details,$academics,$succ_stry);
        //$redirect = $_SERVER['PHP_SELF'];
        //header("Refresh: 2; URL=dbEntry.php");

    }else if($all_form == 'timetable'){
        $timetable = $_POST['timetable'];
        $m->setTimeTable($timetable);
    }
}


function editColor($priColor,$secColor,$terColor){
    $less = new Less_Parser();
    $less->parseFile('../css/s.less','/');
    $less->ModifyVars(array('priColor'=>$priColor,'secColor'=>$secColor,'terColor'=>$terColor));
    $newLess = $less->getCss();
    file_put_contents('../css/s.css', $newLess);
}




function getImageFilename($filer){
	if ((!empty($_FILES[$filer])) && ($_FILES[$filer]['error'] == 0)) {
    //Check if the file is JPEG image and it's size is less than 350Kb
        $filename = basename($_FILES[$filer]['name']);
        $ext = substr($filename, strrpos($filename, '.') + 1);
        if ((($ext == "jpg")||($ext == "png")||($ext=="jpeg")) && (($_FILES[$filer]["type"] == "image/png") || ($_FILES[$filer]["type"] == "image/jpeg")) &&
            ($_FILES[$filer]["size"] < 5000000)) {
        //Determine the path to which we want to save this file
            $newfilename = $filer .".". $ext;
            
            $newname = '../images'.'/'. $newfilename;
        //Check if the file with the same name is already exists on the server
            if (!file_exists($newfilename)) {
            //Attempt to move the uploaded file to it's new place
                if ((move_uploaded_file($_FILES[$filer]['tmp_name'], $newname))) {
                //rename($filename, $newfilename);
                echo "It's done! The file has been saved as: " . $newname;
				$the_url = $newfilename;
				return $the_url;
                } else {
                    return '-1';
                }
            } else {
                echo "Error: File " . $_FILES[$filer]["name"] . " already exists";
                return '-2';
            }
        } else {
            echo "Error: Only .jpg and .png images under 5Mb are accepted for upload";
            return '-2';
        }
    } else {
        echo "Error: No file uploaded";
        return '-2';
    }
 }
function getFileName($filee){
    $allowedExts = array("pdf", "doc", "docx");

    $extension = end(explode(".", $filee["name"]));
    if ((!empty($filee)) && ($filee['error'] == 0)) {
        if(($filee["type"] == "application/pdf") || ($filee["type"] == "application/vnd.openxmlformats-officedocument.wordprocessingml.document") || ($filee["type"] == "application/msword") && in_array($extension, $allowedExts)){
    	   if($filee["size"] < 20000000){
               $tempname = $filee['name'];
               $ext = substr($tempname, strrpos($tempname, '.') + 1);
        	   $Dir = "../upload/";
        	   $Name = $Dir . $tempname;
        	   if (move_uploaded_file($filee['tmp_name'], $Name)) {
        	   //get info about the assignment being uploaded
        	       return $tempname;
                   //return $extension;
    	       }
           }else{
            echo "Error: Only Files under 2Mb are accepted for upload";
           }    
        }else{
            echo "Error: Only .pdf , .doc and .docx Files are accepted for upload";
            print_r($filee);
            //echo $filee["type"] ;
        }
    }else {
        echo "Error: No file uploaded";
    }
}
?>