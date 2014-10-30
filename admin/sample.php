<?php
/**
 * Class to handle all db operations
 *
 **/
require_once 'dbHandler.php';
require_once 'config.php';

 class Paginate {

    public function loadPaginator($page){
        $db = new dbHandler(config::HOST, config::USERNAME, config::PASSWORD);
        $db->selectDatabase(config::DB_NAME);
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
          $a7 = array();
          $a8 = array();
          $count = 0;
          $result = mysql_query($query) or die(mysql_error());
          while ($row = mysql_fetch_assoc($result)) {
            if($tName == 'news'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['content'];
              $a4[$count] = $row['author'];
              $array= array('title'=>$a1,'type'=>$a2,'content'=>$a3,'author'=>$a4);
            }else if($tName == 'people') {
              $a1[$count] = $row['name'];
              $a2[$count] = $row['link'];
              $a3[$count] = $row['category'];
              $a4[$count] = $row['description'];
              $array = array('name'=>$a1,'link'=>$a2,'category'=>$a3,'description'=>$a4);
            }else if($tName == 'programs'){
              $a1[$count] = $row['name'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['description'];
              $array = array('name'=>$a1,'type'=>$a2,'description'=>$a3); 
            }else if($tName == 'research'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['type'];
              $a3[$count] = $row['url'];
              $a4[$count] = $row['description'];
              $a5[$count] = $row['author'];
              $array = array('title'=>$a1,'type'=>$a2,'url'=>$a3,'description'=>$a4,'author'=>$a5);
            }else if($tName == 'resources'){
              $a1[$count] = $row['title'];
              $a2[$count] = $row['code'];
              $a3[$count] = $row['type'];
              $a4[$count] = $row['url'];
              $a5[$count] = $row['description'];
              $a6[$count] = $row['author'];
              $array = array('title'=>$a1,'code'=>$a2,'type'=>$a3,'url'=>$a4,'description'=>$a5,'author'=>$a6);
            }else if($tName == 'courses'){
              $a1[$count] = $row['code'];
              $a2[$count] = $row['title'];
              $a3[$count] = $row['type'];
              $a4[$count] = $row['description'];
              $array = array('code'=>$a1,'title'=>$a2,'type'=>$a3,'description'=>$a4);
            }
            $count++;     
        }
        var_dump($array);
        $array = str_replace('rn','',stripslashes(json_encode($array)));
        
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