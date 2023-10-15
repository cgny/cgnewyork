<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/13/21
 * Time: 11:58 AM
 */

?>
<div class="col-md-3">
    <div class="header affix">
        <div class="table">
            <div class="table-cell">
                <!-- Logo -->
                <div class="logo">
                    <a href="/index.php">Christian Gibbs</a>
                </div>
                <!-- End Logo -->

                <!-- Navigation -->
                <div class="main-menu">
                    <nav>
                        <ul class="menu-list">
                            <li class="<?php if(isset($_SERVER['REQUEST_URI']) && ( $_SERVER['REQUEST_URI'] == "/" || stristr($_SERVER['REQUEST_URI'],"index")) ){ echo "active"; } ?> menu-item-has-children">
                                <a href="/index.php#home">Home</a>
                            </li>
                            <li>
                                <a href="/index.php#server">Server Side</a>
                            </li>
                            <li>
                                <a href="/index.php#ecommerce">E-Commerce</a>
                            </li>
                            <li>
                                <a href="/index.php#third_party">Third Party</a>
                            </li>
                            <li>
                                <a href="/index.php#development">Development</a>
                            </li>
                            <li>
                                <a href="/index.php#frontend">Front End</a>
                            </li>
                            <li class="<?php if(isset($_SERVER['REQUEST_URI']) && ( $_SERVER['REQUEST_URI'] == "/about.php" || stristr($_SERVER['REQUEST_URI'],"about")) ){ echo "active"; } ?>">
                                <a href="/about.php">About Me</a>
                            </li>
                            <li class="<?php if(isset($_SERVER['REQUEST_URI']) && ( $_SERVER['REQUEST_URI'] == "/contact.php" || stristr($_SERVER['REQUEST_URI'],"contact")) ){ echo "active"; } ?>">
                                <a href="/contact.php">Contact</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End Navigation -->

                <!-- Socials -->
                <div class="socials">
                    <a href="https://www.linkedin.com/in/cgibbs2010" title="LinkedIn" >
                        <i class="fa fa-linkedin"></i>
                    </a>
                    <!--
                    <a href="#" title="Dribbble">
                        <i class="fa fa-dribbble"></i>
                    </a>
                    <a href="#" title="Facebook">
                        <i class="fa fa-facebook"></i>
                    </a>
                    <a href="#" title="Google Plus">
                        <i class="fa fa-google-plus"></i>
                    </a>
                    -->
                    <!--
                    <a href="#" title="Search this site">
                        <i class="fa fa-search"></i>
                    </a>
                    -->
                </div>
                <div class="box-search">
                    <div class="table">
                        <div class="table-cell">
                            <div class="container">
                                <form class="search-form" action="#" method="get">
                                    <input type="search" name="s" class="search-field" placeholder="Type &amp; hit enter" value="" title="Search">
                                    <div class="kd-close">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Socials -->

                <div class="copyright">
                    <p>
                        CGNY @ <?php echo date("Y"); ?>
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
