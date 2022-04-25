<?php
// Include config file
require "config.php";

// Define variables and initialize with empty values
$name = "";
$name_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    $input_name = trim($_POST["name"]);
    if (empty($input_name)) {
        $name_err = "Please enter a name.";
    } elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
        $name_err = "Please enter a valid name.";
    } else {
        $name = $input_name;
    }

    // Check input errors before inserting in database
    if (empty($name_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO company (name) VALUES (:name)";

        if ($stmt = $pdo->prepare($sql)) {
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(":name", $param_name);

            // Set parameters
            $param_name = $name;

            // Attempt to execute the prepared statement
            if ($stmt->execute()) {
                // Records created successfully. Redirect to landing page
                header("location: ../company/list.php");
                exit();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Close statement
        unset($stmt);
    }

    // Close connection
    unset($pdo);
}

include "../partials/header.php";
include "../partials/navbar.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mt-5">Créer</h2>
                <p>Please fill this form and submit to add company record to the database.</p>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group">
                        <label>
                            Nom de la compagnie
                            <input type="text" name="name"
                                   class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>"
                                   value="<?php echo $name; ?>">
                        </label>
                        <span class="invalid-feedback"><?php echo $name_err; ?></span>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                    <a href="../index.php" class="btn btn-secondary ml-2">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
include "../partials/footer.php";
?>
