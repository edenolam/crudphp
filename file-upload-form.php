<?php
include "partials/header.php";
include "partials/navbar.php";
?>
<div class="wrapper">
    <div class="container-fluid">
        <form action="upload-manager.php" method="post" enctype="multipart/form-data">
            <h2>Upload File</h2>
            <label for="fileSelect">Filename:</label>
            <input type="file" name="photo" id="fileSelect">
            <input type="submit" name="submit" value="Upload">
            <p><strong>Note:</strong> Only .jpg, .jpeg, .gif, .png formats allowed to a max size of 5 MB.</p>
        </form>
    </div>
</div>

<?php
include "partials/footer.php";
?>
