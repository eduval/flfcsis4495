<?php
/**
© 2024 CSIS-4495 Applied Research Project.
Section 050
---------------------------
Washington Valencia
ID: 300366206
Gustavo Ravell
ID: 300358682
---------------------------

**/
/**********************************************************/
/*********** DB Connection library *******/
require_once("config_gcp.php");

?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta charset="UTF-8">
		<title>CSIS-4495 Applied Research Project</title>
		<meta name="description" content="CSIS-4495 Applied Research Project">

		<meta name="viewport" content="width=device-width, maximum-scale=5, initial-scale=1">
		<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->

		<!-- up to 10% speed up for external res -->
		<link rel="dns-prefetch" href="https://fonts.googleapis.com/">
		<link rel="dns-prefetch" href="https://fonts.gstatic.com/">
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/">
		<!-- preloading icon font is helping to speed up a little bit -->
		<link rel="preload" href="assets/fonts/flaticon/Flaticon.woff2" as="font" type="font/woff2" crossorigin>

		<link rel="stylesheet" href="assets/css/core.min.css">
		<link rel="stylesheet" href="assets/css/vendor_bundle.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;700&display=swap" rel="stylesheet">

		<!-- favicon -->
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="apple-touch-icon" href="demo.files/logo/icon_512x512.png">
		
	</head>

	<!--

		Available Body Classes
			.layout-boxed 					- boxed layout (ignored if any .header-* class is present)

			.header-scroll-reveal  			- header : hide on scroll down and reveal on scroll up
			.header-sticky  				- header : always visible on top
			.header-over  					- header : over slider|parallax|image (next section must contain a large image, else will be indistinguishable)

				Possible header combinations:
					.header-over + .header-scroll-reveal
					.header-over + .header-sticky
						* NOTE: if .header-sticky + .header-scroll-reveal are both used, .header-scroll-reveal is ignored


			.bg-cover .bg-fixed 			- both classes used with .layout-boxed to set a background image via style="background-image:url(...)"
	-->
	<body class="header-sticky">

		<div id="wrapper">


			<!-- Header -->
			<header id="header" class="shadow-xs">

				<!-- Navbar -->
				<div class="container position-relative">


					<nav class="navbar navbar-expand-lg navbar-light justify-content-lg-between justify-content-md-inherit">

						<!-- navbar : brand (logo) -->
						<a class="navbar-brand" href="index.php">
							<img src="logo/csis.png" width="110" height="38" alt="...">
						</a>

						<div class="align-items-start">

							<!-- mobile menu button : show -->
							<button class="navbar-toggler border-0 m-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
								<svg width="25" viewBox="0 0 20 20">
									<path d="M 19.9876 1.998 L -0.0108 1.998 L -0.0108 -0.0019 L 19.9876 -0.0019 L 19.9876 1.998 Z"></path>
									<path d="M 19.9876 7.9979 L -0.0108 7.9979 L -0.0108 5.9979 L 19.9876 5.9979 L 19.9876 7.9979 Z"></path>
									<path d="M 19.9876 13.9977 L -0.0108 13.9977 L -0.0108 11.9978 L 19.9876 11.9978 L 19.9876 13.9977 Z"></path>
									<path d="M 19.9876 19.9976 L -0.0108 19.9976 L -0.0108 17.9976 L 19.9876 17.9976 L 19.9876 19.9976 Z"></path>
								</svg>
							</button>

						</div>




						<!-- Menu -->
						<!--

							Dropdown Classes (should be added to primary .dropdown-menu only, dropdown childs are also affected)
								.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
								.dropdown-menu-hover 		- open on hover
								.dropdown-menu-clean 		- no background color on hover
								.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
								.dropdown-menu-uppercase 	- uppercase text (font-size is scalled down to 13px)
								.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

								Repositioning long dropdown childs (Example: Pages->Account)
									.dropdown-menu-up-n100 		- open up with top: -100px
									.dropdown-menu-up-n100 		- open up with top: -150px
									.dropdown-menu-up-n180 		- open up with top: -180px
									.dropdown-menu-up-n220 		- open up with top: -220px
									.dropdown-menu-up-n250 		- open up with top: -250px
									.dropdown-menu-up 			- open up without negative class


								Dropdown prefix icon (optional, if enabled in variables.scss)
									.prefix-link-icon .prefix-icon-dot 		- link prefix
									.prefix-link-icon .prefix-icon-line 	- link prefix
									.prefix-link-icon .prefix-icon-ico 		- link prefix
									.prefix-link-icon .prefix-icon-arrow 	- link prefix

								.nav-link.nav-link-caret-hide 	- no dropdown icon indicator on main link
								.nav-item.dropdown-mega 		- required ONLY on fullwidth mega menu

								Mobile animation - add to .navbar-collapse:
								.navbar-animate-fadein
								.navbar-animate-fadeinup
								.navbar-animate-bouncein

						-->
						<div class="collapse navbar-collapse justify-content-end navbar-animate-fadein" id="navbarMainNav">


							<!-- navbar : mobile menu -->
							<div class="navbar-xs d-none"><!-- .sticky-top -->

								<!-- mobile menu button : close -->
								<button class="navbar-toggler pt-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMainNav" aria-controls="navbarMainNav" aria-expanded="false" aria-label="Toggle navigation">
									<svg width="20" viewBox="0 0 20 20">
										<path d="M 20.7895 0.977 L 19.3752 -0.4364 L 10.081 8.8522 L 0.7869 -0.4364 L -0.6274 0.977 L 8.6668 10.2656 L -0.6274 19.5542 L 0.7869 20.9676 L 10.081 11.679 L 19.3752 20.9676 L 20.7895 19.5542 L 11.4953 10.2656 L 20.7895 0.977 Z"></path>
									</svg>
								</button>

								<!-- 
									Mobile Menu Logo 
									Logo : height: 70px max
								-->
								<a class="navbar-brand" href="index.php">
									<img src="logo/csis.png" width="110" height="38" alt="...">
								</a>

							</div>
							<!-- /navbar : mobile menu -->



							<!-- navbar : navigation -->
							<ul class="navbar-nav">
								<!-- Menu -->
								<!--

									Dropdown Classes (should be added to primary .dropdown-menu only, dropdown childs are also affected)
										.dropdown-menu-dark 		- dark dropdown (desktop only, will be white on mobile)
										.dropdown-menu-hover 		- open on hover
										.dropdown-menu-clean 		- no background color on hover
										.dropdown-menu-invert 		- open dropdown in oposite direction (left|right, according to RTL|LTR)
										.dropdown-menu-uppercase 	- uppercase text (font-size is scalled down to 13px)
										.dropdown-click-ignore 		- keep dropdown open on inside click (useful on forms inside dropdown)

										Repositioning long dropdown childs (Example: Pages->Account)
											.dropdown-menu-up-n100 		- open up with top: -100px
											.dropdown-menu-up-n100 		- open up with top: -150px
											.dropdown-menu-up-n180 		- open up with top: -180px
											.dropdown-menu-up-n220 		- open up with top: -220px
											.dropdown-menu-up-n250 		- open up with top: -250px
											.dropdown-menu-up 			- open up without negative class


										Dropdown prefix icon (optional, if enabled in variables.scss)
											.prefix-link-icon .prefix-icon-dot 		- link prefix
											.prefix-link-icon .prefix-icon-line 	- link prefix
											.prefix-link-icon .prefix-icon-ico 		- link prefix
											.prefix-link-icon .prefix-icon-arrow 	- link prefix

										.nav-link.nav-link-caret-hide 	- no dropdown icon indicator on main link
										.nav-item.dropdown-mega 		- required ONLY on fullwidth mega menu

								-->
								<!-- mobile only image + simple search (d-block d-sm-none) -->
								<li class="nav-item d-block d-sm-none">

									<!-- image -->
									<div class="mb-4">
										<img width="600" height="600" class="img-fluid" src="demo.files/svg/artworks/people_crossbrowser.svg" alt="...">
									</div>

									<!-- search -->
									<form method="get" action="#!search" class="input-group-over mb-4 bg-light p-2 form-control-pill">
										<input type="text" name="keyword" value="" placeholder="Quick search..." class="form-control border-dashed">
										<button class="btn btn-sm fi fi-search mx-3"></button>
									</form>

								</li>


                <!-- home -->
                <!-- home -->
                <li class="nav-item dropdown active">

                  <a href="#" id="mainNavHome" class="nav-link dropdown-toggle" 
                    data-bs-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">
                    Clients
                  </a>

                  <div aria-labelledby="mainNavHome" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover dropdown-mega-md dropdown-fadeinup">

                    <!-- 
                      optional line column separator 
                      .col-border-lg 
                    -->
                    <div class="row">

                      <div class="col-12 col-lg-6">
                        <ul class="list-unstyled">
                          <li class="dropdown-item">
                            <h3 class="fs-6 text-muted py-3 px-lg-4">
                              Analysis
                            </h3>
                          </li>
                          <li class="dropdown-item"><a href="#" class="dropdown-link">Clients</a></li>
						  <!-- <li class="dropdown-item"><a href="orders.php" class="dropdown-link">Orders</a></li> -->
                        
                        </ul>
                      </div>

                      
                    </div>


                  </div>

                </li>

				<li class="nav-item dropdown active">

                  <a href="#" id="mainNavHome" class="nav-link dropdown-toggle" 
                    data-bs-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">
                    Products
                  </a>

                  <div aria-labelledby="mainNavHome" class="dropdown-menu dropdown-menu-clean dropdown-menu-hover dropdown-mega-md dropdown-fadeinup">

                    <!-- 
                      optional line column separator 
                      .col-border-lg 
                    -->
                    <div class="row">

                      <div class="col-12 col-lg-6">
                        <ul class="list-unstyled">
                          
                          <li class="dropdown-item"><a onclick="js1();" href="products.php" class="dropdown-link">Analyze products</a></li>
						  <li class="dropdown-item"><a onclick="js1();" href="varieties.php" class="dropdown-link">List products</a></li>
						 
                        </ul>
                      </div>

					  

                      
                    </div>

					


                  </div>

				  

                </li>









							</ul>
							<!-- /navbar : navigation -->


						</div>

					</nav>

				</div>
				<!-- /Navbar -->

			</header>
			<!-- /Header -->

