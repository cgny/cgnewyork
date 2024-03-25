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

				<div class="col-md-9 col-md-offset-3">
					<div class="projects">

						<article class="post">
							<div class="post-media">
								<a href="#">
                                    <img src="/images/projects/7.jpg" alt="About">
								</a>
							</div>
							<div class="post-content">
								<h2 class="title">Contact Me</h2>

								<!-- The Content -->
								<div class="the-content">
									<p>
										Hello! Feel free to contact me for freelance work or any questions about my art. Thank you!
									</p>
									<ul>
										<li>
                                            <strong>Email:</strong> christian@cgnewyork.com
										</li>
									</ul>
									<p>&nbsp;</p>

									<form action="send.php" method="post" class="comment-form contact">
										<div class="contact-item form-name">
											<input name="author" value="" type="text" placeholder="Your Name *">
										</div>
										<div class="contact-item form-email">
											<input name="email" value="" type="text" placeholder="Your Email *">
										</div>
										<div class="contact-item form-url">
											<input id="url" name="url" value="" type="text" placeholder="Subject">
										</div>
										<div class="contact-item field-full form-message">
											<textarea name="comment" placeholder="Message *"></textarea>
										</div>
										<div class="contact-item form-submit">
											<input name="submit" type="submit" id="submit" class="submit" value="Send Message">
										</div>
									</form>
									<p>&nbsp;</p>

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