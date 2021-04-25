<?php $pageTitle = 'Home' ?>
<?php require_once('inc/header.php'); ?>

  <main class="px-3">
        <h1 class="cover-heading">Home</h1>
        <p class="lead">Welcome to Simple Course App</p>
        <?php if (isset($_SESSION['isLoggedIn'])) : ?>
        <p class="lead">
          <a href="<?php echo ROOT_URL."dashboard.php"; ?>" class="btn btn-lg btn-secondary">See Courses</a>
        </p>
        <?php endif; ?>
      </main>

<?php require_once('inc/footer.php'); ?>