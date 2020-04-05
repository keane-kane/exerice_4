<?php
 require_once "const.php"; 
  function long_chaine($chaine){
    $i=0;
     while(!empty($chaine[$i])){    
          $i++;
      }
      return $i;
    }
    function is_empty($chaine){
      if(long_chaine( $chaine) ==0) return true;
  return false;
  }
  //function qui teste si une caractere est en majuscule
  function is_Majus($car){
    if($car >= 'A'&& $car<='Z') return true;
  }
 //inverser la case
 function invers_car_case($car){
  $min ="a";
  $maj ="A";
     if(is_car_alpha($car)!=true){
        return $car;
      }else{
          for($i= 0; $i<26 ; $i++){
             if($min===$car){
                  return $maj;
              } elseif($maj===$car) {
                   return $min;
              } 
              $min++;
              $maj++;
           }
        }
  }
  //teste terminaison
  function Termine($car){
    if($car =='.' or $car =='!' or $car =='?' ) return true;
    return false;
  }
 //function testant si une caractere est numerique
 function is_car_numeric($num){
  if($num>="0" && $num<="9"){
  return true;} 
  return false;
}
 //function testant si une caractere est alphabetique
function is_car_alpha($alpha){
      if(long_chaine($alpha)==1 && ($alpha >='a'&& $alpha <='z')|| ($alpha >='A'&& $alpha <='Z'))
        return true;
    return false;
}
//function testant si une chaine est alphabetique
function is_chaine_alpha($strg){

for($i = 0; $i<long_chaine($strg); $i++){
  if(!is_car_alpha($strg[$i])) return false;
}
return true;
}
//function testant si une chaine est alphabetique
function is_chaine_numeric($strg){
  for($i = 0; $i<long_chaine($strg); $i++){
    if(!is_car_numeric($strg[$i])) return false;
   }
return true;
}
//caratere present dans une chaine
function is_car_present_in_chaine($st,$strg){

for($i = 0; $i<long_chaine($strg); $i++){
  if(($strg[$i])== $st) return true;
}
return false;
}
function is_phrase_correct($phrase){
  $i=0;
     if((is_Majus($phrase[$i]) || is_car_numeric($phrase[$i])) && Termine($phrase[long_chaine($phrase)-1])){
         return true;
     } else return false;
}

//decouper  un texte en phrases
function decoup_phrase($text){
    $phrases= [];
    $ph='';
    $i=0;
      while($i<long_chaine($text)){
        if(isset($text[$i])&& $i>0) {
          if(is_car_numeric($text[$i-1]) && $text[$i]=="." && is_car_numeric($text[$i+1]) ){
             $ph.=$text[$i];  
             $i++;}
          }
           if(!Termine($text[$i])) $ph.=$text[$i];
          else{ 
          //recuper la phrase (=$ph) et la ponctuation (.=$text[$i])
            $phrases[]= $ph.=$text[$i];
            $ph='';
          }
        $i++;
      }
  return $phrases;
}
  //suprimer des espace de devant et de derrier
  
  function delete_spc_before_after($chaine){
    $debut=0;
    $fin=long_chaine($chaine)-1;
    $newChaine = '';
       if($chaine==''){ return $chaine; }
      while ($chaine[$debut]==' '){
        $debut++; 
        if(!isset($chaine[$debut])){
            return '';
        } 
    }

    while ($chaine[$fin]==' '){ $fin--; }

    for ($i=$debut; $i <=$fin ; $i++) { 
        $newChaine.=$chaine[$i];
    }
    return $newChaine;
}
function print_error($tab){
  
}

function deletes($phs){
  $i=0 ;
  $ph="";
  $pattern  = '%\s+%';
  $replacement = " ";
    $phs= preg_replace($pattern,$replacement,$phs);
    while (!empty($phs[$i])) {
      if ($phs[$i]==" " && ($phs[$i+1]=="'" or $phs[$i+1]==".")){
          $ph.= preg_replace($pattern,"",$phs[$i]);

      }elseif($phs[$i]==" " && $phs[$i-1]=="'"){
        // ne fait rien ndandite
      //  $ph.= preg_replace($pattern,"",$phs[$i+2]);
      }
       else $ph.=$phs[$i];
       $i++;
    }
    return $ph;
 }
  
function deletes_espace_unitiles($phs){
  $i=0 ;
  $ph="";
  $pattern  = '%\s+%';
  $replacement = " ";
     //suprimer des espace de devant et de derrier
     $phs= delete_spc_before_after($phs);

    //supression des espaces multiples
    $phs= preg_replace($pattern,$replacement,$phs);

     //supression des espaces avant une pontuation  et/ou apres une apostrophe 
    while (!empty($phs[$i])) {
      if ($phs[$i]==" " && ($phs[$i+1]=="'" or Termine($phs[$i+1]))){
          $ph.= preg_replace($pattern,"",$phs[$i]);

      }elseif($phs[$i]==" " && $phs[$i-1]=="'"){
        // ne fait rien ndandite
      //  $ph.= preg_replace($pattern,"",$phs[$i+2]);
      }
       else $ph.=$phs[$i];
       $i++;
    }
    return $ph;
 }
