<!DOCTYPE>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Site CVVEN - Réservation">

    <link href="https://fonts.googleapis.com/css2?family=Manrope&display=swap" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="<?= base_url("css/design1.css") ?>">


    <link rel="shortcut icon" href="../img/icon.webp">

    <title>Votre profile</title>
  </head>
  <body id="haut">
      <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <?= anchor("Dashboard",'<img src="'.base_url("img/icon.webp").'" alt="logo">',"class = 'navbar-brand'")?>

        <!--<a class="navbar-brand" href="../index.php">
        <img src=" alt="logo">CVVEN Jura</a>
      -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
            
          <li class="nav-item">
<div class="dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false" src=("img/icon.webp")>
          <img src="../img/user.png" style="width:18px;">

</a> <!-- lien -->
      <div class="dropdown-menu">  <?php $session = session();?>
          
        <?php echo anchor("Dashboard/dash", $session->get('user_name'), "class = 'dropdown-item'")?>
        <?php echo anchor("Login/logout","Déconnexion","class = 'dropdown-item'")?>
        
        
      </div>
    </div>
          </li>

        </ul>
        
      </div>
    </nav>
<!-- HEADER -->
<header class="container-fluid">

  <div>

    <div class="col-md-8" style="margin-left: 4rem;">

      
      <br>
      <br>  
      <h2><strong>Votre profile</strong></h2>
      <h4>Vous pouvez ici changer votre mot-de-passe.</h4>


    </div>
    </div>

<br>
<br>
<br>
<br>

<div class="container ml-1">
    <form action="/codeigniter1/public/param/param" method="POST">
       
            <div class="row w-75 p-3">
              <div class="col">
                
        
             
                  
                  

                 
                
                    <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="InputForPassword">
                    </div>
                  
                  <div class="mb-3">
                        <label for="InputForPassword" class="form-label">Nouveau mot de passe</label>
                        <input type="password" name="newpassword" class="form-control" id="InputForPassword">
                    </div>
                    <button type="submit" class="btn btn-primary">Modifier</button>
  
                    <br>
                    <br>
                    <?php if(session()->getFlashdata('msg')):?>
                    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
                <?php endif;?>

        
          
                  
                  
              

        
        
          
      </form>
    </div>
                

    <?php

      if(!empty ($_GET['erreur'])) {

        switch ($_GET['erreur']) {
          case '1':
            echo('<p>Vous n\'avez pas entré une adresse mail ou un numéro de téléphone correct. </p>');
            break;

          case '2':
            echo('<p>Vos e-mails ou vos numéros de téléphone ne correspondent pas. </p>');
            break;

            
        }
      }
    
    ?>

    
</header>  

        
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>







    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>



  </body>
</html>