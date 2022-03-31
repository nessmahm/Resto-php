
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
<script>

  function alert_quant(quantite,commande){
    if (quantite < commande ){ 
      if ( quantite >0 ){
      alert(" il n'y a que  de " + quantite + " Sandwitch(s)");
      }
      else {
      alert(" il n'y a plus de Sandwitchs");
      }
    }    
 }

</script>

<div class="col-4">      

    <span class="border"> 
    <?php
 function random_3($nbr) {
  $chn = '';
  for ($i=1;$i<=$nbr;$i++)
      $chn .= chr(floor(rand(0, 25)+97));
      return $chn;
     }
?>
    <ul> 
    &#10004;
        <?php  
    
    $cin=$_FILES["cin"];
    if($cin["error"]==0){
      
      move_uploaded_file($cin["tmp_name"],"src".uniqid(random_3(10)));
      echo " votre fichier a bien été téléchargé "; }
      else "il y a un probleme dans votre fichier ";
    ?>
    </li>
    <?php  $commande =(int)$_POST["number"]; ?>
  
    <li> La commande
    <?=htmlspecialchars($_POST["lastname"]); ?>  <?=htmlspecialchars($_POST["username"]); ?> 
    de <?= $_POST["number"] ; ?> Sandwitch<?=$commande >1 ? "s" : "" ?> est bien recu ,
    a l'adresse   <?=htmlspecialchars($_POST["adresse"]); ?>     
    </ul>

       <?php $quantite = (int)file_get_contents ('quantiteSandwitch.txt'); ?>
    
       <?php if ($quantite>=$commande) : ?>
        
        <?php $quantite=$quantite-$commande ;   file_put_contents('quantiteSandwitch.txt',$quantite); ?>

 

          <ul> Votre Sandwitch :
              <br>      
        <li> type : <?=$_POST["type"]?> </li>
        Ingrediants :
        <?php foreach($_POST["ingrediant"] as $ing): ?>
          <li><?=$ing?></li>
          <?php endforeach ?>

        </ul>
        
    Prix :<?= $commande*4?>dt 

          <?php if ( $commande > 10 ) : ?>
           
            <p>  Vous beneficiez d'une remise de 10% <br>
           Le prix final est : 
            <?php $prix = 4 *$commande ; echo $prix - $prix*0.1 ; ?>dt </p>   
           
            <?php endif; ?>
         
          <?php  else :  ?>
            <?php echo "<script> alert_quant({$quantite}, {$commande});</script>"  ?>
            <?php endif ?>

            
          
    </span>
    </div>
    </div>

    </body>
</html>
