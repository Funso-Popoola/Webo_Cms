<?php
/**
 * Handling database
 *
 */
 require_once 'config.php';

class dbHandler {

    private $host;
    private $username;
    private $password;
    private $dbName;
    private $tableName;
    private $con;
    private $query;
    
    public function __construct($host, $username, $password) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->con = mysql_connect($this->host, $this->username, $this->password) or die("Could not connect to " + $this->host);
    }

    public function setTable($table_name) {
        $this->tableName = $table_name;
    }

    public function closeDb() {
        if (isset($this->con)) {
            mysql_close($this->con);
            unset($this->con);
        }
    }

    public function selectDatabase($dbName) {
        $this->dbName = $dbName;
        mysql_select_db($this->dbName, $this->con) or die("Could not select database" + $this->dbName);
    }

    public function query($query){
        $this->query = @mysql_query($query,$this->con);
    }
	
   public function getResult(){
        $result = array();
        for($i=0; $i<@mysql_num_rows($this->query);$i++){
            $result[$i] = @mysql_fetch_array($this->query,MYSQL_ASSOC);
        }
        return $result;
    }
	
	public function getCon(){
		return $this->con;	
	}

}
 
 
/**
 * class dbConnect {
 *
 *     //private $conn;

 *     function __construct() {        
 *     }

 *     /**
 *      * Establishing database connection
 *      * @return database connection handler
 *      
 *     function connect() {
 *         include_once dirname(__FILE__) . '/config.php';

 *         // Connecting to mysql database
 *         $conn = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
 *         // Check for database connection error
 *         if (mysqli_connect_errno()) {
 *             echo "Failed to connect to MySQL: " . mysqli_connect_error();
 *         }

 *         // returning connection resource
 *         //return $this->conn;
 *     }
 *     
 *     function selectDb() {
 *         include_once dirname(__FILE__) . '/config.php';
 *         
 *     }

 * }
 */
?>
