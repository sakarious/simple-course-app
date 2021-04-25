<?php
    if(isset($_GET['id'])) {

        $id = $_GET['id'];
        echo "Your course id is  ---- $id";
    } else {
        header("Location: index.php");
    }

?>

<?php $pageTitle = 'Delete Course' ?>
<?php require_once('inc/header.php'); ?>
<?php 
        if(!isset($_SESSION['isLoggedIn'])){
          header("Location: " . ROOT_URL."login.php");
        }

?>

  <main class="px-3">
        <h1 class="cover-heading">Delete Course</h1>
    
    </main>

<?php require_once('inc/footer.php'); ?>