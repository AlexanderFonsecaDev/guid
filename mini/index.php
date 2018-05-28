<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Scored</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/assets/bootstrap.min.css">

    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="css/assets/font-awesome.min.css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="css/assets/animate.css">

    <!-- Mean Menu -->
    <link rel="stylesheet" href="css/assets/meanmenu.min.css">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="css/assets/owl.carousel.min.css">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="css/assets/magnific-popup.css">

    <!-- Custom Style -->
    <link rel="stylesheet" href="css/assets/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/assets/responsive.css">

    <!--Hover css -->
    <link rel="stylesheet" href="css/Hover-master/css/hover-min.css">

    <?php
    require_once 'api/datos.php';

    $ruta = "";
    if (isset($_GET['ruta'])) {
        $ruta = $_GET['ruta'];
    }

    /*
     * Validamos los datos del usuario
     */
    $datos = 0;
    if (isset($ruta)) {
        $datos = datosClub($ruta);
        $nombre = "";
        $portada = "";
        $logo = "";
        while ($datos->next_record()) {
            $nombre = $datos->f('nombre');
            $portada = $datos->f('portada');
            $logo = $datos->f('logo');
        }
    }


    ?>


</head>
<body>
<!-- Pre-Loader -->
<div id="page-preloader"><span class="spinner"></span></div>
<!-- End Pre-Loader -->

<!-- Logo Area -->
<section class="logo-area">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="logo">
                    <a href=""><img src="images/scored_logo.png" alt="" class="img-fluid"></a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="searchbar buscador">
                    <form action="#">
                        <input placeholder="Buscar..." type="text" required="">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="searchbar text-right">
                    <div class="registro_club">
                        <span class="boton_rojo">Registre su club</span>
                        <span class="boton_negro">Registre su jugador</span>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- End Logo Area -->

<!-- Menu Area -->
<section class="menu-area">
    <div class="container">
        <div class="menu-content">
            <div class="row">
                <div class="col-lg-2 col-md-12">
                    <?php
                    if (empty($portada)) {
                        ?>
                        <img src="images/soccer/logo_equipo.png" alt="" style="width: 100px;">
                        <?php
                    } else {
                        ?>
                        <img src="../infoclubs/<?=$ruta?>/<?=$logo?>" alt="" style="width: 100px;">
                        <?php
                    }
                    ?>
                </div>
                <div class="col-lg-8 col-md-12" style="justify-content: center;display: flex;align-self: center;">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item active"><a href="index__.html">Inicio</a></li>
                        <li class="list-inline-item"><a href="" class="hvr-sweep-to-right">Quienes Somos</a></li>
                        <li class="list-inline-item"><a href="" class="hvr-sweep-to-right">Nuestros Servicios</a></li>
                        <li class="list-inline-item"><a href="" class="hvr-sweep-to-right">Tienda Online</a></li>
                    </ul>
                </div>
                <div class="col-lg-2 col-md-12 icono-busqueda iniciar">
                    <i class="fa fa-user usuario"></i>
                    <div class="text-right">
                        <a href="">
                            <span class="text-light">iniciar sesion</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Menu Area -->


<!-- Mobile Menu -->
<section class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <a href=""><img src="images/scored_logo.png" alt="" class="img-fluid" style="width: 100px;"></a>
                        <a href=""><i class="fa fa-home"></i></a>
                        <ul>
                            <li class="list-inline-item"><a href="index__.html">HOME</a></li>
                            <li class="list-inline-item"><a href="">Quienes Somos</a></li>
                            <li class="list-inline-item"><a href="">Nuestros Servicios</a></li>
                            <li class="list-inline-item"><a href="">Tienda Online</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Mobile Menu -->

