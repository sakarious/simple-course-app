<?php $pageTitle = 'Reset Page' ?>
<?php require_once('inc/header.php'); ?>
<?php 
        if(!isset($_SESSION['isLoggedIn'])){
          header("Location: " . ROOT_URL."login.php");
        }
?>
<?php
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($post['submit'])){
        if($post['currentpass'] == '' || $post['newpass'] == '' || $post['confirmpass'] == ''){
            echo "<h3> Please fill all fields</h3>";
        }

        if($post['newpass'] != $post['confirmpass']){
            echo "<h3>New Password not Match</h3>";
        }

        $correctCurrentPassword = $_SESSION['password'];
        $userCurrentPassword = md5($post['currentpass']);

        if($correctCurrentPassword != $userCurrentPassword){
            echo "<h3>Current Password Wrong</h3>";
        } else{
            $newPassword = md5($post['confirmpass']);
            $userId = $_SESSION['id'];
            //UPDATE QUERY
            $sql = "UPDATE users SET ";
            $sql .= "password='" . $newPassword ."' ";
            $sql .= "WHERE id='". $userId ."' ";
            $sql .= "LIMIT 1";
            $result = mysqli_query($db, $sql);
            if($result){
                echo "<h3>Password Reset Successful. Redirecting to Dashboard now.</h3>";
                header('refresh: 5; url=dashboard.php'); // redirect the user after 5 seconds
             } else {
                 echo mysqli_error($db);
                 exit('Update Failed');
             }
        }

    }
?>
  <main class="px-3">
        <h1 class="cover-heading">Reset Password</h1>
        <form action="" method="post" class="row g-3">
        <div class="col-12">
            <label for="Current Password" class="form-label">Current Password</label>
            <input type="password" name="currentpass" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="New password" class="form-label">New Password</label>
            <input type="password" class="form-control" name="newpass" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="Confirm Password" class="form-label">Confirm Password</label>
            <input type="password" name="confirmpass" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Reset</button>
        </div>
        </form>
    </main>

<?php require_once('inc/footer.php'); ?>