<!-- INTRO -->


					<div class="container mt-5 mb-5"> 

						<div class="row text-center-xs d-middle">
								
							<h1 class="display-5 fw-bold mb-0">
								<span class="text-primary">Clients</span> recommendation
							</h1>
							
							<p class="h3 fw-medium text-secondary">
							Association based on customer orders
							</p>

						</div>
					</div>
		

		
			<!-- Clients -->
		

				<div class="container"> 

					<div class="row text-center-xs">

					<div class="input-group-over">
	<input type="text" class="form-control form-control-sm iqs-input" data-container=".iqs-container" value="" placeholder="Client Search">
	<span class="fi fi-search btn btn-sm px-3 text-gray-500"></span>
</div>

<div class="iqs-container mt-3 scrollable-horizontal scrollable-styled-light" style="max-height: 270px;">
<?php
$sql = "SELECT Distinct id_client
FROM reser_requests, product, colors, category
where product.id = reser_requests.product and 
colors.id = product.color_id and
category.id = product.categoryid and
comment like 'SubClie%'";

$sql_clients = mysqli_query($con,$sql );
$i=0;
while($row_products = mysqli_fetch_array($sql_clients))
{
$i = $i+1;
?>
	<div class="form-check iqs-item">
		<input class="form-check-input" type="checkbox" id="brand-<?php echo $i; ?>" name="brand[]" value="<?php echo $row_products['id_client'];?>">
		<label class="form-check-label px-1" for="brand-1">
			<?php echo "Client #".$i."  -  ID: ".$row_products['id_client']; ?>
		</label>
	</div>
<?php
}
?>

