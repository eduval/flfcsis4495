<?php

/**********************************************************/
/***********CAMBIAR LINEA DE CONEXION EN SITIO REAL *******/
//require_once("../config/config_gcp.php");
/**********************************************************/
/**********************************************************/
/***********CAMBIAR LINEA DE CONEXION EN SITIO local *******/
require_once("config_gcp.php");
/**********************************************************/
include('GlobalFSyn-view.php');
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
                          <li class="dropdown-item"><a onclick="js()"; href="clients.php" class="dropdown-link">Clients</a></li>
                        
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
                          
                          <li class="dropdown-item"><a onclick="js()"; href="products.php" class="dropdown-link">Analyze products</a></li>
						  <li class="dropdown-item"><a href="#" class="dropdown-link">List products</a></li>
						 
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

	<input type="hidden" id="query2" value="<?php echo "select p.name as Produtcname, p.subcate_name as subcatename, p.image_path as img, col.name as color, cat.name as categotyname from product as p, colors as col, category as cat where p.status_image = '0' and p.status_image = '0' and col.id = p.color_id and cat.id = p.categoryid"; ?>" />
			
<div class="container mt-5 mb-5"> 

	<div class="row text-center d-middle">
		
				
				<h1 class="display-5 fw-bold mb-0">
					<span class="text-primary">List of </span> Flower
				</h1>
				
				<p class="h3 fw-medium text-secondary">
				Some of the most popular varieties
				</p>

		
				</div>
				</div>

			<!-- SERVICES -->
			
				
			<div class="container"> 

			
				<div id="load_data_item">

				</div>

				<div id="load_data_message">

				</div>
			</div>
		
		
			<!-- /SERVICES -->



			<!-- Footer -->
			<footer id="footer" class="bg-gray-900 text-white">

				<!-- footer cta -->
				<div class="container tet-white py-5 d-lg-flex flex-row align-items-lg-center">

					<div class="row g-4 align-items-center">
						<h3 class="col-lg-6 h2 mb-0">
							Click to know all details about Applied Research Project course.
						</h3>
						<div class="col text-lg-end">
							<a href="https://www.douglascollege.ca/course/csis-4495" target="_blank" rel="noopener" class="btn btn-warning rounded-pill d-inline-flex align-items-center px-4">
								<span class="text-dark me-2">Start now</span>
								<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">  
								  <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"></path>
								</svg>
							</a>
						</div>
					</div>

				</div>
				<!-- /footer cta -->

				<!-- line divider -->
				<hr class="bg-gray-500 my-0 container">
				
				<div class="container py-5">

					<div class="row g-4">
						
						<div class="col-12 col-lg-6 mb-4">

							<!-- logo -->
							

							<div class="my-4"><!-- copyright -->
								<p class="small mb-0">&copy; 2024 CSIS-4495 Applied Research Project.</p>
								<p class="small mb-0">All rights reserved.</p>
							</div>

							<!-- social icons -->
							<a href="#" class="btn btn-sm text-white transition-hover-top mb-2 rounded-circle bg-gray-700" rel="noopener" aria-label="facebook page">
								<i class="fi fi-social-facebook"></i> 
							</a>

							<a href="#" class="btn btn-sm text-white transition-hover-top mb-2 rounded-circle bg-gray-700" rel="noopener" aria-label="twitter page">
								<i class="fi fi-social-twitter"></i> 
							</a>

							<a href="#" class="btn btn-sm text-white transition-hover-top mb-2 rounded-circle bg-gray-700" rel="noopener" aria-label="linkedin page">
								<i class="fi fi-social-linkedin"></i> 
							</a>

							<a href="#" class="btn btn-sm text-white transition-hover-top mb-2 rounded-circle bg-gray-700" rel="noopener" aria-label="youtube page">
								<i class="fi fi-social-youtube"></i> 
							</a>

						</div>

						<div class="col-12 col-lg-6 mb-4">

							<h3 class="small mb-4">GET IN TOUCH</h3>

							<p class="small col-md-10">
							We understand that finding the perfect product can be a daunting task, and that's why we're here to simplify the process for you. Our curated selection spans across a diverse range of categories, ensuring there's something for everyone. 	</p>

	            <div class="small d-flex align-items-start my-3">
	              <svg class="me-3 flex-none my-1" height="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
	                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
	                <circle cx="12" cy="10" r="3"></circle>
	              </svg>
	              <ul class="list-unstyled p-0 m-0 w-100">
	                <li>700 Royal Avenue</li>
	                <li>New Westminster, BC</li>
	                <li>V3M 5Z5</li>

					


	              </ul>
	            </div>

	            <div class="small d-flex align-items-start my-3">
	              <svg class="me-3 flex-none my-1" height="24px" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">  
	                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"></path>
	              </svg>
	              <ul class="list-unstyled p-0 m-0 w-100">
	                <li>General Phone: <a href="tel:604 527 5400" class="text-white text-dashed">
604 527 5400</a></li>
	                <li>International Phone : <a href="tel:604 527 5650" class="text-white text-dashed">604 527 5650</a></li>
	              </ul>
	            </div>

						</div>


						

					</div>

				</div>

			</footer>
			<!-- /Footer -->


		</div><!-- /#wrapper -->

		<script src="assets/js/core.min.js"></script>
		<script  src="https://app.freshlifefloral.com/back-end/assets/js/blockui.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">
		<script  type="text/javascript" src="https://handydevelopment-9415c.firebaseapp.com/vendor/sweetalert/sweetalert.min.js"></script>
		
		<script type="text/javascript">

			function js(){
			$.blockUI({ baseZ: 20000, message: '<img src="https://app.freshlifefloral.com/back-end/images/cargando.gif" width="100px" height="100px" />' });
			}

window.onload=function() {

	$.blockUI({ baseZ: 20000, message: '<img src="https://app.freshlifefloral.com/back-end/images/cargando.gif" width="100px" height="100px" />' });
				

  var limit =12;
  var start =0;
  var action = 'inactive';
  var query2 = document.getElementById('query2').value;


    function load_data(limit, start){

    $.ajax({
         type: "POST",
         url: "scrollingDataView.php",
         data: {limit:limit, start:start, query:query2},
         cache: false,
         success: function(r){
         //  alert(r);
		 $.unblockUI();
            $('#load_data_item').append(r);
            if(r=="<div class='row gutters-xs--xs'></div>"){
                $('#load_data_message').html("<h6><span class='badge badge-secondary'>Not data found!</span></h6>");
            }else{
                $('#load_data_message').html("<center><div class='spinner-grow text-primary' role='status'><span class='sr-only'>Loading...</span></div></center>");
                action = "inactive";
            }
         }
     });



   }

   if(action == 'inactive'){
      action = 'active';
      load_data(limit, start);
   }


  $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data_item").height() && action == 'inactive')
      {
		
        action = 'active';
        start = start + limit;
        setTimeout(function(){
            load_data(limit, start)
        },700);
      }
  });



     


}
</script>
		
	</body>
</html>

