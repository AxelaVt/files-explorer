

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


            <!-- <div class="panel-heading">
                <a data-toggle="collapse" href="#collapse1">Collapsible panel</a>
            </div>
            <div id="collapse1" class="panel-collapse collapse">

            </div> -->

      <?php
      $d = getcwd();
      $dir = scandir($d);
      //var_dump($dir);

      foreach ($dir as $value){
        //echo $value . "</br>";

         if( is_dir("$value") ) {
           echo "<tr class=\"panel-heading\">
                <a data-toggle=\"collapse\" href=\"#collapse1\"></a>
                <td><i class=\"fas fa-folder x3\"></i></td>
                <td><a data-toggle=\"collapse\" href=\"#collapse1\"></a>$value</td>
                </tr>";

                $list_dir[] = array();
                if (!empty($value) && ($value !== '.') && ($value !== '..') ) {
                  array_push ($list_dir,"$value");
                  //var_dump($list_dir);
                }

              }
              $list_dir = array_filter($list_dir);
              //var_dump($list_dir);

              foreach ($list_dir as $val) {
                //var_dump($val);
                //var_dump($d);
                $path = $d."/".$val;
                var_dump($path);
                $new_path = chdir($path);
                var_dump($new_path);
                $dc = getcwd();
                $dirc = scandir($dc);
                var_dump($dirc);

                if( is_dir("$val") ){
                  echo "<tr id=\"collapse1\" class=\"panel-collapse collapse\">
                       <td><i class=\"fas fa-folder x3\"></i></td>
                       <td><a data-toggle=\"collapse\" href=\"#collapse11\"></a>$val</td>
                       </tr>";
                       $list_dir_n1[] = array();
                         if (!empty($val) && ($val !== '.') && ($val !== '..') ) {
                         array_push ($list_dir_n1,"$val");
                         var_dump($list_dir);
                       }
                }

                if( is_file("$val") ){
                  echo "<tr>
                         <td><i class=\"fas fa-file x3\"></i></td>
                         <td><a href:\"$val\">$val</td>
                         <td> size : ".filesize($val)." bytes
                       </tr>";
                 }
              }



         if( is_file("$value") ){
           echo "<tr>
                  <td><i class=\"fas fa-file x3\"></i></td>
                  <td><a href:\"$value\">$value</td>
                  <td> size : ".filesize($value)." bytes
                </tr>";
          }
        }



      ?>
    </table>
  </body>
</html>
