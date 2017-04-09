<!DOCTYPE html>
<!--
 * A Design by GraphBerry
 * Author: GraphBerry
 * Author URL: http://graphberry.com
 * License: http://graphberry.com/pages/license
-->
<html lang="en">
    
    <head>
        <meta charset=utf-8>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Pluton Theme by BraphBerry.com</title>
        <!-- Load Roboto font -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <!-- Load css styles -->
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/bootstrap.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/bootstrap-responsive.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/style.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/pluton.css') }}" />
        <!--[if IE 7]>
            <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/pluton-ie7.css') }}" />
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/jquery.cslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/jquery.bxslider.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('sonhador/pluton/css/animate.css') }}" />
        <!-- Fav and touch icons -->
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('sonhador/pluton/images/ico/apple-touch-icon-144.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ asset('sonhador/pluton/images/ico/apple-touch-icon-114.png') }}">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ asset('sonhador/pluton/images/apple-touch-icon-72.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('sonhador/pluton/images/ico/apple-touch-icon-57.png') }}">
        <link rel="shortcut icon" href="{{ asset('sonhador/pluton/images/ico/favicon.ico') }}">

        <style>
            .primary-section .triangle {
                border-top: 40px solid lightgreen;
            }
            .secondary-section {
                background:lightgreen;
            }
        </style>
    </head>
    
    <body>
        <div class="navbar">
            <div class="navbar-inner">
                <div class="container">
                    <a href="#" class="brand">
                        <img src="images/logo.png" width="120" height="40" alt="Logo" />
                        <!-- This is website logo -->
                    </a>
                    <!-- Navigation button, visible on small resolution -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <i class="icon-menu"></i>
                    </button>
                    <!-- Main navigation -->
                    <div class="nav-collapse collapse pull-right">
                        <ul class="nav" id="top-navigation">
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#pag1">Pag1</a></li>
                            <li><a href="#pag2">Pag2</a></li>
                            <li><a href="#pag3">Pag3</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- End main navigation -->
                </div>
            </div>
        </div>
        <!-- Start home section -->
        <div class="section secondary-section" id="home">
            <div class="container">
                <h1>Home</h1>
                <h1>Home</h1>
                <h1>Home</h1>
                <h1>Home</h1>
                <h1>Home</h1>
                <h1>Home</h1>
            </div>
        </div>
        <!-- End home section -->
        <!-- Service section start -->
        <div class="section primary-section" id="pag1">
            <div class="container">
                <h1>Pag 1</h1>
                <h1>Pag 1</h1>
                <h1>Pag 1</h1>
                <h1>Pag 1</h1>
                <h1>Pag 1</h1>
            </div>
        </div>
        <!-- Service section end -->
        <!-- Portfolio section start -->
        <div class="section secondary-section " id="pag2">
            <div class="triangle"></div>
            <div class="container">
                <h1>Pag 2</h1>
                <h1>Pag 2</h1>
                <h1>Pag 2</h1>
                <h1>Pag 2</h1>
                <h1>Pag 2</h1>
            </div>
        </div>
        <!-- Portfolio section end -->
        <!-- About us section start -->
        <div class="section primary-section" id="pag3">
            <div class="triangle"></div>
            <div class="container">
                <h1>Pag3</h1>
                <h1>Pag3</h1>
                <h1>Pag3</h1>
                <h1>Pag3</h1>
                <h1>Pag3</h1>
                <h1>Pag3</h1>
            </div>
        </div>

        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section secondary-section">
                <div class="container">
                    <div class="title">
                        <h1>Contato</h1>
                        <p>Entre em contato.</p>
                    </div>
                </div>
                <div class="map-wrapper">
                    <div class="map-canvas" id="map-canvas">Loading map...</div>
                    <div class="container">
                        <div class="row-fluid">
                            <div class="span5 contact-form centered">
                                <h3>Say Hello</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Well done!</strong>Your message has been sent.</div>
                                <div id="errorSend" class="alert alert-error invisible">There was an error.</div>
                                <form id="contact-form" action="php/mail.php">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" id="name" name="name" placeholder="* Your name..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="email" name="email" id="email" placeholder="* Your email..." />
                                            <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="comment" id="comment" placeholder="* Comments..."></textarea>
                                            <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button id="send-mail" class="message-btn">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <h1>Hello</h1>
                    <h1>Hello</h1>
                    <h1>Hello</h1>
                    <h1>Hello</h1>
                </div>
            </div>
        </div>
        <!-- Contact section edn -->
        <!-- Footer section start -->
        <div class="footer">
            <p>&copy; <?php echo date("Y")?> All Rights Reserved</p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <!-- ScrollUp button end -->
        <!-- Include javascript -->
        <script src="{{ asset('sonhador/pluton/js/jquery.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/jquery.mixitup.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/bootstrap.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/modernizr.custom.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/jquery.bxslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/jquery.cslider.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/jquery.placeholder.js') }}"></script>
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/jquery.inview.js') }}"></script>
        <!-- Load google maps api and call initializeMap function defined in app.js -->
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;callback=initializeMap"></script>
        <!-- css3-mediaqueries.js for IE8 or older -->
        <!--[if lt IE 9]>
            <script src="{{ asset('sonhador/pluton/js/respond.min.js') }}"></script>
        <![endif]-->
        <script type="text/javascript" src="{{ asset('sonhador/pluton/js/app.js') }}"></script>
    </body>
</html>