</div>



					
					</div>	


				</div>

			
<div class="container mt-5"> 
<div class="row text-center-xs">
<button type="button" onclick="js();" class="btn btn-warning transition-hover-bottom mb-1">Analyze</button>
</div>	
</div>

<form method="post" name="frmfprdMB" action="recommendation.php">
            <input type="hidden"  name="startrowMB" value="">

        </form>



		</div><!-- /#wrapper -->

		<script src="assets/js/core.min.js"></script>
		<script  src="https://app.freshlifefloral.com/back-end/assets/js/blockui.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
		<script  type="text/javascript" src="https://handydevelopment-9415c.firebaseapp.com/vendor/sweetalert/sweetalert.min.js"></script>
		
		<script type="text/javascript">

window.onload=function() {
	$.blockUI({ baseZ: 20000, message: '<img src="https://app.freshlifefloral.com/back-end/images/cargando.gif" width="100px" height="100px" />' });
		
	setTimeout(
    function() {
		$.unblockUI();
    }, 2000);
}

		function js1(){
			$.blockUI({ baseZ: 20000, message: '<img src="https://app.freshlifefloral.com/back-end/images/cargando.gif" width="100px" height="100px" />' });
			}

			function js(){


				$.blockUI({ baseZ: 20000, message: '<img src="https://app.freshlifefloral.com/back-end/images/cargando.gif" width="100px" height="100px" />' });


				var array = []
				var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')

				for (var i = 0; i < checkboxes.length; i++) {
				array.push(checkboxes[i].value)
				}

				//alert(array);

				var Tag = array;
				document.frmfprdMB.startrowMB.value = Tag;
				document.frmfprdMB.submit();
				
			}
		</script>
	</body>
</html>