<!-- Page Heading -->
<section class="p-heading text-center">
    <div class="container">
        <div class="page-bg" id="fondo">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-content">
                        <?php
                        if (empty($nombre)) {
                            ?>
                            <h4>Sin nombre</h4>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="">Club</a></li>
                                </li>
                            </ul>
                            <?php
                        } else {
                            ?>
                            <h4><?= $nombre ?></h4>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item"><a href="">Club</a></li>
                                </li>
                            </ul>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Page Heading -->

<!----- espacio para publicidad---->
<section class="allnews">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img src="images/publicidad.jpg" alt="" class="imagen-publicidad">
            </div>
        </div>
    </div>
</section>
<!----- fin espacio para publicidad---->

<!-- Catagory -->
<section class="catagory">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/ball-football-game-39562.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/stadium-2921657_1280.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/robert-katzki-132636-unsplash.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/alex-387568-unsplash.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/nathan-rogers-558657-unsplash.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="catagory-two">
                            <img src="images/soccer/nuevas/alvaro-mendoza-602538-unsplash.jpg" alt="" class="img-fluid">
                            <h6><a href="">These sentences are selected from various online news.</a></h6>
                            <ul class="list-unstyled list-inline">
                                <li class="list-inline-item">TECHNOLOGY</li>
                                <li class="list-inline-item">September 24, 2017</li>
                            </ul>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque labore, quam
                                voluptatibus ipsum. Ex tenetur, quasi, provident animi magni voluptas fugit quae
                                ad........</p>
                        </div>
                    </div>
                </div>
                <div class="pagi pagi2">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item active"><a href="">1</a></li>
                        <li class="list-inline-item"><a href="">2</a></li>
                        <li class="list-inline-item"><a href="">3</a></li>
                        <li class="list-inline-item"><a href="">...</a></li>
                        <li class="list-inline-item"><a href="">15</a></li>
                        <li class="list-inline-item"><a href=""><i class="fa fa-angle-right"></i></a></li>
                        <li class="list-inline-item"><a href=""><i class="fa fa-angle-double-right"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="follow-widget">
                    <h4>Siguenos</h4>
                    <ul class="list-unstyled clearfix">
                        <li>
                            <a href="">
                                <i class="fa fa-facebook"></i>
                                <p><span>44,410</span>fans</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-twitter"></i>
                                <p><span>31,219</span>subscriber</p>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-youtube"></i>
                                <p><span>56,717</span>subscriber</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="add-widget">
                    <a href=""><img src="images/publicidad_4.jpg" alt="" class="img-fluid"></a>
                </div>
                <div class="tab-widget">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m-view" role="tab">Most Viewed</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#comment" role="tab">Comments</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#catagory" role="tab">Catagories</a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="m-view" role="tabpanel">
                            <div class="m-view-content">
                                <div class="m-view-img">
                                    <a href=""><img src="images/soccer/nuevas/miniatura.jpg" alt=""
                                                    class="img-fluid"></a>
                                </div>
                                <div class="img-content">
                                    <p><a href="">These sentences are selected from various online news.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-view-content">
                                <div class="m-view-img">
                                    <a href=""><img src="images/soccer/nuevas/miniatura_2.jpg" alt="" class="img-fluid"></a>
                                </div>
                                <div class="img-content">
                                    <p><a href="">These sentences are selected from various online news.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="m-view-content">
                                <div class="m-view-img">
                                    <a href=""><img src="images/soccer/nuevas/miniatura_3.jpg" alt="" class="img-fluid"></a>
                                </div>
                                <div class="img-content">
                                    <p><a href="">These sentences are selected from various online news.</a></p>
                                    <ul class="list-unstyled list-inline">
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star"></i></li>
                                        <li class="list-inline-item"><i class="fa fa-star-o"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="comment" role="tabpanel">
                            <div class="comment-content">
                                <div class="comment-img">
                                    <a href=""><i class="fa fa-user"></i></a>
                                </div>
                                <div class="img-content">
                                    <p><a href=""><span>Jamy : </span>These sentences are selected from various online
                                            news....</a></p>
                                </div>
                            </div>
                            <div class="comment-content">
                                <div class="comment-img">
                                    <a href=""><i class="fa fa-user"></i></a>
                                </div>
                                <div class="img-content">
                                    <p><a href=""><span>Jamy : </span>These sentences are selected from various online
                                            news....</a></p>
                                </div>
                            </div>
                            <div class="comment-content">
                                <div class="comment-img">
                                    <a href=""><i class="fa fa-user"></i></a>
                                </div>
                                <div class="img-content">
                                    <p><a href=""><span>Jamy : </span>These sentences are selected from various online
                                            news....</a></p>
                                </div>
                            </div>
                            <div class="comment-content">
                                <div class="comment-img">
                                    <a href=""><i class="fa fa-user"></i></a>
                                </div>
                                <div class="img-content">
                                    <p><a href=""><span>Jamy : </span>These sentences are selected from various online
                                            news....</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="catagory" role="tabpanel">
                            <div class="catagory-content">
                                <div class="row">
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li><a href="">Business <span>19</span></a></li>
                                            <li><a href="">World <span>21</span></a></li>
                                            <li><a href="">Tech <span>23</span></a></li>
                                            <li><a href="">Politics <span>27</span></a></li>
                                            <li><a href="">Sports <span>11</span></a></li>
                                            <li><a href="">Entertainment <span>19</span></a></li>
                                            <li><a href="">Lifestyle <span>21</span></a></li>
                                            <li><a href="">Fashion <span>21</span></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-6">
                                        <ul class="list-unstyled">
                                            <li><a href="">Animal <span>23</span></a></li>
                                            <li><a href="">Politics <span>27</span></a></li>
                                            <li><a href="">Health <span>11</span></a></li>
                                            <li><a href="">National <span>19</span></a></li>
                                            <li><a href="">Culture <span>21</span></a></li>
                                            <li><a href="">Music <span>23</span></a></li>
                                            <li><a href="">Food <span>27</span></a></li>
                                            <li><a href="">Travel <span>11</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Catagory -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="footer-c">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-about">
                        <h4>ABOUT</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium, ex, ea. Mollitia
                            consequuntur dolorum cum sed ea cupiditate nisi in quis animi. Accusantium magni impedit,
                            magnam! Similique cumque labore illum.</p>
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item"><a href=""><i class="fa fa-facebook"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-twitter"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-linkedin"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-google-plus"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-rss"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-youtube"></i></a></li>
                            <li class="list-inline-item"><a href=""><i class="fa fa-skype"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-link">
                        <h4>ADDITIONAL</h4>
                        <ul class="list-unstyled">
                            <li><a href=""><i class="fa fa-caret-right"></i>Become A Member</a></li>
                            <li><a href=""><i class="fa fa-caret-right"></i>Legal Agreement</a></li>
                            <li><a href=""><i class="fa fa-caret-right"></i>Privacy Policy</a></li>
                            <li><a href=""><i class="fa fa-caret-right"></i>Terms & Condition</a></li>
                            <li><a href=""><i class="fa fa-caret-right"></i>Work For Us</a></li>
                            <li><a href=""><i class="fa fa-caret-right"></i>Newsletter Signup</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer-twitter">
                        <h4>TWITTER</h4>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                <a href="">https://bh.com/</a></li>
                            <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                <a href="">https://bh.com/</a></li>
                            <li><i class="fa fa-twitter"></i> Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                <a href="">https://bh.com/</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="copyright-text">
                        <p>Copyright &copy; 2017 <a href="">TenNews</a>. All Rights Reserved.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="designer-text text-right">
                        <p>Designed With <i class="fa fa-heart"></i> By <a href="">SnazzyTheme</a></p>
                    </div>
                    <div class="back-to-top">
                        <i class="fa fa-angle-double-up"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->

<!-- =========================================
JavaScript Files
========================================== -->

<!-- jQuery JS -->
<script src="js/assets/vendor/jquery-1.12.4.min.js"></script>

<!-- Poppers Js -->
<script src="js/assets/popper.js"></script>

<!-- Bootstrap -->
<script src="js/assets/bootstrap.min.js"></script>

<!-- Sticky Js -->
<script src="js/assets/jquery.sticky.js"></script>

<!-- WOW JS -->
<script src="js/assets/wow.min.js"></script>

<!-- Smooth Scroll -->
<script src="js/assets/smooth-scroll.js"></script>

<!-- Mean Menu -->
<script src="js/assets/jquery.meanmenu.min.js"></script>

<!-- News Ticker -->
<script src="js/assets/jquery.newsticker.min.js"></script>

<!-- Owl Carousel -->
<script src="js/assets/owl.carousel.min.js"></script>

<!-- Magnific Popup -->
<script src="js/assets/jquery.magnific-popup.min.js"></script>

<!-- Syotimer -->
<script src="js/assets/jquery.syotimer.min.js"></script>

<!-- Custom JS -->
<script src="js/plugins.js"></script>
<script src="js/custom.js"></script>
<input type="hidden" value="<?=$portada?>" id="portada" name="portada">
<input type="hidden" value="<?=$logo?>" id="logo" name="logo">
<input type="hidden" value="<?=$nombre?>" id="nombre" name="nombre">
<input type="hidden" value="<?=$ruta?>" id="ruta" name="ruta">
<script type="application/javascript">
    var portada = $("#portada").val();
    var logo = $("#logo").val();
    var nombre = $("#nombre").val();
    var ruta = $("#ruta").val();

    console.log("portada :" +portada);
    console.log("logo :" +logo);
    console.log("ruta :" +ruta);

    if(portada != " " && logo != " "){
        console.log("cambio de fondo");
        var nuevo ={ "background-image": 'url(../infoclubs/'+ ruta +'/'+portada+')'};
        $("#fondo").css(nuevo);
    }


</script>

</body>
</html>