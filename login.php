<?php $pageTitle = 'Login' ?>
<?php require_once('inc/header.php'); ?>
<?php
    $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

    if(isset($post['submit'])){
        if($post['email'] == '' || $post['password'] == ''){
            echo "Please fill all fields";
        } else{
            $email = $post['email'];
            $password = md5($post['password']);

            $sqli = "SELECT * FROM users ";
            $sqli .= "WHERE email=";
            $sqli .= "'". $email . "' ";
            $sqli .= "AND ";
            $sqli .= "password=";
            $sqli .= "'". $password . "'";
            //echo $sqli;
            $result = mysqli_query($db, $sqli);
            $user = mysqli_num_rows($result);
            $userArray = mysqli_fetch_assoc($result);

            if($user == 1) {

                $_SESSION['isLoggedIn'] = true;
                $_SESSION['id'] = $userArray['id'];
                $_SESSION['name'] = $userArray['name'];
                $_SESSION['email'] = $userArray['email'];
                $_SESSION['password'] = $userArray['password'];

                //redirect to dashboard
                header("Location: " .ROOT_URL."dashboard.php");
            } else {
                echo "Wrong Username or password";
            }

        }
    }

?>
    <main class="px-3">
        <h1 class="cover-heading">Login</h1>
        <form action="" method="post" class="row g-3">
        <div class="col-md-6">
            <label for="Email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
        </div>
        <div class="col-md-6">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
        </div>
        </form>
       
      </main>

<?php require_once('inc/footer.php'); ?>