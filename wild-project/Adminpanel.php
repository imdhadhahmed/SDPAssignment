<?php
$servername="localhost";
$username="root";
$password= "";
$db_name="wildlife";
$conn=new mysqli($servername,$username,$password,$db_name);
if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
}
function getCategoryCount($conn, $category) {
  $sql = "SELECT COUNT(*) as count FROM your_complaints_table WHERE category = '$category'";
  $result = $conn->query($sql);
  if ($result === false) {
      die("Error in query: " . $conn->error);
  }
  $row = $result->fetch_assoc();
  return $row['count'];
}

$wildLifeCount = getCategoryCount($conn, 'Wild Life Conservation');
$forestLifeCount = getCategoryCount($conn, 'Forest Life Conservation');
$allComplaintsCount = getCategoryCount($conn, 'All Complaints');
$complainersCount = getCategoryCount($conn, 'Complainers');

$conn->close();
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adator Complain System</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom Font Icons CSS-->
    <link rel="stylesheet" href="css/font.css">
    <!-- Google fonts - Muli-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/favicon.ico">
  </head>
  <body>
    <div class="d-flex align-items-stretch">
      <!-- Sidebar Navigation-->
      <nav id="sidebar">
        <!-- Sidebar Header-->
        <div class="sidebar-header d-flex align-items-center">
          <div class="avatar"><img src="img/download.png" alt="..." class="img-fluid rounded-circle"></div>
          <div class="title">
            <h1 class="h5">Administrator</h1>
          </div>
        </div>
        <!-- Sidebar Navidation Menus--><span class="heading">Main</span>
        <ul class="list-unstyled">
                <li class="active"><a href="Adminpanel.php"> <i class="icon-home"></i>Home </a></li>
                <li><a href="Adminusers.php"> <i class="icon-user"></i>Users </a></li>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
            <h2 class="h5 no-margin-bottom">Dashboard</h2>
          </div>
        </div>

<section class="no-padding-top no-padding-bottom">
    <div class="container-fluid">
        <div class="row">
            <?php
            // Loop through each category and generate HTML
            $categories = [
                ['Wild Life Conservation', $wildLifeCount, '1'],
                ['Forest Life Conservation', $forestLifeCount, '2'],
                ['All Complaints', $allComplaintsCount, '3'],
                ['Complainers', $complainersCount, '4']
            ];

            foreach ($categories as $category) {
                echo '<div class="col-md-3 col-sm-6">';
                echo '<div class="statistic-block block">';
                echo '<div class="progress-details d-flex align-items-end justify-content-between">';
                echo '<div class="title">';
                echo '<div class="icon"><i class="icon-user-1"></i></div><strong>' . $category[0] . '</strong>';
                echo '</div>';
                echo '<div class="number dashtext-' . $category[2] . '">' . $category[1] . '</div>';
                echo '</div>';
                echo '<div class="progress progress-template">';
                echo '<div role="progressbar" style="width: ' . ($category[1] * 10) . '%" aria-valuenow="' . $category[1] . '" aria-valuemin="0" aria-valuemax="100" class="progress-bar progress-bar-template dashbg-' . $category[2] . '"></div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</section>
        <section class="no-padding-bottom">
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8">
                <div class="line-chart block">
                  <div class="text-center">
                    <strong>ALL COMPLAINTS</strong>
                  </div>
                  <canvas id="linechart"></canvas>
                </div>
              </div>
            </div>
          </div>
        </section>
        <footer class="footer">
          <div class="footer__block block no-margin-bottom">
            <div class="container-fluid text-center">
               <p class="no-margin-bottom">&copy; 2023 <a target="_blank" href="https://esoft.lk">Esoft Metro Campus</a>.</p>
            </div>
          </div>
        </footer>
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-home.js"></script>
    <script src="js/front.js"></script>
  </body>
</html>