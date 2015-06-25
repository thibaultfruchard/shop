<?php
$current_page = basename($_SERVER['PHP_SELF']);

$pages = array(
    'about.php' => 'About',
    'services.php' => 'Services',
    'search.php' => 'Search',
    'contact.php' => 'Contact',
    'register.php' => 'Register'
);
?>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Menu</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Shop</a>
            </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    foreach($pages as $page_url => $page_name) {

                    $active = '';
                    if ($current_page == $page_url) {
                        $active = ' class="active"';
                    }
                    ?>
                    <li<?= $active ?>><a href="<?= $page_url ?>"><?= $page_name ?></a></li>
                    <?php } ?>
                </ul>

                <form class="navbar-form navbar-right" role="search" action="search.php" method="GET">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
                        </span>
                    </div>
                </form>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>