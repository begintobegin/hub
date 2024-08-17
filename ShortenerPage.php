<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shortener</title>
    <link rel="stylesheet" href="assets/style/ShortenerStyle/ShortenerStyle.css">
</head>
<style>
  
</style>
<body>
    <div class="shortener">Shortener</div>
    <div class="form__group field">
    <form action="/includes/Shortener/mainShortener.php" method="POST" class="form">
    <div class="input-container">
        <input type="url" name="longUrl"  class="form__field" id = "form__field">
    </div>
        <button type="submit" class="btn-new">Send</button>
    </form>

    </div>
    <div class = "short__link">
    <?php
    if(isset($_SESSION['Request'])){
        echo $_SESSION['Request'];
    };
    ?>
    </div>

</body>

</html>