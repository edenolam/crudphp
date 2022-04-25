<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<?php
include "partials/header.php";
include "partials/navbar.php";
?>
<div class="wrapper_welcome text-center">

    <h1 class="my-5">Bonjour, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bienvenue sur votre site.</h1>
    <p>
        <a href="reset-password.php" class="btn btn-info">Reinitialiser mot de passe</a>
        <a href="logout.php" class="btn btn-danger ml-3">Deconnexion</a>
    </p>
</div>
<?php
include "partials/footer.php";
?>
