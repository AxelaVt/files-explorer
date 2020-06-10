
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Alexa Vermenot">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Titre</title>
    <title>Home</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>

  <body>

  <table class="table table-striped table-hover">
  <?php

  //redirige vers le dossier séletionné
  if(isset($_POST['selected'])){
    $dir = scandir($_POST['selected']);
    if(chdir($_POST['selected'])){  //si un dossier est sélectionné, aller vers ce dossier
      chdir($_POST['selected']);
    }else{
      chdir(getcwd());
    }
    var_dump($_POST['selected']);
  }

  $d = getcwd();
  var_dump($d);

  if (!empty($_POST['envoyer'])) {
    $dy = $d;
    $new_dir = $_POST['New_dir'];
    $new_dir = trim($new_dir);  //supprime les espaces
    var_dump($new_dir);
    if(!file_exists($dy.DIRECTORY_SEPARATOR.$new_dir)){
      echo $dy.DIRECTORY_SEPARATOR.$new_dir;
      mkdir($dy.DIRECTORY_SEPARATOR.$new_dir,0777,true);
    }
  }

    $dir = scandir($d); //recup ce qu'il y a dans le rep courrant sous forme d'array

    //Traitement et affichage
      foreach ($dir as $value){  //parcourt l'array
       if( is_dir(realpath("$value"))){   // verif si dossier ==> utiliser realpath
         //$chem = $d.DIRECTORY_SEPARATOR.$value;  // création du chemin rep courant + dossier

         // affiche les directory
         echo "<tr>
              <td><i class=\"fas fa-folder x3\"></i></td>
              <td><form method='POST'><input type='hidden' name='selected' value=".realpath($value).">
              <a href=".realpath($value)."><button type='submit'>$value</button></a></form></td>
              <td>size : ".filesize($value)."bytes</td>
              <td>" .mime_content_type($value)."</td>
              <td>".fileowner($value)."</td>
              </tr>";

          }

           if( is_file(realpath("$value")) ){
            // affiche les fichier
            echo "<tr>
                 <td><i class=\"fas fa-file x3\"></i></td>
                 <td><form method='POST'><input type='hidden' name='selected' value=".realpath($value)."/>
                 <a href=".realpath($value).">$value</a></form></td>
                 <td>size :".filesize($value)."bytes</td>
                 <td>".mime_content_type($value)."</td>
                 <td>".fileowner($value)."</td>
                 </tr>";

             }
        }
    ?>

    <form class="" action="" method="post">
      <?//php echo $_SERVER['PHP_SELF'];?>
      <input type="text" name="New_dir" placeholder="créer">
      <!-- <input type="text" name="Supp_dir" placeholder="supprimer"> -->
      <input type="submit" id ="envoyer" name="envoyer" value="envoyer">
    </form>


  </table>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
