<?php
//exampledot.com for domain

// cPanel info
$cpuser = ''; // cPanel username
$cppass = ''; // cPanel password
$cpdomain = ''; // cPanel domain or IP
$cpskin = '';  // cPanel skin. Mostly x or x2.

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// Default email info for new email accounts
// These will only be used if not passed via URL
$epass = generateRandomString(); // email password

$domain = $_REQUEST['domain'];

switch ($domain) {
    case 0:
        $edomain = 'lolmail.org';
        break;
    case 1:
        $edomain = 'webofchange.co.uk';
        break;
    case 2:
        $edomain = 'anti-network.org';
        break;
    case 3:
        $edomain = '6c6f6c.net';
        break;
}

$equota = 250; // amount of space in megabytes

###############################################################
# END OF SETTINGS
###############################################################

function getVar($name, $def = '') {
  if (isset($_REQUEST[$name]))
    return $_REQUEST[$name];
  else
    return $def;
}

// check if overrides passed
$euser = getVar('user', '');
$epass = getVar('pass', $epass);
$equota = getVar('quota', $equota);

if ($euser != '') {
  $url = "http://$cpuser:$cppass@$cpdomain:2082/frontend/$cpskin/mail/doaddpop.html?email=$euser&domain=$edomain&password=$epass&quota=$equota";
  $result = file_get_contents($url);

  if (strpos($result,'Account Created') !== false) {
    $msg = '<h1 class="center-align" style="color: green;">Account Created</h1>';
    $email = $euser . '@' . $edomain;
    $created = 1;
  } else {
    if (strpos($result,'already exists') !== false) {
      $msg = '<h1 class="center-align" style="color: red;">Account could not be created, an account with that address already exists.</h1>';
    } else {
      $msg = '<h1 class="center-align" style="color: red;">An error occured, please try again.</h1>';
    }
    $created = 0;
  }

}

?>
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
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <ul class="right hide-on-med-and-down">
        <li><a href="https://vps5542.inmotionhosting.com:2096/">Login</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="https://vps5542.inmotionhosting.com:2096/">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>

  <img id="logo" src="images/logo.png" alt="" />
  <h1 id="intro-txt">6c6f6c.net Email Account Creator</h1>

  <div class="container">
    <div class="row">

      <?php
        if($created === 1) {

          echo $msg;
          ?>

          <p>
            Account '<?php echo $email; ?>' created. You can now login to your email here: <a href="https://vps5542.inmotionhosting.com:2096/">Webmail</a>
          </p>

          <p>
            More info on how to set up on mobile devices etc coming in the next few days. If you are familiar with pop set up, just use: mail.6c6f6c.net with your account details.
          </p>

          <p>
            By default have 250GB of space, if you want to upgrade for free to unlimited, please contact us. Password reset options also coming soon.
          </p>

          <?php
        } else {

          echo $msg;

          ?>

          <div class="col s12">
            <h2 id="paralax-overlay" class="center-align">Want a free email account? Then you can have one.<h2>
              <hr>
             <h3>Why 6c6f6c is needed</h3>

    <p>Can you rely on a corporate email provider for confidentiality of your sensitive email communications? Not only do they typically scan and record the content of your messages for a wide variety of purposes, they also concede to the demands of governments that restrict digital freedom and fail to have strict policies regarding their user’s privacy. Not to mention their obviously commercial interests.</p>

     <p>We believe it is vital that essential communication infrastructure be controlled by the people for the people and not corporations or the government.</p>

         <p>We strive to keep our mail as secure and private as we can. We do not log your IP address. (Most services keep detailed records of every machine which connects to the servers. We keep only information which cannot be used to uniquely identify your machine). All your data, including your mail, is stored by 6c6f6c.net in encrypted form. We work hard to keep our servers secure and well defended against any malicious attack. We do not share any of our user data with anyone. We will actively fight any attempt to subpoena or otherwise acquire any user information or logs. We will not read, search, or process any of your incoming or outgoing mail other than by automatic means to protect you from viruses and spam or when directed to do so by you when troubleshooting.</p>
          </div>

          <form class="col s12" name="frmEmail" method="post" id="signUp">
            <div class="row">
              <hr>
              <h3>Sign up here</h3>
              <div class="input-field col s12">
                <input id="user" type="text" class="validate" name="user" length="20">
                <label for="user">Username</label>
              </div>

              <div class="input-field col s12">
                  <select name="domain" required>
                    <option value="0">lolmail.org</option>
                    <option value="1">webofchange.co.uk</option>
                    <option value="2">anti-network.org</option>
                    <option value="3">6c6f6c.net</option>
                  </select>
                <label>Select Address</label>
              </div>
              <div class="input-field col s12">
                <input id="password" type="password" class="validate" name="pass" length="20">
                <label for="password">Password</label>
              </div>
            </div>
          </form>
          <button class="waves-effect waves-light btn green" type="submit" form="signUp" value="Submit">Create Email Account</button>

          <?php
        }
      ?>

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
            <li><a class="white-text" target="_blank" href="http://twitter.com/6c6net">Twitter</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Contact</h5>
          <ul>
            <li><a class="white-text" href="#!">support@6c6f6c.net</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Servers donated by <a target="_blank" href="http://twitter.com/evsec">@evsec</a><br>
      service made by <a target="_blank" href="http://twitter.com/0x00byte">@0x00byte</a>, <a target="_blank" href="http://twitter.com/porthunter">@porthunter</a> and <a target="_blank" href="http://twitter.com/faghack">@faghack</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
