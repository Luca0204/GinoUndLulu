<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <title>PseudoTube</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <style media="screen"></style>
  </head>
  <!-- TOPBAR -->
  <body>
  <div class='TopBar'>
    <a href="../PseudoTube/">
<img class="Logo" width="40" height="40" src='img/Logo.png' alt='Video Picture'></a>
    <div class='Search'>

     <form class='' action='index.php' method='get'>
       <input placeholder='Suchen...' type='text' name='s' class='SearchText' value=''>
       <button type='submit' class='SearchBTN'>Suchen</button>
     </form>
  </div>
  </div>
  <?php
  if (empty($_GET[video])) {



    echo "


    <!-- Content -->

    <div class='Content'>";
    $db_link = mysqli_connect (localhost,root,raspberry,PseudoTube);

if (isset($_GET[s])) {
  $sql = "SELECT * FROM Videos WHERE Video_Titel = '".$_GET[s]."'";
}
else {
  $sql = "SELECT * FROM Videos ORDER BY RAND() LIMIT 20";
}
$db_erg = mysqli_query( $db_link, $sql );
if ( ! $db_erg )
{
die('Fehler1' . mysqli_error());
}

while ($Video = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
{
  echo "<a style='color: white; text-decoration: none;' href='../PseudoTube/?video=".$Video['Video_ID']."'><div class='Video'><img src='img/Video.png' alt='Video Picture'><br>".$Video['Video_Titel']."</a></div>";
}
echo "
    </div>

  </body>
  ";
  }

  elseif (isset($_GET[video])) {
  echo "
    <!-- Player -->
    <div class='Content'>";

    $video = $_GET[video];
    $db_link = mysqli_connect (localhost,root,raspberry,PseudoTube);
    $sql = "SELECT * FROM Videos WHERE Video_ID = '".$video."'";

    $db_erg = mysqli_query( $db_link, $sql );
    if ( ! $db_erg )
    {
    die('Fehler2' . mysqli_error());
    }

    while ($Video = mysqli_fetch_array( $db_erg, MYSQL_ASSOC))
    {
      echo "<video style='background-color:rgb(10, 10, 10);' width='1280' height='720' controls>
  <source src='Videos/".$Video['FileName']."' type='video/mp4'>
  Ja nö deim broswer nix können das
</video>
<br>
".$Video['Video_Titel']."
";
    }

    echo "</div>";
  }
  ?>

</html>
