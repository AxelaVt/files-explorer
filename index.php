
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta name="author" content="Alexa Vermenot">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Titre</title>

  </head>

  <body>
    <table class="table table-striped table-hover">
      <?php

      if (isset($_POST['selected'])){
        $dir = scandir($_POST['selected']);
        if(chdir($_POST['selected'])){  //si un dossier est sélectionné aller vers ce dossier
          chdir($_POST['selected']);
        }else{
          chdir(getcwd());
        }

      $d = getcwd();   //dossier courant C:\wamp64\www\alexa\files-explorer'
      $dir = scandir($d); //recup ce qu'il y a dans le rep courrant sous forme d'array

      if (!empty($_POST{'envoyer'})) {
        $new_dir = $_POST['New_dir'];
        if(!file_exists($d."/".$new_dir)){
          mkdir($d."/".$new_dir,0777,true);
        }
      }


      //Traitement
        foreach ($dir as $value){  //parcourt l'array
         if( is_dir(realpath("$value"))){   // verif si dossier ==> utiliser realpath
           //$chem = $d.DIRECTORY_SEPARATOR.$value;  // création du chemin rep courant + dossier

           // affiche les directory
           echo "<tr>
                <td><i class=\"fas fa-folder x3\"></i></td>
                <td><form method='POST'><input type='hidden' name='selected' value=".realpath($value)."></td>
                <td><a href=".realpath($value)."><button type='submit'>$value</button></a></form></td>
                <td>size : ".filesize($value)."bytes</td>
                <td>" .mime_content_type($value)."</td>
                <td>".fileowner($value)."</td>
                </tr>";

            }
          }
        }
if (!empty($_POST{'envoyer'})) {
  $new_dir = $_POST['New_dir'];
  if(!file_exists($d."/".$new_dir)){
    mkdir($d."/".$new_dir,0777,true);
  }
}


      ?>

      <form class="" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="text" name="New_dir" value="">
        <input type="submit" id ="envoyer" name="envoyer" value="créer un dossier">
      </form>

    </table>
  </body>
</html>
