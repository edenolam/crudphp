<?php
// Process delete operation after confirmation
if (isset($_POST["id"]) && !empty($_POST["id"])) {
    // Include config file
    require_once "config.php";

    // Prepare a delete statement
    $sql = "DELETE FROM employees WHERE id = :id";


    if ($statement = $pdo->prepare($sql)) {
        // Bind variables to the prepared statement as parameters
        $statement->bindParam(":id", $param_id);

        // Set parameters
        $param_id = trim($_POST["id"]);

        // Attempt to execute the prepared statement
        if ($statement->execute()) {
            // Records deleted successfully. Redirect to landing page
            header("location: ../index.php");
            exit();
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    unset($statement);

    // Close connection
    unset($pdo);
} else {
    // Check existence of id parameter
    if (empty(trim($_GET["id"]))) {
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}

include "../partials/header.php";
include "../partials/navbar.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5 mb-3">Delete Record</h2>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="alert alert-danger">
                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                        <p>Are you sure you want to delete this employee record?</p>
                        <p>
                            <input type="submit" value="Yes" class="btn btn-danger">
                            <a href="../index.php" class="btn btn-secondary ml-2">No</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>
