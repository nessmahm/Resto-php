<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link rel="stylesheet" href="./style.css">

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

 
    <?php function random_3($nbr) {
          $chn = '';
          for ($i=1;$i<=$nbr;$i++)
          $chn .= chr(floor(rand(0, 25)+97));
    return $chn; }?>
    
    <?php  
        $cin=$_FILES["cin"];
      
        if($cin["error"]==0){
            $img_path="src".uniqid(random_3(10));
            if(move_uploaded_file($cin["tmp_name"],$img_path))
                $msg=true; }
       
        else $msg=false;;

    ?>

    <?php  $commande =(int)$_POST["number"]; ?>
    <?php $quantite = (int)file_get_contents ('quantiteSandwitch.txt'); ?>
    <?php if ($quantite>=$commande) : ?>
          <?php $quantite=$quantite-$commande ;   file_put_contents('quantiteSandwitch.txt',$quantite); ?>

    <?php  else :  ?>
          <?php echo "<script> alert_quant({$quantite}, {$commande});</script>"  ?>
    <?php endif ?>

  
  <div class="carte">
      <div class="image">
        <?php if($msg) :?>
         <img src=<?=$img_path?>  />
        <?php else : ?>
          <p> Il ya un probleme dans votre fichier </p>
        <?php endif ?>

      </div>
      <div>
      <p>La commande
          <?=htmlspecialchars($_POST["lastname"]); ?>
          <?=htmlspecialchars($_POST["username"]); ?> 
          de <?= $_POST["number"] ; ?> Sandwitch<?=$commande >1 ? "s" : "" ?> est bien recu ,
          a l'adresse   <?=htmlspecialchars($_POST["adresse"]); ?>
      </p>

      <p>Votre Sandwitch est de type : <?=$_POST["type"]?> 
      
      <p>Ingrediants :
          <?php foreach($_POST["ingrediant"] as $ing): ?>
          <li><?=$ing?></li>
          <?php endforeach ?>
      </p>

      <p>Prix: <?= $commande*4?>dt 

          <?php if ( $commande > 10 ) : ?>
 
          <br>  Vous beneficiez d'une remise de 10% <br></br>
        Le prix final est : 
            <?php $prix = 4 *$commande ; echo $prix - $prix*0.1 ; ?>dt </p>   
            <?php endif; ?>

      </p>

      </div>          
           
  </div>    
</body>
</html>
