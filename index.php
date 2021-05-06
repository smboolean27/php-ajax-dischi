<?php 
  include __DIR__ . '/database.php';

  if ( !empty($_GET['genre']) ) {
    $genre = $_GET['genre'];
    $categories = [];
  
    foreach ( $database as $album ) {
      if (strtolower($album['genre']) == strtolower($genre)) {
        $categories[] = $album;
      }
    }
  
    $database = $categories;
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="style.css">
    <title>Dischi</title>
  </head>
  <body>
    <div class="container">

      <header>
        <div class="container">
          <img src="images/download.png" alt="logo" />

          <form action="index.php">
            <select name="genre">
              <option value="">Tutti</option>
              <option value="rock">Rock</option>
              <option value="pop">Pop</option>
              <option value="metal">Metal</option>
              <option value="jazz">Jazz</option>
            </select>
            <button type="submit">Cerca</button>
          </form>
        </div>
      </header>

      <div class="cds-container container">

      <?php foreach($database as $album): ?>
		  <div class="cd">
        <img src="<?php echo $album['poster'] ?>">
        <h3><?php echo $album['title'] ?></h3>
        <span class="author"><?php echo $album['author'] ?></span>
        <span class="year"><?php echo $album['year'] ?></span>
      </div>
      <?php endforeach; ?>

      </div>
    </div>
  </body>
</html>
