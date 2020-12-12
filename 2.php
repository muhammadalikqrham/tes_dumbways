<?php 
 function cariAKU($kalimat,$cariHuruf)
 {
     $tes = str_split($kalimat);
     $a = 0;
     foreach ($tes as $value) 
     {
         if(strtolower($value)== $cariHuruf)
         {
             $a=$a+1;
             
         }
    }
     if($a!=0)
     echo "<b> ".$cariHuruf." Muncul Sebanyak ".$a." Kali </b><br>";
     
}    
      cariAKU("aku calon peserta bootcamp dumbways","a");
       

?>