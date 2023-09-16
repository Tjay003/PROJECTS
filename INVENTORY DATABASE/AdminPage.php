<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootleg";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['add_product'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_supp = $_POST['product_supp'];
    $product_cate = $_POST['product_cate'];

    $product_image = $_FILES['product_image']['name'];
    $product_image_tmp_name = $_FILES['product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_supp) || empty($product_cate) || empty($product_image)) {
        $message[] = 'Please fill out all fields.';
    } else {
        $insert = "INSERT INTO products (name, price, supply, category, image) VALUES ('$product_name', '$product_price', '$product_supp', '$product_cate', '$product_image')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $message[] = 'New product added successfully.';
        } else {
            $message[] = 'Could not add the product.';
        }
    }
}

if (isset($_POST['edit_product'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['edit_product_name'];
    $product_price = $_POST['edit_product_price'];
    $product_supp = $_POST['edit_product_supp'];
    $product_cate = $_POST['product_cate'];
    $product_image = $_FILES['edit_product_image']['name'];
    $product_image_tmp_name = $_FILES['edit_product_image']['tmp_name'];
    $product_image_folder = 'uploaded_img/' . $product_image;

    if (empty($product_name) || empty($product_price) || empty($product_supp) || empty($product_cate)) {
        $message[] = 'Please fill out all fields.';
    } else {
        if (!empty($product_image)) {
            move_uploaded_file($product_image_tmp_name, $product_image_folder);
            $update = "UPDATE products SET name = '$product_name', price = '$product_price', supply = '$product_supp', category = '$product_cate', image = '$product_image' WHERE id = $product_id";
        } else {
            $update = "UPDATE products SET name = '$product_name', price = '$product_price', supply = '$product_supp', category = '$product_cate' WHERE id = $product_id";
        }
        
        $result = mysqli_query($conn, $update);
        if ($result) {
            echo "<script>alert('Product Updated Succesfully'); window.location='AdminPage.php';</script>";
        } else {
            echo "<script>alert('Could Not Update'); window.location='AdminPage.php';</script>";
        }
        
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    mysqli_query($conn, "DELETE FROM products WHERE id = $id");
    header('location:AdminPage.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<div class="navbar">
      <span class="heading">Clothing Inventory Database System</span>
      <div class="nav-buttons">
        <a href="image_gallery.php" >Home</a>
        <a href="AdminPage.php" class="active">Add/Update Products</a>
        <a href="about.php">About</a>
      </div>
</div>
    <?php
    if (!empty($message)) {
        foreach ($message as $msg) {
            echo '<script>alert("' . $msg . '");</script>';
        }
    }
    ?>



    <!-- Add new product modal pop-up -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addProductModalLabel">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_price" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_supp" class="form-label">Product Supplies</label>
                            <input type="text" class="form-control" id="product_supp" name="product_supp" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_cate" class="form-label">Product Cateogry</label>
                            <input type="text" class="form-control" id="product_cate" name="product_cate" required>
                        </div>
                        <div class="mb-3">
                            <label for="product_image" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="product_image" name="product_image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="add_product">Add Product</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="mt-4 mb-3">
                    <form action="" method="get">
                        <div class="input-group">
                            <input type="text" class="form-control Main" placeholder="Search products..." name="search">
                            <button class="btn btn-primary" type="submit"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="button" class="btn btn-dark mb-3" data-bs-toggle="modal" data-bs-target="#addProductModal">Add New Product</button>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Product Price</th>
                            <th>Product Supplies</th>
                            <th>Product Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $select = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search%' OR supply LIKE '%$search%' OR category LIKE '%$search%'");
                        } else {
                            $select = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
                        }
                        

                        while ($row = mysqli_fetch_assoc($select)) {
                        ?>
                            <tr>
                                <td><img src="uploaded_img/<?php echo $row['image']; ?>" alt="Product Image" width="100"></td>
                                <td><?php echo $row['name']; ?></td>
                                <td>₱<?php echo $row['price']; ?></td>
                                <td><?php echo $row['supply']; ?></td>
                                <td><?php echo $row['category']; ?></td>
                                <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProductModal<?php echo $row['id']; ?>">
                                        Edit
                                </button>

                                    <a href="AdminPage.php?delete=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?');">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            <!-- Edit Product Modal -->
                            <div class="modal fade" id="editProductModal<?php echo $row['id']; ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?php echo $row['id']; ?>" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editProductModalLabel<?php echo $row['id']; ?>">Edit Product</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
                                                <div class="mb-3">
                                                    <label for="edit_product_name<?php echo $row['id']; ?>" class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" id="edit_product_name<?php echo $row['id']; ?>" name="edit_product_name" value="<?php echo $row['name']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_product_price<?php echo $row['id']; ?>" class="form-label">Product Price</label>
                                                    <input type="number" class="form-control" id="edit_product_price<?php echo $row['id']; ?>" name="edit_product_price" value="<?php echo $row['price']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_product_supp<?php echo $row['id']; ?>" class="form-label">Product Supplies</label>
                                                    <input type="text" class="form-control" id="edit_product_supp<?php echo $row['id']; ?>" name="edit_product_supp" value="<?php echo $row['supply']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="product_cate<?php echo $row['id']; ?>" class="form-label">Product Category</label>
                                                    <input type="text" class="form-control" id="product_cate<?php echo $row['id']; ?>" name="product_cate" value="<?php echo $row['category']; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="edit_product_image<?php echo $row['id']; ?>" class="form-label">Product Image</label>
                                                    <input type="file" class="form-control" id="edit_product_image<?php echo $row['id']; ?>" name="edit_product_image" >
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" name="edit_product">Save Changes</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>