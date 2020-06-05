

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Titre</title>

  </head>

  <body>

    <table class="table table-striped table-hover">

      <?php
      $d = getcwd();   //dossier courant C:\wamp64\www\alexa\files-explorer'
      $doss_courant = explode(DIRECTORY_SEPARATOR, getcwd());
      // array (size=5)
      //   0 => string 'C:' (length=2)
      //   1 => string 'wamp64' (length=6)
      //   2 => string 'www' (length=3)
      //   3 => string 'alexa' (length=5)
      //   4 => string 'files-explorer' (length=14)

      $dir = scandir($d);
      //var_dump($d);

      foreach ($dir as $value){
        //echo $value . "</br>";

         if( is_dir("$value") ) {
           $chem = $d."/".$value;

           //var_dump($chem);
           echo "<tr>
                <td><i class=\"fas fa-folder x3\"></i></td>
                <td><a href=\"$chem\">$value</a></td>
                </tr>";

                $list_dir[] = array();
                if (!empty($value)) { //&& ($value !== '.') && ($value !== '..')
                  array_push ($list_dir,"$value");
                  var_dump($list_dir);
                }

              }

         if( is_file("$value") ){
           $chem = $d."/".$value;
           var_dump($chem);
           echo "<tr>
                  <td><i class=\"fas fa-file x3\"></i></td>
                  <td><a href=\"$chem\">$value</a></td>
                  <td>size : ".filesize($value)."bytes</td>
                  <td>".fileowner($value)."</td>
                </tr>";
          }

        }
      ?>
    </table>
  </body>
</html>
