<?php $pageTitle = 'Dashboard' ?>
<?php require_once('inc/header.php'); ?>
<?php 
        if(!isset($_SESSION['isLoggedIn'])){
          header("Location: " . ROOT_URL."login.php");
        }

?>

<?php 

    $sqli = "SELECT * FROM course ";
    $sqli .= "WHERE user_id=";
    $sqli .= "'". $_SESSION['id'] . "' ";
    $sqli .= "ORDER by created_date DESC";

    $resultset = mysqli_query($db, $sqli);
    
    if(!$resultset){
      echo '<div class="p-3 mb-2 bg-danger text-white">Something Just Happened Right Now</div>';
      exit('Database Query Failed');
    }


?>

  <main class="px-3">
        <h1 class="cover-heading mb-0">Dashboard</h1>
        <p class="lead">Welcome <?php echo $_SESSION['name']; ?>!</p>
        <p class="lead">All Courses</p>
        <a href="<?php echo ROOT_URL."addcourse.php"?>">Add New Course</a>
        <table class="table table-dark table-striped">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Courses</th>
      <th scope="col">Date Added</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
      <th scope="col">&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    <?php $counter = 0; while ($course = mysqli_fetch_assoc($resultset)) { $counter++ ?>
    <tr>
      <th scope="row"><?php echo $counter ?></th>
      <td><?php echo $course['course_name']; ?></td>
      <td><?php echo $course['created_date']; ?></td>
      <td><a href="<?php echo ROOT_URL."viewcourse.php?id=" . $course['id'] ?>">View</a></td>
      <td> <a href="<?php echo ROOT_URL."editcourse.php?id=" . $course['id'] ?>">Edit</a></td>
      <td> <a href="<?php echo ROOT_URL."deletecourse.php?id=" . $course['id'] ?>">Delete</a></td>
    </tr>
    <?php } ?>
  </tbody>
    </table>
    </main>

<?php require_once('inc/footer.php'); ?>