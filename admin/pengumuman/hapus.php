<?php
// capaian mesti melalui page admin
defined( '_UMPORTAL_ADMIN' ) or die( 'Akses tidak dibenarkan !' );

 global $dbi;

 function susun($ordering)
 {
 
  global $dbi;
  $query = "SELECT id,ordering FROM announcement where ordering > $ordering order by ordering ";
 //echo $query."<br>";
  $result = sql_query($query,$dbi);
  while ($data=sql_fetch_array($result,$dbi)) {
     $id=$data["id"];
	 $ord=$data["ordering"];
     $ord--;		
	 $query="update announcement set ordering=". $ord ." where id=$id";

	 sql_query($query,$dbi);  
	 //echo $query."<br>";
  }
} //function susun  
 
 $id=$_GET["id"];
  $query = "SELECT ordering FROM announcement where id=$id ";
  $result = sql_query($query,$dbi);
  $data=sql_fetch_array($result,$dbi);
  $ordering=$data["ordering"];
  susun($ordering);   

 sql_query("delete from announcement where id='$id'",$dbi);
 pageredirect("admin.php?module=pengumuman");
?> 
