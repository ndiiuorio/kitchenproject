
<nav class="navbar navbar-expand-lg navbar-light bg-black">
  <a class="navbar-brand" href="/"><img id="navlogo" src="/assets/files/kitchen_logo.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>


    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/signup.php">Sign Up</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/login.php">Login</a>
              </li>
        <?php

            if( $_SESSION['user_logged_in'] ){
                $u = new User;
                $user = $u->get_by_id($_SESSION['user_logged_in']);
        ?>
                <li class="nav-item">
                  <a class="nav-link" href="/recipes/index.php">Recipes</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="/profile.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Welcome <?=$user['firstname']?>
                    </a>


                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/profile.php">My Profile</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/users/logout.php">Logout</a>
                    </div><!-- .dropdown-menu-->
                </li>
        <?php } ?>

    </ul>

  </div>
</div> <!-- #navbarSupportedContent -->
</nav>
