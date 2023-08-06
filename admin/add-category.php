<?php include "header.php";

if ($_SESSION['user_role'] == '0') {
    header('Location: http://localhost/Pondit%20Code/news-site/admin/post.php');
}

?>

<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="admin-heading">Add New Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <!-- Form Start -->

                <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" autocomplete="off">
                    <div class="form-group">
                        <label>Category Name</label>

                        <input type="text" name="cat" class="form-control"
                            placeholder="Category Name" required>
                    </div>
                    <input type="submit" name="save" class="btn btn-primary" value="Save"
                        required />
                </form>

                <!-- /Form End -->
                <?php
                if (isset($_POST['save'])) {
                    include "config.php";
                    $catName = mysqli_real_escape_string($conn, $_POST['cat']);

                    $sql = "SELECT category_name FROM category WHERE category_name='{$catName}'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        echo '<p style="color: red;">This category name is exits</p>';

                    } else {
                        $sql1 = "INSERT INTO category(category_name) VALUE('$catName')";
                        if (mysqli_query($conn, $sql1)) {
                            header('Location:http://localhost/Pondit%20Code/news-site/admin/category.php');
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>