<?php include "header.php"; ?>
<?php
if (isset($_POST['sumbit'])) {
    include 'config.php';

    $cat_Id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $catName = mysqli_real_escape_string($conn, $_POST['cat_name']);

    $sql2 = "UPDATE category SET category_name = '$catName' WHERE category_id = $cat_Id";

    if (mysqli_query($conn, $sql2)) {
        header('Location: http://localhost/Pondit%20Code/news-site/admin/category.php');
    }
}

?>


<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="adin-heading"> Update Category</h1>
            </div>
            <div class="col-md-offset-3 col-md-6">
                <?php
                include 'config.php';
                $cat_Id = $_GET['id'];

                $sql = "SELECT * FROM category WHERE category_id= {$cat_Id}";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {


                        ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <input type="hidden" name="cat_id" class="form-control"
                                    value="<?php echo $row['category_id'] ?>" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="cat_name" class="form-control"
                                    value="<?php echo $row['category_name'] ?>" placeholder="" required>
                            </div>
                            <input type="submit" name="sumbit" class="btn btn-primary" value="Update"
                                required />
                        </form>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>