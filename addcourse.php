<?php $pageTitle = 'Add Course' ?>
<?php require_once('inc/header.php'); ?>
<?php 
        if(!isset($_SESSION['isLoggedIn'])){
          header("Location: " . ROOT_URL."login.php");
        }
?>
<?php
        //filter post array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if(isset($post['submit'])){
            if($post['name'] == ''){
                echo '<div class="p-3 mb-2 bg-danger text-white">Course Name is Invalid</div>';
            } else {
                $courseName = $post['name'];
                $userId = $_SESSION['id'];

                $sql = "INSERT INTO course ";
                $sql .= "(user_id, course_name) ";
                $sql .= "VALUES (";
                $sql .= "'" . $userId ."',";
                $sql .= "'" . $courseName ."'";
                $sql .= ")";

                $result = mysqli_query($db, $sql);
                
                if($result){
                    $newId = mysqli_insert_id($db);
                    header("Location: ". ROOT_URL."viewcourse.php?id=" . $newId);
                } else {
                    echo '<div class="p-3 mb-2 bg-danger text-white">Something just happened Right Now</div>';
                }
            }
           
        }
?>

  <main class="px-3">
        <h1 class="cover-heading">Add Course</h1>
        <form action="" method="post">
        <div class="mb-3 row">
            <label for="Course Name" class="col-sm-2 col-form-label">Course Name</label>
            <div class="col-sm-10">
            <input type="text" name="name" class="form-control" id="inputText">
            </div>
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Register Course</button>
        </div>
        </form>
    
    </main>

<?php require_once('inc/footer.php'); ?>