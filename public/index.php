<!-- konekcija na bazu i funkcije -->
<?php require_once("../assets/database/config.php"); ?>      

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Shopping Cart Concept</title>

		<!-- BEGIN META -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="keywords" content="your,keywords">
		<meta name="description" content="Short explanation about this website">
		<!-- END META -->

		<!-- BEGIN STYLESHEETS -->
		<link href='http://fonts.googleapis.com/css?family=Roboto:300italic,400italic,300,400,500,700,900' rel='stylesheet' type='text/css'/>
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/bootstrap.css?1422792965" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/materialadmin.css?1425466319" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/font-awesome.min.css?1422529194" />
		<link type="text/css" rel="stylesheet" href="../assets/css/theme-default/material-design-iconic-font.min.css?1421434286" />
		<!-- END STYLESHEETS -->
		<!-- CUSTOM STYLESHEETS -->
		<link rel="stylesheet" href="../assets/css/angular-csp.css">                    <!-- Angular notifications CSS -->
		<link rel="stylesheet" href="../assets/css/angular-ui-notification.css">        <!-- Angular notifications CSS -->
		<link rel="stylesheet" href="../assets/css/animations.css">                     <!-- Animations-->
		<link rel="stylesheet" href="../assets/css/ng-animations.css">                  <!-- Angular-elements Animations-->
		<link rel="stylesheet" href="../assets/css/product_grid.css">                   <!-- product grid -->
		<!-- CUSTOM STYLESHEETS -->
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="../../assets/js/libs/utils/html5shiv.js?1403934957"></script>
		<script type="text/javascript" src="../../assets/js/libs/utils/respond.min.js?1403934956"></script>
		<![endif]-->
	</head>
	<body class="menubar header-fixed" ng-app="myApp" ng-controller="productsCtrl">

		<!-- BEGIN HEADER-->
		<header id="header" >
			<div class="headerbar">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="headerbar-left">
					<ul class="header-nav header-nav-options">
						<li class="header-nav-brand" >
							<div class="brand-holder">
								<a href="index.php">
									<span class="text-lg text-bold text-primary"> SHOP</span>
								</a>
							</div>
						</li>	
						<li>
							<a class="btn btn-icon-toggle menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
								<i class="fa fa-bars"></i>
							</a>
						</li>																						
					</ul>
				</div>

							
			</div>
		</header>
		<!-- END HEADER-->

		<!-- BEGIN BASE-->
		<div id="base">

			<!-- BEGIN OFFCANVAS LEFT -->
			<div class="offcanvas">
			
				<!-- BEGIN OFFCANVAS DEMO LEFT -->
				<div id="offcanvas-demo-left" class="offcanvas-pane width-6">
					<div class="offcanvas-head">
						<header>Left off-canvas</header>
						<div class="offcanvas-tools">
							<a class="btn btn-icon-toggle btn-default-light pull-right" data-dismiss="offcanvas">
								<i class="md md-close"></i>
							</a>
						</div>
					</div>
					<div class="offcanvas-body">
						<p>
							An off-canvas can hold any content you want.
						</p>
						<p>
							Close this off-canvas by clicking on the backdrop or press the close button in the upper right corner.
						</p>
						<p>&nbsp;</p>
						<h4>Some details</h4>
						<ul class="list-divided">
							<li><strong>Width</strong><br/><span class="opacity-75">240px</span></li>
							<li><strong>Height</strong><br/><span class="opacity-75">100%</span></li>
							<li><strong>Body scroll</strong><br/><span class="opacity-75">disabled</span></li>
							<li><strong>Background color</strong><br/><span class="opacity-75">Default</span></li>
						</ul>
					</div>
				</div>
				<!-- END OFFCANVAS DEMO LEFT -->			
				
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS LEFT -->

			<!-- BEGIN OFFCANVAS RIGHT -->
			<div class="offcanvas">

				<!-- BEGIN OFFCANVAS DEMO RIGHT -->
				<div id="offcanvas-demo-right" class="offcanvas-pane width-10">
					<div class="offcanvas-head">
						<header>CATEGORIES</header>
						<div class="offcanvas-tools">
								<a class="btn btn-flat btn-primary pull-right" data-dismiss="offcanvas">
									<b>close</b>
								</a>
						</div>
					</div>
					<div class="offcanvas-body">
						<p>
							Click the category you would like to view.
						</p>

						<?php get_categories();?>		


					</div>
				</div>
				<!-- END OFFCANVAS DEMO RIGHT -->
			
			</div><!--end .offcanvas-->
			<!-- END OFFCANVAS RIGHT -->
			
			<!-- BEGIN CONTENT-->
			<div id="content">
			
				<!-- BEGIN SEARCH SECTION -->
				<section>
					<div class="section-body contain-sm">
					
						<div class="card style-default-bright">
							<div class="card-head">
								<header>
									<div class="input-group">
										<input type="search"
										       class="form-control" 
											   placeholder="Pretraga proizvoda ..." 
											   ng-model="productFilter" >
										<span class="input-group-addon"><i class="fa fa-search"></i></span>
										<span class="input-group-btn">
										<button ng-click="clearSearch()" class="btn btn-default">X</button>
										<button class="btn btn-primary" href="#offcanvas-demo-right" data-toggle="offcanvas" data-backdrop="false">Kategorije</button>
										</span>
									</div>									
								</header>
							</div>
						</div>
						
					</div><!--end .section-body -->
				</section>
				<!-- END SEARCH SECTION -->
				
	
				
				<!-- BEGIN PRODUCTS SECTION -->
				<section class="grid-wrap">							
					<div class="section-body contain-lg">
											
						<div class="grid" id="grid">											
							<ul class="list">							
								<li ng-repeat="product in products | filter:productFilter" class="scale-fade-in" >  
									<a href="#" ng-click="addToCart(product.ID)" ><img src="../assets/img/{{product.SLIKA}}" alt="dummy"><h3>{{product.NAZIV}}</h3></a>
								</li> 
							</ul>
						</div>
																			
					</div><!--end .section-body -->
					
				</section>
				<!-- BEGIN PRODUCTS SECTION -->
								
			</div><!--end #content-->
			<!-- END CONTENT -->

			<!-- BEGIN MENUBAR-->
			<div id="menubar" class="menubar-inverse ">
				<div class="menubar-fixed-panel">
					<div>
						<a class="btn btn-icon-toggle btn-default menubar-toggle" data-toggle="menubar" href="javascript:void(0);">
							<i class="fa fa-bars"></i>
						</a>
					</div>

				</div>
				<div class="menubar-scroll-panel">

					<!-- BEGIN MAIN MENU -->
					<ul id="main-menu" class="gui-controls">

						<!-- BEGIN PRODUCTS -->
						<li>
							<a href="index.php" >
								<div class="gui-icon"><i class="md md-loyalty"></i></div>
								<span class="title">Products</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END PRODUCTS -->
						
						<!-- BEGIN BASKET -->
						<li>
							<a href="korpa.php" >
								<div class="gui-icon"><i class="md md-shopping-cart"></i></div>
								<span class="title">Cart</span>
							</a>
						</li><!--end /menu-li -->
						<!-- END BASKET -->		
				

					</ul><!--end .main-menu -->
					<!-- END MAIN MENU -->


				</div><!--end .menubar-scroll-panel-->
			</div><!--end #menubar-->
			<!-- END MENUBAR -->

			
		</div><!--end #base-->
		<!-- END BASE -->

		<!-- BEGIN JAVASCRIPT -->
		<script src="../assets/js/libs/jquery/jquery-1.11.2.min.js"></script>
		<script src="../assets/js/libs/jquery/jquery-migrate-1.2.1.min.js"></script>
		<script src="../assets/js/libs/bootstrap/bootstrap.min.js"></script>
		<script src="../assets/js/libs/spin.js/spin.min.js"></script>
		<script src="../assets/js/libs/autosize/jquery.autosize.min.js"></script>
		<script src="../assets/js/libs/nanoscroller/jquery.nanoscroller.min.js"></script>
		<script src="../assets/js/core/source/App.js"></script>
		<script src="../assets/js/core/source/AppNavigation.js"></script>
		<script src="../assets/js/core/source/AppOffcanvas.js"></script>
		<script src="../assets/js/core/source/AppCard.js"></script>
		<script src="../assets/js/core/source/AppForm.js"></script>
		<script src="../assets/js/core/source/AppNavSearch.js"></script>
		<script src="../assets/js/core/source/AppVendor.js"></script>
		<script src="../assets/js/core/demo/Demo.js"></script>
		<!-- END JAVASCRIPT -->
	
		<!-- include angular js -->
		<script src="../assets/js/libs/angular/angular.min.js"></script>
		
		<!-- include angular notifications -->	
		<script src="../assets/js/libs/angular/angular-ui-notification.min.js"></script>	 	
		
		<!-- include angular animations -->	
		<script src="../assets/js/libs/angular/angular-animate.js"></script>	 
		
		<!-- my angular js codes will be here -->	
		<script src="../assets/js/libs/angular/app.js"></script>	

	</body>
</html>
