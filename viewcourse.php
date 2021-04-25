<?php $pageTitle = 'View Course' ?>
<?php require_once('inc/header.php'); ?>
<?php 
        if(!isset($_SESSION['isLoggedIn'])){
          header("Location: " . ROOT_URL."login.php");
        }

?>
<?php
    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        $id = htmlspecialchars($id);
        $userId = htmlspecialchars($_SESSION['id']);
        
        $sql = "SELECT * FROM course ";
        $sql .= "WHERE id='" . $id. "' ";
        $sql .= "AND user_id='" . $userId. "'";
        $result = mysqli_query($db, $sql);
        $course = mysqli_fetch_assoc($result);
    } else {
        header("Location: index.php");
    }
?>

  <main class="px-3">
        <h1 class="cover-heading">View Course</h1>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" value="<?php echo $course['course_name']; ?>" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Last Updated</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" value="<?php echo $course['created_date'] ?>" readonly>
            </div>
        </div>
    
    </main>

<?php require_once('inc/footer.php'); ?>