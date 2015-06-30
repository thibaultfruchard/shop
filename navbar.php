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

				<ul class="nav navbar-nav navbar-right">
					<li class="dropdown">
						<a id="cart-products-dropdown" href="javascript:;" class="dropdown-toggle<?= empty($_SESSION['cart']) ? ' disabled' : '' ?>" data-toggle="dropdown" role="button" aria-expanded="false"> <span class="glyphicon glyphicon-shopping-cart"></span> <span id="cart-products-count" class="badge"><?= !empty($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?></span><span class="caret"></span></a>
						<ul id="cart-products" class="dropdown-menu dropdown-cart" role="menu">
							<?php include_once 'ajax-cart-products.php' ?>
						</ul>
					</li>
				</ul>

				<form class="navbar-form navbar-right" role="search" action="search.php" method="GET">
					<div class="input-group">
						<input type="text" name="q" class="form-control" placeholder="Search...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class=" glyphicon glyphicon-search"></span></button>
						</span>
					</div>
				</form>

				<ul class="nav navbar-nav navbar-right">
					<?php if (!empty($_SESSION['user_id']))	{ ?>
					<li><a>Bonjour <?= $_SESSION['firstname'] ?></a></li>
					<li><a href="logout.php">Déconnexion</a></li>
					<?php } else { ?>
					<li><a href="login.php">Connexion</a></li>
					<li><a href="register.php">Inscription</a></li>
					<?php } ?>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container -->
	</nav>