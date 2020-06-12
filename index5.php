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


$root = "" ; //racine sert uniquement à l'affichage
//$_GET['link']="";
$d = 'C:\wamp64\www\alexa\files-explorer'; // variable contenant le chemin de la racine
$aff = $root . DIRECTORY_SEPARATOR;
$fullpath = $d . DIRECTORY_SEPARATOR; // chemin variable en fonction de l'élément cliqué



var_dump($d);
var_dump($fullpath);
var_dump($_SERVER['PHP_SELF']);

if( empty($_GET['link']) ){
    $fullpath = $d;
  } else {
    $fullpath = $d . DIRECTORY_SEPARATOR . $_GET['link'];
    $aff = $root . DIRECTORY_SEPARATOR . $_GET['link'];
    var_dump($fullpath);
    var_dump($_GET['link']);
  }

  echo "<h1>".$aff."</h1>";//variable d'affichage chemin
  echo '<a href="'.$_SERVER['PHP_SELF'].'?link='.$root.'">Root</a></div>'; //revenir à la racine

var_dump($fullpath);
if (is_dir($fullpath)){
  $dh = opendir($fullpath);
  if($dh !== null ){

     while ( ( $file = readdir($dh) ) !== false ){
       if ($file != "." && $file != ".."){
         if (is_dir ($file)) {
          echo "<tr>
               <td><i class=\"fas fa-folder x3\"></i></td>
               <td><a href=".$_SERVER['PHP_SELF'].'?link='.$file.">$file</a></td>

               </tr>";
              }
              else if (is_file ($file)) {
              echo  "<tr>
                     <td><i class=\"fas fa-file x3\"></i></td>
                     <td><a href=".$_SERVER['PHP_SELF'].'?link='.$file.">$file</a></td>

                     </tr>";
              }
       }
     }
   }
   closedir($dh);
}
// <td>size :".filesize($file)."bytes</td>
// <td>".mime_content_type($file)."</td>
// <td>".fileowner($file)."</td>


?>

</table>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
