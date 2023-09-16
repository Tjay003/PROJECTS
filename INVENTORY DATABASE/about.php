<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="styles.css" />
    <style>
      /* Styling for the container */
      /* Styling for the container */
      .container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: flex-start;
        gap: 30px;
        padding: 20px;
        background-color: #f5efe7;
      }


      /* Styling for the developer card */
      .developer-card {
        width: 200px;
        text-align: center;
        background-color: #fff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
        padding: 20px;
        transition: transform 0.3s ease;
      }

      /* Animation on hover */
      .developer-card:hover {
        transform: translateY(-5px);
      }

      /* Styling for the developer image */
      .developer-card img {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
      }

      /* Styling for the developer name */
      .developer-card h3 {
        margin: 0;
        font-size: 18px;
        color: #3555a2;
      }

      /* Styling for the heading */
      h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #213555;
        font-weight: bolder;
        margin-top: 6rem;
      }
    </style>
  </head>
  <body>
    <div class="navbar">
      <span class="heading">Clothing Inventory Database System</span>
      <div class="nav-buttons">
        <a href="image_gallery.php">Home</a>
        <a href="AdminPage.php">Add/Update Products</a>
        <a href="about.php" class="active">About</a>
      </div>
    </div>
    <div>
      <h2>DEVELOPERS</h2>
    </div>

    <div class="container">
      <div class="developer-card">
        <img src="Devs/tyr.jpg" alt="Developer 1" />
        <h3>Tyrone James Bacolod</h3>
      </div>

      <div class="developer-card">
        <img src="Devs/kyle.jpg" alt="Developer 2" />
        <h3>Kyle Yamzon</h3>
      </div>

      <div class="developer-card">
        <img src="Devs/Locar.jpg" alt="Developer 3" />
        <h3>John Carlo Galope</h3>
      </div>

      <div class="developer-card">
        <img src="Devs/Pao.jpg" alt="Developer 4" />
        <h3>Jhan Paolo Laluces</h3>
      </div>

      <div class="developer-card">
        <img src="Devs\delmo.jpg" alt="Developer 5" />
        <h3>Jason Delmo</h3>
      </div>
    </div>
  </body>
</html>
