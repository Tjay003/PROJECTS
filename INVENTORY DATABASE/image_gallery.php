<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bootleg";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Catalog</title>
   <link rel="stylesheet" type="text/css" href="styles.css" />
   <style>
     body {
         background-color: #F5EFE7;
         font-family: Arial, sans-serif;
      }

      .search-container {
         text-align: center;
         margin-bottom: 20px;
         margin-top: 3rem;
      }

      .search-container input[type="text"] {
         width: 300px;
         padding: 8px;
         font-size: 16px;
         border: 2px solid #D8C4B6;
         border-radius: 4px;
      }

      .search-container input:focus {
      border: 2px solid #4F709C;
      }

      .search-container button {
         padding: 8px 12px;
         font-size: 16px;
         background-color: #213555;
         color: #F5EFE7;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      

      

      .search-container button:hover {
      background-color: #4F709C;
      color: #F5EFE7;
      }

      .search-input {
         padding: 8px;
         border: none;
         border-radius: 5px;
         margin-right: 10px;
         font-size: 16px;
      }

      .gallery {
         display: flex;
         flex-wrap: wrap;
         justify-content: center;
         gap: 20px;
         padding: 20px;
      }

      .gallery-item {
         width: 200px;
         background-color: #fff;
         border-radius: 5px;
         padding: 10px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
         text-align: center;
         cursor: pointer;
         transition: transform 0.3s ease;
         border: 3px solid #D8C4B6;
      }

      .gallery-item:hover {
         transform: scale(1.1);
      }

      .gallery-item img {
         max-width: 100%;
         height: auto;
      }

      .gallery-item h3 {
         font-size: 18px;
         font-weight: bold;
         margin: 10px 0;
         color: #333;
      }

      .modal {
         display: none;
         position: fixed;
         z-index: 1;
         left: 0;
         top: 0;
         width: 100%;
         height: 100%;
         overflow: auto;
         background-color: rgba(0, 0, 0, 0.5);
      }

      .modal-content {
         background-color: #fff;
         margin: 10% auto;
         padding: 20px;
         border-radius: 5px;
         max-width: 500px;
         box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
         text-align: center;
         position: relative;
         border: 4px solid #213555;
      }

      .modal-content img {
         max-width: 100%;
         height: auto;
         margin-bottom: 10px;
      }

      .modal-content h3 {
         font-size: 24px;
         font-weight: bold;
         margin-bottom: 10px;
         color: #333;
      }

      .modal-content p {
         font-size: 16px;
         margin-bottom: 20px;
         color: #555;
      }

      .modal-header {
         position: absolute;
         top: 10px;
         right: 20px;
      }

      .close-button {
         color: #888;
         font-size: 20px;
         font-weight: bold;
         cursor: pointer;
         transition: color 0.3s ease;
      }

      .close-button:hover {
         color: #555;
      }
   </style>
</head>

<div class="navbar">
      <span class="heading">Clothing Inventory Database System</span>
      <div class="nav-buttons">
      <a href="image_gallery.php" class="active">Home</a>
      <a href="AdminPage.php">Add/Update Products</a>
      <a href="about.php">About</a>
      </div>
</div>

<body>

   <div class="search-container">
      <form action="" method="get">
         <input type="text" name="search" placeholder="Search products..." class="search-input">
         <button type="submit">Search</button>
      </form>
   </div>

   <div class="gallery">
   <?php
          if (isset($_GET['search'])) {
             $search = $_GET['search'];
             $select = mysqli_query($conn, "SELECT * FROM products WHERE name LIKE '%$search%' OR category LIKE '%$search%'");
      } else {
             $select = mysqli_query($conn, "SELECT * FROM products ORDER BY id DESC");
            }
        while ($row = mysqli_fetch_assoc($select)) {
         ?>
         <div class="gallery-item" onclick="openModal('<?php echo $row['name']; ?>', 'uploaded_img/<?php echo $row['image']; ?>', '<?php echo $row['price']; ?>', '<?php echo $row['supply']; ?>', '<?php echo $row['category']; ?>')">
            <img src="uploaded_img/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
            <h3><?php echo $row['name']; ?></h3>
            <p>Price: ₱<?php echo $row['price']; ?></p>
            <p>Supply: <?php echo $row['supply']; ?></p>
         </div>
      <?php } ?>
   </div>

   <div class="modal" id="modal">
      <div class="modal-content">
         <div class="modal-header">
            <span class="close-button" onclick="closeModal()">&times;</span>
         </div>
         <img id="modal-image" src="" alt="Product Image">
         <h3 id="modal-name"></h3>
         <p id="modal-price"></p>
         <p id="modal-supply"></p>
         <p id="modal-category"></p>
         
      </div>
   </div>

   <script>
      function openModal(name, image, price, supply, category) {
         document.getElementById("modal-name").textContent = name;
         document.getElementById("modal-image").src = image;
         document.getElementById("modal-price").textContent = "Price: ₱" + price;
         document.getElementById("modal-supply").textContent = "Supply: " + supply;
         document.getElementById("modal-category").textContent = "Category: " + category;

         document.getElementById("modal").style.display = "block";
      }

      function closeModal() {
         document.getElementById("modal").style.display = "none";
      }
   </script>
</body>

</html>
