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
                          <li class="dropdown-item"><a onclick="js();" href="clients.php" class="dropdown-link">Clients</a></li>
                        
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
                          
                          <li class="dropdown-item"><a onclick="js();" href="products.php" class="dropdown-link">Analyze products</a></li>
						  <li class="dropdown-item"><a onclick="js();" href="varieties.php" class="dropdown-link">List products</a></li>
						 
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
			<div class="section">

				<div class="container min-vh-50 pt-5"> 

					<div class="row text-center-xs d-middle">
						
						<div class="col-12 col-md-6 order-2 order-md-1 pb-5" data-aos="fade-up" data-aos-delay="0">

							<div class="mb-5">
								
								<h1 class="display-3 fw-bold mb-0">
									<span class="text-primary">Product</span> recommendation
								</h1>
								
								<p class="h1 fw-medium mb-4">
									Fresh Life Floral
								</p>

								<p class="lead">
								Web application that integrates the Apriori algorithm to efficiently identify related flower varieties, facilitating the creation of targeted and personalized promotions.</p>

							</div>

						</div>

						<div class="col-12 col-md-6 order-1 order-md-2 pb-5" data-aos="fade-up" data-aos-delay="200">

							<!-- svg image -->
							<img width="600" height="400" class="img-fluid" src="demo.files/svg/premium/production.svg" alt="Product recommendation">

						</div>

					</div>


				</div>

			</div>	
			<!-- /INTRO -->




			




			<!-- SERVICES -->
			<div class="section bg-gray-200">
				<div class="container"> 


					<h2 class="display-5 fw-bold mb-5">
					Apriori association algorithm

						<!-- typed -->
						<span class="typed text-muted" 
								data-typed-string="analyze floral patterns |analyze uncover associations"
								data-typed-speed-forward="80" 
								data-typed-speed-back="30" 
								data-typed-back-delay="700" 
								data-typed-loop-times="infinite" 
								data-typed-smart-backspace="true" 
								data-typed-shuffle="false" 
								data-typed-cursor="|"></span>

					</h2>


					<!--
						For no animation on hover, remove:
						shadow-lg-hover transition-all-ease-250 transition-hover-top
					-->
					<div class="row" data-aos="fade-in" data-aos-delay="0">

						<div class="col-12 col-lg-4 mb-4">

							<div class="card border-0 shadow-primary-xs shadow-primary-md-hover transition-all-ease-250 transition-hover-top h-100 rounded overflow-hidden">

								<div class="clearfix">
									<img class="img-fluid" src="demo.files/images/unsplash/covers/ilya-pavlov-OqtafYT5kTw-unsplash.jpg" alt="...">

									<!-- bottom waves -->
									<svg style="margin-top:-50px;" class="mb-3" width="100%" height="50px" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
										<path style="opacity:0.15" d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
										<path style="opacity:0.3" d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
										<path style="opacity:1" d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
									</svg>

								</div>

								<!-- lines, looks like through a glass -->
								<div class="absolute-full w-100 overflow-hidden">
									<img class="img-fluid" width="2000" height="2000" src="assets/images/masks/shape-line-lense.svg" alt="...">
								</div>

								<div class="card-body fw-light mt-5">

									<h2 class="h5 card-title mb-4">
									Association based on customer orders 
									</h2>

									<p class="lead">
									Apriori algorithm involves analyzing purchasing patterns to identify frequent itemsets and associations among products. The Apriori algorithm helps reveal connections between items that are often bought together, providing valuable insights for businesses. 	</p>

								</div>

								<div class="card-footer bg-transparent border-0">
									<span class="float-end fs-6 text-gray-500 p-2">
										Cliente orders
									</span>

									<a href="clients.php" class="btn btn-sm btn-primary btn-soft opacity-6">
										Start
									</a>
								</div>

							</div>

						</div>

						<div class="col-12 col-lg-4 mb-4">

							<div class="card border-0 shadow-primary-xs shadow-primary-md-hover transition-all-ease-250 transition-hover-top h-100 rounded overflow-hidden">

								<div class="clearfix">
									<img class="img-fluid" src="demo.files/images/unsplash/covers/room-7DzpP1IVo8Y-unsplash.jpg" alt="...">

									<!-- bottom waves -->
									<svg style="margin-top:-50px;" class="mb-3" width="100%" height="50px" fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 300" preserveAspectRatio="none">
										<path style="opacity:0.15" d="M 1000 299 l 2 -279 c -155 -36 -310 135 -415 164 c -102.64 28.35 -149 -32 -232 -31 c -80 1 -142 53 -229 80 c -65.54 20.34 -101 15 -126 11.61 v 54.39 z"></path>
										<path style="opacity:0.3" d="M 1000 286 l 2 -252 c -157 -43 -302 144 -405 178 c -101.11 33.38 -159 -47 -242 -46 c -80 1 -145.09 54.07 -229 87 c -65.21 25.59 -104.07 16.72 -126 10.61 v 22.39 z"></path>
										<path style="opacity:1" d="M 1000 300 l 1 -230.29 c -217 -12.71 -300.47 129.15 -404 156.29 c -103 27 -174 -30 -257 -29 c -80 1 -130.09 37.07 -214 70 c -61.23 24 -108 15.61 -126 10.61 v 22.39 z"></path>
									</svg>

								</div>

								<!-- lines, looks like through a glass -->
								<div class="absolute-full w-100 overflow-hidden">
									<img class="img-fluid" width="2000" height="2000" src="assets/images/masks/shape-line-lense.svg" alt="...">
								</div>

								<div class="card-body fw-light mt-5">

									<h2 class="h5 card-title mb-4">
									Association based on products 
									</h2>

									<p class="lead">
									Involves examining the relationships and connections between various attributes within a set of products. This algorithm identifies frequent itemsets, which are combinations of product features that frequently occur together. 	</p>

								</div>

								<div class="card-footer bg-transparent border-0">
									<span class="float-end fs-6 text-gray-500 p-2">
										Products
									</span>

									<a href="products.php" class="btn btn-sm btn-primary btn-soft opacity-6">
										Start
									</a>
								</div>

							</div>

						</div>

						<div class="col-12 col-lg-4 mb-4">

							<div class="card border-0 shadow-primary-xs shadow-primary-md-hover transition-all-ease-250 h-100 rounded overflow-hidden">

								<div class="card-body fw-light mt-5">

									<h2 class="h5 card-title mb-4">
									 Data Collection Methods
									</h2>

									<p class="lead">
									For this project, the primary data source is the company database provided in .csv format. The dataset contains <strong>56,999 records</strong> from <strong>81 clients</strong> with data spanning from May 2020 to May 2021. 
									<br><br>The data collection process involves importing and parsing this dataset to extract relevant information for analysis. The company database includes transactional data, customer preferences, and product information.	</p>

									<p class="text-success">
										<ul>
											<li>Language Programming	PHP, JavaScript, HTML, CSS, Python</li>
											<li>Development Framework	Bootstrap, PHP</li>
										</ul>
									

									</p>

									

								</div>

								<div class="card-footer bg-transparent border-0">
									<a href="#" class="btn btn-sm btn-success btn-soft">
									<svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
  <path d="m2.759 24 .664-.144c.207-.044.412-.085.619-.126.318-.062.637-.123.955-.182.24-.046.48-.085.721-.129l.055-.015c.25-.044.498-.09.747-.12l1.214-.179v-23.106h-.042c-.63.004-1.256.016-1.884.036-.689.018-1.394.06-2.084.105-.299.021-.6.046-.899.07h-.045v23.784zm6.152-23.985v22.942c.861-.1 1.72-.182 2.582-.246 2.121-.161 4.248-.211 6.373-.151 1.128.034 2.253.099 3.374.192v-21.249c-1.004-.229-2.012-.432-3.028-.607-1.968-.342-3.955-.581-5.947-.731-1.114-.081-2.233-.132-3.352-.149h-.002zm10.763 14.797-.046-.004-.561-.061c-1.399-.146-2.805-.242-4.207-.291-1.407-.045-2.815-.03-4.223.016h-.044c-.045 0-.091 0-.135-.016-.101-.03-.195-.074-.267-.149-.127-.136-.186-.315-.156-.495.008-.061.029-.105.054-.166.027-.044.063-.104.104-.134.043-.045.09-.075.143-.104.061-.03.121-.046.18-.061h.09c.195 0 .391-.016.57-.016 1.395-.029 2.773-.029 4.169.03 1.439.06 2.864.165 4.288.33l.151.015c.044.016.089.016.135.03.105.046.194.105.255.181.044.044.074.104.105.164.029.061.044.12.044.18.015.165-.044.33-.164.45-.046.046-.091.075-.135.105-.047.03-.105.044-.166.06-.03.016-.045.016-.089.016h-.047zm.035-2.711c-.044 0-.044 0-.09-.006l-.555-.071c-1.395-.179-2.804-.3-4.198-.359-1.395-.075-2.805-.09-4.214-.06l-.046-.016c-.045-.015-.09-.015-.135-.029-.09-.03-.194-.09-.254-.166-.03-.045-.076-.104-.09-.148-.075-.166-.075-.361.014-.525.031-.061.061-.105.105-.15s.09-.09.15-.104c.061-.03.119-.06.18-.06l.09-.016.585-.015c1.396-.016 2.774.015 4.153.09 1.439.075 2.865.21 4.289.39l.149.016.091.014c.105.031.194.075.27.166.12.119.18.284.165.449 0 .061-.016.121-.045.165-.029.06-.061.104-.09.15-.03.044-.074.075-.136.12-.044.029-.104.045-.164.061l-.091.014h-.042zm0-2.711c-.044 0-.044 0-.09-.006l-.555-.08c-1.395-.19-2.789-.334-4.198-.428-1.395-.092-2.805-.135-4.214-.129h-.046l-.09-.016c-.059-.016-.104-.036-.164-.068-.15-.092-.256-.254-.285-.438 0-.061 0-.12.016-.18.014-.061.029-.117.059-.17.031-.054.076-.102.121-.144.074-.075.18-.126.285-.15.045-.011.089-.015.135-.015h.569c1.439.009 2.879.064 4.304.172 1.395.105 2.774.26 4.153.457l.15.021c.046.007.061.007.09.019.06.02.12.046.165.08.061.033.104.075.135.123s.061.101.09.158c.062.156.045.334-.029.479-.029.055-.061.105-.105.146-.075.074-.164.127-.27.15-.029.012-.046.012-.091.014l-.044.005zm0-2.712c-.044 0-.044 0-.09-.007l-.555-.09c-1.395-.225-2.789-.391-4.198-.496-1.395-.119-2.805-.179-4.214-.209h-.046l-.105-.014c-.061-.015-.115-.045-.165-.074-.053-.031-.099-.076-.14-.121-.036-.045-.068-.104-.094-.149-.02-.06-.037-.12-.044-.181-.016-.18.053-.371.181-.494.074-.075.176-.125.279-.15.045-.015.09-.015.135-.015.189 0 .38.005.57.008 1.437.034 2.871.113 4.304.246 1.387.119 2.77.3 4.145.524l.135.016c.04 0 .052 0 .09.014.062.016.112.046.165.076.046.029.09.074.125.119.091.135.135.301.105.465-.015.061-.031.105-.061.166-.03.045-.074.104-.12.135-.074.074-.165.119-.271.149h-.135zm-15.67-.509c-.09 0-.181-.021-.271-.063-.194-.095-.314-.293-.329-.505 0-.057.015-.111.03-.165.014-.068.045-.133.09-.19.045-.065.104-.12.164-.162.077-.05.167-.076.241-.092l.48-.044c.659-.058 1.305-.105 1.949-.144h.06c.105.004.195.024.271.071.194.103.314.305.314.519 0 .055-.015.109-.029.161-.016.067-.045.132-.091.189-.044.075-.104.12-.165.165-.074.045-.15.074-.24.09-.104.015-.209.015-.314.03-.136.015-.286.015-.436.031l-1.168.088-.285.031c-.061.015-.122.015-.196.015zm15.655-2.201-.091-.01-.554-.1c-1.395-.234-2.805-.425-4.214-.564-1.395-.138-2.804-.225-4.214-.271h-.045l-.09-.018c-.061-.015-.105-.038-.165-.071-.045-.03-.091-.072-.135-.121-.12-.138-.165-.33-.12-.506.016-.061.045-.12.074-.18.031-.061.076-.105.121-.15.074-.076.18-.121.285-.15.045-.015.089-.015.135-.015l.584.015c1.395.061 2.774.15 4.154.301 1.439.148 2.864.359 4.288.6l.15.014c.046 0 .061 0 .09.016.06.015.12.045.165.074.135.105.225.256.239.421.016.06 0 .12-.015.181 0 .059-.029.119-.059.164-.031.045-.062.09-.105.135-.076.076-.181.12-.286.135l-.086.014h-.046zm-15.672-.769c-.086 0-.171-.019-.25-.056-.07-.033-.134-.079-.187-.137-.045-.053-.086-.112-.111-.181-.02-.049-.034-.101-.039-.156-.022-.214.078-.427.255-.546.078-.054.167-.086.26-.099.158-.014.314-.014.473-.029.65-.045 1.301-.075 1.949-.105h.048c.091.016.181.03.256.075.179.105.3.315.3.524 0 .061-.016.121-.03.166-.03.074-.06.135-.104.195-.047.06-.107.12-.182.15-.075.045-.165.075-.255.075-.104.014-.21.014-.33.014l-.449.031c-.405.029-.795.045-1.186.074l-.3.016c-.075.015-.134.015-.194.015z"></path>
</svg>
										Read proposal
									</a>
								</div>

							</div>

						</div>

					</div>

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
			</script>
	</body>
</html>

