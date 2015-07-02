<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
  <title>6c6f6c.net mail</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <?php require_once('includes/menu.php'); ?>

  <img id="logo" src="images/logo.png" alt="" />
  <h1 id="intro-txt">lolmail.org Anonymous Email</h1>

  <div class="container">
    <div class="row">
          <form class="col s12" id="login_form" action="https://vps5542.inmotionhosting.com:2096/login/" method="post" target="_top">
            <div class="row">
              <hr>
              <h3>Log in here</h3>
              <div class="input-field col s12">
                <input id="user" type="text" class="validate" name="user" length="30">
                <label for="user">Username</label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="pass" length="30">
                <label for="password">Password</label>
              </div>
            </div>
          </form>
        <button class="waves-effect waves-light btn green" type="submit" form="login_form" value="Submit">Log in</button>


   </div>

  </div>

  <footer class="page-footer green">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">About </h5>
          <p class="grey-text text-lighten-4">We believe it is vital that essential communication infrastructure be controlled by the people for the people and not corporations or the government.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" target="_blank" href="http://twitter.com/lolmaildotorg">Twitter</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
            <li><a class="white-text" href="#!">support@lolmail.org</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      copyright 2015 - lolmail.org
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
