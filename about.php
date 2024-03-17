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

                <?php include('partials/portfolio.php'); ?>
                <?php include('partials/menu.php'); ?>

                <a name="home"></a>
				<div class="col-md-9 col-md-offset-3">
					<div class="projects">

						<article class="post">
							<div class="post-media">
                                <img src="images/IMG_20230607_015920.jpg" alt="Contact">
							</div>
							<div class="post-content">
								<h2 class="title">About Me</h2>

								<!-- The Content -->
								<div class="the-content">
									<p>Senior level PHP sofwtare engineer/developer with over 17 years of development experience.</p>
                                    <ul>
                                        <li>
                                            Self-motivated software developer
                                        </li>
                                        <li>
                                            Time management efficiency
                                        </li>
                                        <li>
                                            Results driven planning and project management
                                        </li>
                                        <li>
                                            Full cycle development
                                        </li>
                                    </ul>


									<blockquote>
										<p> There's always a solutions. </p>
										<footer>Christian G.</footer>
									</blockquote>

                                    <?php include('partials/professional-links.php'); ?>

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