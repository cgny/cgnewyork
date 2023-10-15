<!DOCTYPE html>
<html lang="en">

<?php include('partials/header.php'); ?>


<body class="home">

	<!-- Wrapper Site -->
	<div id="main-content">

		<!-- Preload -->
		<div id="preload">
			<div class="kd-bounce">
				<div></div>
				<div></div>
			</div>
		</div>
		<!-- Preload -->

		<!-- Mobile Menu -->
        <?php include('partials/mobile-menu.php'); ?>
		<div class="hide-menu"></div>
		<!-- End Mobile Menu -->

		<div class="container">
			<div class="row">

                <?php include('partials/menu.php'); ?>
                <?php include('partials/portfolio.php'); ?>

                <?php

                    if(!isset($_GET['p']))
                    {
                        $p = 2;
                    }
                    else
                    {
                        $p = $_GET['p'];
                    }

                    if(isset($imgs[ $p ]) && !empty($imgs[ $p ]))
                    {
                        $info = $imgs[ $p ];
                    }
                    else
                    {
                        $p = 2;
                        $info = $imgs[ $p ];
                    }

                ?>


				<div class="col-md-9 col-md-offset-3">
					<div class="projects">
						<div class="project">
							<div class="detail-content">
								<h2 class="title">
                                    <?= $info['name'] ?>
								</h2>
								<div class="the-content">
									<p><?= $info['info'] ?></p>
								</div>
                                <!--
								<div class="project-attributes">
									<table>
										<tbody>
										<tr>
											<td class="name">Client</td>
											<td class="value">
												<a href="http://kendytheme.net/">Royal Building</a>											</td>
										</tr>
										<tr>
											<td class="name">Year</td>
											<td class="value">07/2016</td>
										</tr>
										<tr>
											<td class="name">Location</td>
											<td class="value">NewYork City , USA</td>
										</tr>
										<tr>
											<td class="name">Budget</td>
											<td class="value">$10.000,00</td>
										</tr>
										<tr>
											<td class="name">Category</td>
											<td class="value">Branding Design</td>
										</tr>
										<tr>
											<td class="name">Share</td>
											<td class="value">
												<div class="socials">
													<div class="kd-sharing-post-social">
														<a href="#"><i class="fa fa-facebook"></i></a>
														<a href="#"><i class="fa fa-twitter"></i></a>
														<a href="#"><i class="fa fa-instagram"></i></a>
														<a href="#"><i class="fa fa-google-plus"></i></a>
														<a href="#"><i class="fa fa-linkedin"></i></a>
													</div>
												</div>
											</td>
										</tr>
										</tbody>
									</table>
								</div>
								-->
							</div>

                            <div class="images-project">
                                <a href="images/projects/ig<?= $p ?>.jpg" class="popup">
                                    <img src="images/projects/ig<?= $p ?>.jpg" alt="project <?= $p ?> ">
                                </a>
                            </div>

							<!-- Navigation
							<div class="navigation-wrap">
								<a href="#" class="page-numbers"><i class="fa fa-angle-left"></i></a>
								<a href="#" class="page-numbers"><i class="fa fa-th"></i></a>
								<a href="#" class="page-numbers"><i class="fa fa-angle-right"></i></a>
							</div>
							End Navigation -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Wrapper Site -->

	<!-- Footer -->
    <?php include('partials/footer.php'); ?>

</body>

<!-- Mirrored from template.kendytheme.net/kelly/single-project.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 19 Aug 2021 08:30:24 GMT -->
</html>