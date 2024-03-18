<!DOCTYPE html>
<html lang="en">

<?php
include('classes/Ext.class.php');

use classes\Ext;

include('partials/header.php');
?>

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

                        <?php
                            foreach($imgs as $k => $img)
                            {
                                if($img['tag'])
                                {
                                    echo '<a class="tag-section" id="'. $img['tag'] .'" name="'. $img['tag'] .'">'. $img['tag'] .'</a>';
                                }
                                ?>

                                <div class="project-sub parent">
                                    <div class="project-item x">
                                            <?php
                                            $ext = Ext::determineExt($k);
                                            if($ext){ ?> <img class="portfolio-img category" src="images/projects/c<?= $k ?>.<?= $ext ?>" alt=""> <?php } ?>

                                        <h2 class="title">
                                            <a><?= $img['name'] ?></a>
                                        </h2>
                                    </div>
                                <?php

                                    if(isset($img['technologies']))
                                    {
                                        ?>
                                        <div class="details">
                                        <?php

                                        foreach ($img['technologies'] as $sub_k => $sub_img)
                                        {
                                            ?>
                                            <div class="project-item project-item-sub">
                                                    <?php
                                                    $ext = "";
                                                    $ext = Ext::determineExt($k,$sub_k);
                                                    if($ext){ ?>
                                                        <?= $sub_img['name'] ?>
                                                            <br>
                                                        <img class="portfolio-img"
                                                             src="images/projects/c<?= "$k-$sub_k" ?>.<?= $ext ?>"
                                                             alt="">
                                                    <?php } ?>
                                            <h2 class="title">
                                                    <!-- <a href="#"><?= $sub_img['name'] ?></a> -->
                                                </h2>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                        </div>
                                        <?php
                                    }
                                ?>

                                </div>
                                <?php

                            }
                        ?>

						<!-- Pagination
						<div class="pagination-wrap">
							<ul>
								<li>
									<a class="prev page-numbers" href="#">
										<i class="fa fa-long-arrow-left"></i>
									</a>
								</li>
								<li>
									<a class="page-numbers" href="#">1</a>
								</li>
								<li>
									<span class="page-numbers current">2</span>
								</li>
								<li>
									<a class="page-numbers" href="#">3</a>
								</li>
								<li>
									<a class="page-numbers" href="#">4</a>
								</li>
								<li>
									<a class="next page-numbers" href="#">
										<i class="fa fa-long-arrow-right"></i>
									</a>
								</li>
							</ul>

						</div>
						 End Pagination -->
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