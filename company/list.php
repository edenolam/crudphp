<?php
include "../partials/header.php";
include "../partials/navbar.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="mt-5 mb-3 clearfix">
                    <h2 class="pull-left">Liste des compagnies</h2>
                    <a href="../company/create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Ajouter un compagnie</a>
                </div>
                <?php
                // Include config file
                require_once "config.php";

                // Attempt select query execution
                $sql = "SELECT * FROM company";
                if ($result = $pdo->query($sql)) {
                    if ($result->rowCount() > 0) {
                        echo '<table class="table table-bordered table-striped">';
                        echo "<thead>";
                        echo "<tr>";
                        echo "<th>#</th>";
                        echo "<th>Nom</th>";
                        echo "<th>Action</th>";
                        echo "</tr>";
                        echo "</thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['name'] . "</td>";
                            echo "<td>";
                            echo '<a href="read.php?id=' . $row['id'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                            echo '<a href="update.php?id=' . $row['id'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                            echo '<a href="delete.php?id=' . $row['id'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "</tbody>";
                        echo "</table>";
                        // Free result set
                        unset($result);
                    } else {
                        echo '<div class="alert alert-danger"><em>Aucun enregistrement.</em></div>';
                    }
                } else {
                    echo "Oops!. Veuillez r????sseyer plus tard.";
                }

                // Close connection
                unset($pdo);

                ?>
            </div>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>
