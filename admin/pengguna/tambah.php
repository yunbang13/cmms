<?php
// capaian mesti melalui page admin
defined( '_UMPORTAL_ADMIN' ) or die( 'Akses tidak dibenarkan !' );
?>
<script "text/javascript" src="jscript/semakpengguna.js"></script>
<?php
 global $dbi;
	
 if (isset($_REQUEST["txt_login"]))
   $login=$_REQUEST["txt_login"];
 else
   $login="";  
 if (isset($_REQUEST["txt_password"]))
   $password=$_REQUEST["txt_password"];
 else
   $password="";  
 if (isset($_REQUEST["txt_confirmpassword"]))
   $confirmpassword=$_REQUEST["txt_confirmpassword"];
 else
   $confirmpassword="";  
 if (isset($_REQUEST["flg"]))
   $flg=$_REQUEST["flg"];
 else
   $flg="";  
 if (isset($_REQUEST["txt_name"]))
   $name=$_REQUEST["txt_name"];
 else
   $name="";  
 if (!isset($flg))
   $flg=0;

 if ($flg<>0){
   $bahagian=$_REQUEST["txt_bahagian"];
   $login=$_REQUEST["txt_login"];
   $nama=$_REQUEST["txt_name"];
 }

 
 ?>
<form name="frmpengguna" method="post" action="admin.php?module=pengguna&task=simpan">
<table id="form_table_outer" width="70%">
  <tr><td class="form_table_header">Tambah Pengguna</td></tr>
  <tr><td>
<table id="form_table_inner" width="100%" border="0" bgcolor="#EEF3FF" cellpadding="2" cellspacing="0">
 
  <tr>
    <td width="20%">Login</td>
    <td ><input name="txt_login"  type="text" size="20" maxlength="20" value="<?php echo $login; ?>"></td>
  </tr>
    <tr>
    <td >Nama</td>
    <td ><input name="txt_name"  type="text" size="50" maxlength="50" value="<?php echo $name; ?>"></td>
  </tr>
     <tr>
      <td>Bahagian</td>
      <td><select name="txt_bahagian" onChange="document.frmpengguna.action='admin.php?module=pengguna&flg=1&task=tambah';document.frmpengguna.submit();" >
	      <option value="">-- Pilih Bahagian --</option>
          <?php
	$query = "SELECT KOD_BAH,NAMA_BAH FROM tbl_bahagian order by NAMA_BAH ";
    $result = sql_query($query,$dbi);
	$num_rows = sql_num_rows($result);
		
	if($num_rows > 0) {
	    while($data=sql_fetch_array($result,$dbi)){ 
		  $r_id = $data["KOD_BAH"];
		  $name = $data["NAMA_BAH"];
		  if ($bahagian==$r_id)
	        echo "<option selected value=\"$r_id\">$name</option>";
		  else
	        echo "<option value=\"$r_id\">$name</option>";
		}
	} 
	?>
        </select></td>
     </tr>
     <tr>
      <td>Role</td>
      <td><select name="txt_role" >
	      <option>-- Pilih Role --</option>
          <?php
	$query = "SELECT id,name FROM role order by id ";
    $result = sql_query($query,$dbi);
	$num_rows = sql_num_rows($result);
		
	if($num_rows > 0) {
	    while($data=sql_fetch_array($result,$dbi)){ 
		  $id = $data["id"];
		  $name = $data["name"];
		  if ($role==$id)
	        echo "<option selected value=\"$id\">$name</option>";
		  else
	        echo "<option value=\"$id\">$name</option>";
		}
	} 
	?>
        </select></td>
     </tr>
  <tr>
    <td >Katalaluan</td>
    <td ><input name="txt_password"  type="password" size="20" maxlength="20" value="<?php echo $password; ?>"></td>
  </tr>
  <tr>
    <td >Sahkan Katalaluan</td>
    <td ><input name="txt_confirmpassword"  type="password" size="20" maxlength="20"value="<?php echo $confirmpassword; ?>"></td>
  </tr>

  <tr>
    <td colspan="2" >
	  <input name="dbtrans" type="hidden" value="0">
	  <input name="Simpan" type="submit" value="Simpan" onClick="return semakpengguna();">
	  <input name="Kembali" type="Button" value="Kembali" onclick="location.href='admin.php?module=pengguna';">
	</td>
  </tr></table>
    </td></tr></table>
</form>
