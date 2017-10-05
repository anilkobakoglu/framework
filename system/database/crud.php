<?php 



namespace system\database;
use system\database\config;

class crud extends config{
	

private $db,$table,$select,$where,$arrayexecute,$asc,$desc,$limit,$delete,$neyi,$eski,$yeni,$update,$insert,$insertname,$insertvalue;





public function __toString(){

	return 	"veritabanı bağlantılarının yapıldığı sayfa";

}//end tostring


public function __call($name,$argument){


	echo  "'$name' adlı methot bu class ta bulunmamaktadır.";

}//end call

public function __set($name,$argument){



echo " Bu classa dışarıdan veri girmeniz yasaktır.<br> girdiğiniz değişken ismi= $name<br> girdiğiniz veri= $argument";

unset($name);
unset($argument);



}//end set


	public function __construct(){

		@$this->table = static::$table;

		 $this->db=new \PDO("mysql:host=".self::$dbhost.";dbname=".self::$dbname.";dbcharset=".self::$dbcharset."", self::$dbuser, self::$dbpass);

 
	}//construct end

function select($neyicekicen=false){


if(!$neyicekicen){

	try {
   
	$this->select=$this->db->prepare("select * from $this->table $this->where $this->asc $this->desc $this->limit");
	$this->select->execute($this->arrayexecute);
	return $this->select->FETCHALL();

    }

 catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
}

}

else{

	try{
		$this->select=$this->db->prepare("select $neyicekicen from $this->table $this->where $this->asc $this->desc $this->limit");
	$this->select->execute($this->arrayexecute);
	return $this->select->FETCHALL();



	}


	
  
 catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
	}
	}//else end


}//select end



function where($name,$value){

	if(!$this->where){

		$this->where= " where $name=?";
		$this->arrayexecute[]=$value;

	}

	else{


			$this->where.=" and $name=?";
			$this->arrayexecute[]=$value;
	}


return $this;
}//where end




function asc($name){

	$this->asc=" ORDER BY  $name asc ";
	return $this;

}//acs end



function desc($name){

	$this->desc= "ORDER BY $name desc";
	return $this;

}//desc end



function limit($value,$value2=false){

	if(!$value2){

		$this->limit=" limit $value";

	}

	else {

		$this->limit= " limit $value,$value2";
	}



	return $this;
}//limit end



function delete(){

try{

	$this->delete=$this->db->prepare("delete from $this->table $this->where");
	$this->delete->execute($this->arrayexecute);
	


	}
catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
	}

}//delete end



function update(array $values){


	 $this->neyi=$values[0];
	 $this->eski=$values[1];
	 $this->yeni=$values[2];

try{


	$this->update=$this->db->prepare("Update $this->table SET $this->neyi=? WHERE $this->neyi=?");
	$this->update->execute(array($this->yeni,$this->eski));

   }

catch (PDOException $e) {
    print "Hata!: " . $e->getMessage() . "<br/>";
    die();
	}



}// update end


function insert(array $insert){


	$this->insertname=implode(",",array_keys($insert));
	$this->insertvalue=implode(",",array_fill(0,count($insert),"?"));

try{
	$this->insert = $this->db->prepare("INSERT INTO " . $this->table . " ($this->insertname) VALUES ($this->insertvalue)");
	$this->insert->execute(array_values($insert));

	}

	catch(PDOException $e){

		 print "Hata!: " . $e->getMessage() . "<br/>";
    die();

	}
	


}//insert end



}//class end