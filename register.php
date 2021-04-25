<?php $pageTitle = 'Register' ?>
<?php require_once('inc/header.php'); ?>

    <?php 
        //sanitize post array
        $post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($post['submit'])){
            if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
                echo '<div class="p-3 mb-2 bg-danger text-white">Please Fill all fields</div>';
            }else {
                $name = $post['name'];
                $email = $post['email'];
                $password = md5($post['password']);

                //check database to see if email exist
                $sqli = "SELECT * FROM users ";
                $sqli .= "WHERE email='" . $email ."'";
                $result = mysqli_query($db, $sqli);
                $user = mysqli_fetch_assoc($result);

                if($user){
                    echo '<div class="p-3 mb-2 bg-danger text-white">Email exists. Please login or try another email address</div>';
                } else {
                    //Means email doesnt exits. Insert into db
                    $sqli = "INSERT INTO users ";
                    $sqli .= "(name, email, password) ";
                    $sqli .= "VALUES (";
                    $sqli .= "'" . $name . "',";
                    $sqli .= "'" . $email . "',";
                    $sqli .= "'" . $password . "'";
                    $sqli .= ")";

                    $result = mysqli_query($db, $sqli);

                    if($result) {
                        $newId = mysqli_insert_id($db);

                        $_SESSION['isLoggedIn'] = true;
                        $_SESSION['id'] = $newId;
                        $_SESSION['name'] = $name;
                        $_SESSION['email'] = $email;
                        $_SESSION['password'] = $password;

                        //redirect to dashboard
                        header("Location: " .ROOT_URL."dashboard.php");
                   } else{
                    echo '<div class="p-3 mb-2 bg-danger text-white">Query Failed.</div>';
                    }
                }
            }
        }
    ?>

    <main class="px-3">
        <h1 class="cover-heading">Register</h1>
        <form action="" method="post" class="row g-3">
        <div class="col-12">
            <label for="Name" class="form-label">Name</label>
            <input type="text" name="name" class="form-control" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="Email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" id="inputEmail4">
        </div>
        <div class="col-12">
            <label for="Password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
        </div>
        <div class="col-12">
            <button type="submit" name="submit" class="btn btn-primary">Sign in</button>
        </div>
        </form>
       
      </main>

<?php require_once('inc/footer.php'); ?>