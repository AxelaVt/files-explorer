<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <meta name="author" content="Alexa Vermenot">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/fontawesome.min.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/solid.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Titre</title>

  </head>

<body>



  <table>
  <tr class:"parent">
    <td id="parent">
      <a href="C:\wamp64\www\alexa\files-explorer\repertoire_parent">Parent</a>
      <i class="fas fa-folder x3"></i>
    </td>
    <?php
    $d = getcwd();
    chdir('/files-explorer/repertoire_parent');
    //$d = dir(".");
    $d = getcwd();
    var_dump($d);
    echo "Pointeur: ".$d->handle."<br>\n";
    echo "Chemin: ".$d->path."<br>\n";
    while($entry = $d->read()) {?>
      <td><?php echo $entry."<br>\n";?></td><?php
    }
    $d->close();?>
  </tr>

  <tr class:"enfant">
    <td id="enfant"><a href="C:\wamp64\www\alexa\files-explorer\repertoire_parent>repertoire_enfant1"</a><i class="fas fa-folder x3"></td>
  </tr>

  </table>


<?php

//chmod("/files-explorer/repertoire_parent/repertoire_enfant1", 0644);

// dossier courant
echo getcwd() . "\n";

chdir('/files-explorer/repertoire_parent');

// dossier courant
echo getcwd() . "\n";


?>

<p>
<!-- getcwd()Retourne le nom (chaîne de caractères) du dossier en cours

chdir($str)Change de dossier courant pour aller en $str, retourne true en cas de succès ou false si échec

opendir($str)Ouvre le dossier défini par le chemin $str et retourne un pointeur vers ce dossier si succès, ou bien false si échec

closedir($d)Ferme le dossier identifié par le pointeur $d

readdir($d)Lit une entrée du dossier défini par le pointeur $d : retourne une chaîne de caractères contenant le nom de cette entrée

rewinddir($d)Remet à zéro le pointeur interne de parcours du dossier identifié par le pointeur $d -->

</p>

</body>
</html>





<script>


$(document).ready(function(){
  $('#parent').click(function(){
    //$('i').removeClass('fas fa-folder-open');

    if ($('#parent>i').hasClass('fa-folder x3')===true) {
        $('#parent>i').removeClass('fa-folder x3');
        $('#parent>i').addClass('fa-folder-open x3');
    }else{
      $('#parent>i').removeClass('fa-folder-open x3');
      $('#parent>i').addClass('fa-folder x3');
    }
  })
});

$(document).ready(function(){
  $('#enfant').click(function(){

    if ($('#enfant>i').hasClass('fa-folder x3')===true) {
        $('#enfant>i').removeClass('fa-folder x3');
        $('#enfant>i').addClass('fa-folder-open x3');
    }else{
      $('#enfant>i').removeClass('fa-folder-open x3');
      $('#enfant>i').addClass('fa-folder x3');
    }
  })
});

</script>
