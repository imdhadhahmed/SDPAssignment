<?php
$servername="localhost";
$username="root";
$password= "";
$db_name="wildlife";
$conn=new mysqli($servername,$username,$password,$db_name);
if ($conn->connect_error) {
    die("Connection failed". $conn->connect_error);
}
function getUsers($conn, $limit) {
    $sql = "SELECT * FROM your_users_table LIMIT $limit";
    $result = $conn->query($sql);

    if ($result === false) {
        die("Error in query: " . $conn->error);
    }

    return $result;
}

$limit = isset($_GET['limit']) ? $_GET['limit'] : 10;
$usersResult = getUsers($conn, $limit);

$conn->close();
?>

<!DOCTYPE html>
<html>
  <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dark Bootstrap Admin </title>
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
                <li><a href="index.html"> <i class="icon-home"></i>Home </a></li>
                <li class="active"><a href="users.html"> <i class="icon-user"></i>Users </a></li>
      </nav>
      <!-- Sidebar Navigation end-->
      <div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="col-xl-12 col-xxl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Users</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive recentOrderTable">
                            <table class="table verticle-middle table-responsive-md">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Institution</th>
                                        <th scope="col">Date Of Join</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Address</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $counter = 1;
                                    while ($row = $usersResult->fetch_assoc()) {
                                        echo '<tr>';
                                        echo '<td>' . $counter++ . '</td>';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['institution'] . '</td>';
                                        echo '<td>' . $row['date_of_join'] . '</td>';
                                        echo '<td><span class="badge badge-rounded badge-primary">' . $row['status'] . '</span></td>';
                                        echo '<td>' . $row['address'] . '</td>';
                                        echo '<td>';
                                        echo '<a href="edit-student.html" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>';
                                        echo '<a href="javascript:void(0);" class="btn btn-sm btn-danger"><i class="la la-trash-o"></i></a>';
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
