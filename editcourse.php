<?php $pageTitle = 'Edit Course' ?>
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
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        if (isset($post['submit'])){
            echo "<h3> Course Updated Successfully </h3> <br><br>";
            $newCourseName = $post['name'];

            //Update in Database

            $sql = "UPDATE course SET ";
            $sql .= "user_id='" . $userId ."', ";
            $sql .= "course_name='" . $newCourseName ."' ";
            $sql .= "WHERE id='" . $id ."' ";
            $sql .= "LIMIT 1";

            $result = mysqli_query($db, $sql);

            if($result){
                header("Location: ". ROOT_URL."viewcourse.php?id=" . $id);
            }else{
                echo "<h3> Something Just Happened Right Now</h3>";
            }
        }
    }

?>

  <main class="px-3">
        <h1 class="cover-heading">Edit Course</h1>
        <form action="" method="post">
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputText" value="<?php echo $course['course_name']; ?>">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Last Updated</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" id="inputPassword" value="<?php echo $course['created_date'] ?>" readonly>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Edit Course</button>
        </div>
        </form>
    
    </main>

<?php require_once('inc/footer.php'); ?>