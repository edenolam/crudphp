<?php
// Check existence of id parameter before processing further
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = :id";

    if ($stmt = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":id", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if ($stmt->execute()) {
            if ($stmt->rowCount() == 1) {
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

                // Retrieve individual field value
                $name = $row["name"];
                $address = $row["address"];
                $salary = $row["salary"];
            } else {
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    unset($stmt);

    // Close connection
    unset($pdo);
} else {
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}

include "partials/header.php";
include "partials/navbar.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mt-5 mb-3">Enregistrement <?php echo $row["id"]; ?></h1>

                <div class="card" style="width: 30rem;">
                    <img class="card-img-top" src="upload/bague%20gzn%20design.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Carte employé de <?php echo $row["name"]; ?></h5>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Name
                            <span class="badge"><b><?php echo $row["name"]; ?></b></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Adresse
                            <span class="badge"><b><?php echo $row["address"]; ?></b></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Salaire
                            <span class="badge"><b><?php echo $row["salary"]; ?></b></span>
                        </li>
                    </ul>
                    <div class="card-body">
                        <a href="index.php" class="card-link">Retour</a>
                        <a href="update.php?id=<?php echo $row['id']; ?>" class="card-link">Modifier</a>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="card-link">Supprimer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include "partials/footer.php";
?>
