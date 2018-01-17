<?php
    header("content-type: text/html; charset=utf-8");
    header ("Expires: Wed, 21 Aug 2013 13:13:13 GMT");
    header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
include('../../../libs/config_omfs.php');



   $data = $_GET['data'];
    $val = $_GET['val'];

       
    
          if ($data=='prov_name') { 
              echo "<select name='prov_name' class='form-control' onChange=\"dochange('amphoe_name', this.value,this.form.submit())\">";
              echo "<option value=''>- - เลือกทั้งหมด - -</option>\n";
              $result=pg_query("select pv_tn,pv_code from fire_archive GROUP BY pv_tn,pv_code order by pv_tn asc");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[pv_tn]\" >$row[pv_tn]</option>" ;
              }
         } else if ($data=='amphoe_name') {
              echo "<select name='amphoe_name' class='form-control' onChange=\"dochange('tambon_name', this.value,this.form.submit())\">";
              echo "<option value=''>- - เลือกทั้งหมด - -</option>\n";                             
              $result=pg_query("SELECT ap_tn,ap_code FROM fire_archive WHERE pv_tn= '$val' GROUP BY ap_tn,ap_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[ap_tn]\" >$row[ap_tn]</option> " ;
              }
         } else if ($data=='tambon_name') {
              echo "<select class='form-control' name='tambon_name' onChange=\"this.form.submit();\">\n";
              echo "<option value=''>- - เลือกทั้งหมด - -</option>\n";
              $result=pg_query("SELECT tb_tn,tb_code FROM fire_archive WHERE ap_tn = '$val' GROUP BY tb_tn,tb_code");
              while($row = pg_fetch_array($result)){
                   echo "<option value=\"$row[tb_tn]\" >$row[tb_tn]</option> \n" ;
              }
         }



  
         echo "</select>\n";
  
   
?>  