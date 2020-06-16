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


//Création du repertoire principal (en dessous du repertoire contenant le fichier index)
$home = "home";
if (!is_dir($home)) {
  mkdir("home");
}
chdir(getcwd() . DIRECTORY_SEPARATOR . $home);

$realpath = "C:\\wamp64\\www\\alexa\\files-explorer";
$d = getcwd(); // variable contenant le chemin courant
$home = "\home"; //racine sert uniquement à l'affichage
$aff = $home;
$fullpath = ""; // chemin variable en fonction de l'élément cliqué

var_dump($d);
var_dump($fullpath);

if( empty($_GET['link']) ){
    $fullpath = $d;
  } else {
    $parent = dirname($fullpath);
    $fullpath = getcwd() . DIRECTORY_SEPARATOR . $_GET['link'];
    $aff =
    var_dump($fullpath);

    if($_GET['link'] === $home){
      $fullpath = $d;
      $aff = $home;
    }
  }
  chdir($fullpath);



  echo "<h1>".$aff."</h1>";//variable d'affichage chemin
  echo '<button><a href="'.$_SERVER['PHP_SELF'].'?link='.$home.'">Home</a></button>'; //revenir à la racine

var_dump($fullpath);

//affichage

if (is_dir($fullpath)){
  $dh = scandir($fullpath);
  //var_dump($dh);
  foreach ($dh as $file){
       var_dump($file);
       if ($file != "." && $file != ".." && $file !== '.git'){  //on affiche que les repertoires différents de . et .., .git
         var_dump($file);
         if (is_dir ($file)) {
          echo "<tr>";
          echo "<td><i class=\"fas fa-folder x3\"></i></td>";
          echo "<td><a href=".$_SERVER['PHP_SELF'].'?link='.rawurlencode($file).">".$file."</a></td>";
          echo "<td>".filesize($file)."bytes</td>";
          echo "<td>".mime_content_type($file)."</td>";
          echo "<td>".fileowner($file)."</td>";
          echo "<td>".filemtime($file)."</td>";
          echo "</tr>";
          }
              else if (is_file ($file)) {
              echo "<tr>";
              echo "<td><i class=\"fas fa-file x3\"></i></td>";
              echo "<td><a href=".$_SERVER['PHP_SELF'].'?link='.rawurlencode($file).">".$file."</a></td>";
              echo "<td>".filesize($file)."bytes</td>";
              echo "<td>".mime_content_type($file)."</td>";
              echo "<td>".fileowner($file)."</td>";
              echo "<td>".filemtime($file)."</td>";
              echo "</tr>";
               }
       }
  }
}



?>

</table>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
