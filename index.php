
<?php
 require_once "fonctions.php";

 $text0='';
 $text='';
 $phrase_correcte=[];
 $phrase_incorrecte=[];
 $phrase_corriger=[];


 if(isset($_POST['envoi']) && isset($_POST['texte'])){
    $text0= $_POST['texte'];
    $text= decoup_phrase($text0);
    
    foreach($text as $value){
        $text=deletes_espace_unitiles($value);
        if(is_phrase_correct($text))   $phrase_correcte[]= $text;
        else $phrase_incorrecte[]=$text;
    }
    if(!is_empty($phrase_incorrecte)){
        foreach($phrase_incorrecte as $value){
           if(!is_Majus($value[0])){
            $value[0]  =invers_car_case($value[0]);
                $phrase_corriger[]= $value;
           }
        }
    }
 //   var_dump($phrase_correcte);
 //  $text= deletes_espace_unitiles($text0);
}
 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
     <form action="" method="post">
        <textarea rows="10" cols="170" style="resize: none" name="texte" ><?= $text0 ?></textarea>
        <input type="submit" name="envoi">
    
     
     <table>
        <tr><?php if( isset($_POST['texte'])){?>
           <th><?= !empty($phrase_correcte) ?"Phrases correctes" : ""?></th>
           <th><?= !empty($phrase_incorrecte) ?"Phrases incorrectes" : ""?></th>
           <th><?= !empty($phrase_corriger) ?"Phrases corrigees" : ""?></th>
        </tr>
        <tr>
            <td><?php if( !empty($phrase_correcte)){ foreach($phrase_correcte as $val){?>
                <textarea rows="5" cols="60" style="resize: none" disabled><?= $val;} }?></textarea></td>
            <td><?php if( !empty($phrase_incorrecte)){ foreach($phrase_incorrecte as $value){?>
                <textarea rows="5" cols="60" style="resize: none" disabled><?= $value;}} ?></textarea></td>
            <td> <?php if( !empty($phrase_corriger)){ foreach($phrase_corriger as $valu){?>
                <textarea rows="5" cols="60" style="resize: none" disabled><?="==> ".$valu; }}?></textarea></td>
        </tr>

    </table>
     <br><br>

<?php } ?>
</form>
</body>
</html>
