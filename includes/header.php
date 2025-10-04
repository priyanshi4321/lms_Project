<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


<div class="navbar navbar-inverse set-radius-zero">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">
                <img src="assets/img/logo.png" />
            </a>
        </div>

        <?php if(isset($_SESSION['alogin']) || isset($_SESSION['login'])): ?>
        <div class="right-div">
            <a href="logout.php" class="btn btn-danger pull-right">LOG ME OUT</a>
        </div>
        <?php endif; ?>
    </div>
</div>
<!-- LOGO HEADER END-->

<?php if(isset($_SESSION['alogin']) && $_SESSION['alogin'] != ''): ?>
<!-- Admin Menu -->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="admin/dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Categories <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="add-category.php">Add Category</a></li>
                                <li><a href="manage-categories.php">Manage Categories</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Authors <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="add-author.php">Add Author</a></li>
                                <li><a href="manage-authors.php">Manage Authors</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="add-book.php">Add Book</a></li>
                                <li><a href="manage-books.php">Manage Books</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Issue Books <i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu">
                                <li><a href="issue-book.php">Issue New Book</a></li>
                                <li><a href="manage-issued-books.php">Manage Issued Books</a></li>
                            </ul>
                        </li>
                        <li><a href="reg-students.php">Reg Students</a></li>
                        <li><a href="change-password.php">Change Password</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php elseif(isset($_SESSION['login']) && $_SESSION['login'] != ''): ?>
<!-- User Menu -->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="dashboard.php" class="menu-top-active">DASHBOARD</a></li>
                        <li><a href="my-profile.php">My Profile</a></li>
                        <li><a href="change-password.php">Change Password</a></li>
                        <li><a href="issued-books.php">Issued Books</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php else: ?>
<!-- Guest Menu -->
<section class="menu-section">
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="navbar-collapse collapse ">
                    <ul id="menu-top" class="nav navbar-nav navbar-right">
                        <li><a href="adminlogin.php">Admin Login</a></li>
                        <li><a href="signup.php">User Signup</a></li>
                        <li><a href="index.php">User Login</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
