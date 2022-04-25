<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a href="#" class="navbar-brand"><img src="" alt=""></a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="#" class="nav-item nav-link active">Accueil</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../company/create.php">ajouter une compagnie</a>
                            <a class="dropdown-item" href="../department/create.php">ajouter un departement</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li>
                </div>
                <form class="d-flex">
                    <div class="input-group search-box">
                        <input type="text" autocomplete="off" class="form-control" placeholder="Recherche employé...">
                        <div class="result"></div>
                        <button type="button" class="btn btn-secondary"><i class="bi-search">recherche</i></button>
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
