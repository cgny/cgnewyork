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

				<div class="col-md-9 col-md-offset-3">
					<div class="projects">

						<article class="post">
							<div class="post-media">
								<img src="/images/404.jpg" alt="Contact">
							</div>
							<div class="post-content">
								<!-- The Content -->
								<div class="the-content">
									<h2 class="title">OOP! THIS PAGE CAN NOT BE FOUND</h2>
									<div class="post_404_not_found">
										<div class="page_message_404">
											Maybe searching or one of the links, can help you.
										</div>
										<div class="go-to-home">
											<a href="index-2.html">Back To Home</a>
										</div>
									</div>
								</div>
								<!-- End The Content -->

							</div>

						</article>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Wrapper Site -->

	<!-- Footer -->
    <?php include('partials/footer.php'); ?>
</body>


</html>