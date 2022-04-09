<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">Brand</a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">Accueil</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Messages</a>
                        <div class="dropdown-menu">
                            <a href="#" class="dropdown-item">Inbox</a>
                            <a href="#" class="dropdown-item">Sent</a>
                            <a href="#" class="dropdown-item">Drafts</a>
                        </div>
                    </div>
                </div>
                <form class="d-flex">
                    <div class="input-group search-box">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Search country...">
                        <div class="result"></div>
                        <button type="button" class="btn btn-secondary"><i class="bi-search"></i></button>
                    </div>
                </form>
                <div class="navbar-nav">
                    <?php
                    if ($_SESSION["loggedin"] = true){
                        echo '<a href="./logout.php" class="btn btn-info">Deconnexion</a>';
                    }else{
                        echo '<a href="./login.php" class="btn btn-light">Connexion</a>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </nav>
</div>
