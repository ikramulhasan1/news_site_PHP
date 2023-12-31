<?php include "header.php";


if ($_SESSION['user_role'] == '0') {
    header('Location: http://localhost/Pondit%20Code/news-site/admin/post.php');
}

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                        include 'config.php';

                        $limit = 3;

                        if (isset($_GET['page'])) {
                            $pages = $_GET['page'];
                        } else {
                            $pages = 1;
                        }
                        $offset = ($pages - 1) * $limit;

                        $sql = "SELECT * FROM category ORDER BY category_id DESC LIMIT {$offset},{$limit}";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <th class='id'><?php echo $i++; ?></th>
                                    <td><?php echo $row['category_name']; ?></td>
                                    <td><?php echo $row['post']; ?></td>
                                    <td class='edit'><a
                                            href='update-category.php?id=<?php echo $row['category_id'] ?>'><i
                                                class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-category.php'><i
                                                class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php }
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                $sql1 = "SELECT * FROM category";
                $result1 = mysqli_query($conn, $sql1);

                if (mysqli_num_rows($result1) > 0) {
                    $total_records = mysqli_num_rows($result1);
                    $total_page = ceil($total_records / $limit);

                    echo '<ul class="pagination admin-pagination">';
                    if ($pages > 1) {
                        echo '<li><a href="category.php?page=' . ($pages - 1) . ' ">Prev</a></li>';
                    }

                    for ($i = 1; $i <= $total_page; $i++) {
                        if ($i == $pages) {
                            $active = "active";
                        } else {
                            $active = "";
                        }
                        echo '<li class="' . $active . '"><a href="category.php?page=' . $i . '">' . $i . '</a></li>';
                    }
                    if ($total_page > $pages) {
                        echo '<li><a href="category.php?page=' . ($pages + 1) . ' ">Next</a></li>';
                    }
                    echo '</ul>';
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>