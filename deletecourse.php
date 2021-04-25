<?php $pageTitle = 'Delete Course' ?>
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

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['submit'])){
            echo "<h3>Successful Deleted</h3> <br><br>";

            $sql = "DELETE FROM course ";
            $sql .= "WHERE id='". $id ."' ";
            $sql .= "AND user_id='". $userId ."' ";
            $sql .= "LIMIT 1";
            
            $result = mysqli_query($db, $sql);

            if($result){
                header("Location: dashboard.php");
            } else {
                echo "<h3>Something just happened right now</h3>";
            }
        }
    }
?>

  <main class="px-3">
        <h1 class="cover-heading">Delete Course</h1>
        <h3 class="cover-heading">Are you sure you want to Delete this course</h3>
        <form action="" method="post">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" value="<?php echo $course['course_name']; ?>" readonly>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Delete Course</button>
        </div>
        </form>
    
    </main>

<?php require_once('inc/footer.php'); ?>