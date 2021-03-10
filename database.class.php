

<?php
class database
{
	private $__hostnane = "localhost";
	private $__userhost = "root";
	private $__passhost = "";
	private $__dbname = "qltt4";
	private $__conn = NULL;
	private $__result = NULL;

	public function __construct()
    {
    	$this->connect();
    }

    public function connect(){
		$this -> __conn = mysqli_connect($this -> __hostnane, $this -> __userhost, $this -> __passhost, $this-> __dbname) 
		or die ('Loi ket noi');
		mysqli_query($this-> __conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
	}
	public function disconnect(){
		if($this -> __conn){
			mysqli_close($this-> __conn);
		}
	}
	public function query($sql){
		$this-> __result = mysqli_query($this-> __conn, $sql ) or die ("loi query");
	}
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	public function num_rows(){
		if($this-> __result){
			$row = mysqli_num_rows($this-> __result);
		}else {
			$row = 0;
		}
		return $row;
	}	

	public function test(){
		return $this->__result;
	}
	public function fetch(){
		$data = array();
		$data = mysqli_fetch_assoc($this -> __result);
		return $data; 
	}
	public function fetchAll(){
		$data = array();
		while ($row = $this-> fetch()) {
			$data[] = $row;
		}
		return $data;
	}
}

?>	
