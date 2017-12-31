<?php 
	require('utils/lang.php');
	require('action/LoginAction.php');

	$action = new LoginAction();
	$action->execute();

    include("partials/light-header.php");
?>


<!-- LOGIN FORM -->
   <div class="container">
        <div class="card card-container">
            <h1 class="console-title">Classique console</h1>
            <?php 
				if ($action->wrongLogin) {
					?>
					<div class="error-div"><strong>Erreur : </strong>Connexion erronée</div>
					<?php
				}
                if ($action->loggedOut) {
					?>
					<div class="logout-div"><strong>Vous êtes déconnectés</div>
					<?php
				}
			?>
            <form action="login.php" method="post" class="form-signin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="console-username" class="form-control" placeholder="Username" required autofocus>
                <input type="password" name="console-password" class="form-control" placeholder="Password" required>
                <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Sign in</button>
            </form><!-- /form -->
        </div><!-- /card-container -->
    </div><!-- /container -->
      

  </div>
</body>