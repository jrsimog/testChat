<?
session_start();

function loginForm(){
    echo '
    <div id="loginform">
        <form action="index.php" method="post">
            <p>Por favor ingrese su nombre para continuar</p>
            <label for="">Nombre:</label>
            <input type="text" name="name" id="name">
           <input type="submit" name="enter" value="Entrar" id="enter">
        </form>
    </div>
    ';
}
if (isset($_POST['enter'])) {

    if ($_POST['name']!="") {
        $_SESSION['name'] = stripcslashes(htmlspecialchars($_POST['name']));
    
    }
    else{
        echo ' <span class="error"> Por favor ingrese su nombre</span>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>Chat Consumidores</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!-- Material Design fonts -->
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700" type="text/css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <!-- Bootstrap -->
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap-material-design.css">
    <link type="text/css" rel="stylesheet" href="css/ripples.min.css">
    <link href="//fezvrasta.github.io/snackbarjs/dist/snackbar.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="js/jquery-2.2.2.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
    <script src="js/material.min.js"></script>
    <script src="js/ripples.min.js"></script>
    <script src="js/scripts.js"></script>

    <link rel="stylesheet" href="css/styles.css">
    
    
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
    <?
    if (!isset($_SESSION['name'])) {
 loginForm();
}
else{
?>
  <div id="wrapper">
      <div id="menu">
          <p class="welcome">Bienvenido <b> <? echo $_SESSION['name'];?>
              </b>
                 </p>
                      <p class="logout">
                          <a href="#" id="exit">Salir Chat</a>
                      </p>
                      <div style="clear:both"></div>
              </div>
              <div id="chatbox">
                  <?
                  if (file_exists("log.html") && filesize("log.html")>0){
                      $handle = fopen("log.html", "r");
                      $contents = fread($handle,filesize("log.html"));
                      fclose($handle);
                      echo $contents;
                  }
                  ?>
              </div>
              <form name="message" action="">
                  <input class="form-control" name="usermsg" id="focusedInput1" type="text" size="63">
                  <button type="button" id="submitmsg" class="btn btn-fab btn-fab-mini">
                  <i class="material-icons">send</i>
                  </button>
                  <!--<input type="text" name="usermsg" id="usermsg" >-->
              </form>
  </div>
    <?
}
 $data = "El Chat Test";
    var_dump($data);
if (isset($_GET['logout'])) {
$fp = fopen("log.html", 'a');
fwrite($fp, "<div class='msgln'><i>Usuario ".$_SESSION['name']." ha salido del Chat</i><br></div>");
                     fclose($fp); 
                     session_destroy();    
                     header("location: index.php");      
}
    ?>
    
 
<script src="//cdnjs.cloudflare.com/ajax/libs/noUiSlider/6.2.0/jquery.nouislider.min.js"></script>
</body>
</html>