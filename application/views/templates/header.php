<!DOCTYPE HTML>

<html>
    <head>
        <title>أسرة أباء</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="<?= base_url() ?>css/main.css" />
        <link rel="stylesheet" href="<?= base_url() ?>css/hover.css" />
        
    </head>
    
    <!-- loader -->
    <style>
            
           
            
            #loader{
                display:block;
                z-index: 5000;
                position:fixed;
                
                left:50%;
                top:50%;
                margin-left: -250px;
                margin-top: -80px;
            }
            #loader-wrapper .loader-section {
                position: fixed;
                width: 51%;
                height: 100%;
                background: #fff;
                z-index: 1000;
                -webkit-transform: translateX(0);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(0);  /* IE 9 */
                transform: translateX(0);  /* Firefox 16+, IE 10+, Opera */
            }

            #loader-wrapper .loader-section.section-left {
                left: 0;
            }

            #loader-wrapper .loader-section.section-right {
                right: 0;
            }

            /* Loaded */
            .loaded #loader-wrapper .loader-section.section-left {
                -webkit-transform: translateX(-100%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(-100%);  /* IE 9 */
                transform: translateX(-100%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
            }

            .loaded #loader-wrapper .loader-section.section-right {
                -webkit-transform: translateX(100%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateX(100%);  /* IE 9 */
                transform: translateX(100%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);  
                transition: all 0.7s 0.3s cubic-bezier(0.645, 0.045, 0.355, 1.000);
            }

            .loaded #loader {
                opacity: 0;
                -webkit-transition: all 0.3s ease-out;  
                transition: all 0.3s ease-out;
            }
            .loaded #loader-wrapper {
                visibility: hidden;

                -webkit-transform: translateY(-120%);  /* Chrome, Opera 15+, Safari 3.1+ */
                -ms-transform: translateY(-120%);  /* IE 9 */
                transform: translateY(-120%);  /* Firefox 16+, IE 10+, Opera */

                -webkit-transition: all 0.3s 1s ease-out;  
                transition: all 0.3s 1s ease-out;
            }

        </style>
        
        <div id="loader-wrapper">
            
            <img id="loader" src="<?= base_url() ?>images/loading.gif"/> 
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>
            
        </div>
        
    
        <div id="page" style="display: none;">
        <!-- Header home button --> 
        <header id="header" class="preview">
            <div style="cursor: pointer;"  class="inner hvr-hang">

                <a href="<?= base_url() ?>Home" class="button hidden"><span>Let's Go</span></a>
            </div>
        </header>

        <!-- Header -->

        <?php
        $display = "";

        if ($this->session->userdata('logged') == 'true')
            $display = "display:none";
        ?>

        <header id="header" style="<?= $display ?>">
            <div class="inner">
                <div class="content">
                    <h1>Osret Aba2 <?= $this->session->userdata('name') ?></h1>
                    <h2>Welcome our dear <br/>
                        you are really missed</h2>
                    <form>
                        <h3 style="color: aliceblue;text-align: left;">Username: </h3><input id="username"  style="background-color: aliceblue;" type="text" class="form-control" >
                        <h3 style="color: aliceblue;text-align: left;">Password: </h3><input id="password"  style="background-color: aliceblue;" type="password" class="form-control" >
                        <a href="#" onclick="login(document.getElementById('username').value, document.getElementById('password').value)" style="margin-top: 10px;" class="button big alt"><span>Let's Go</span></a>
                    </form>
                </div>

            </div>
        </header>

        
        <body id="body">




        <script type="text/javascript">

            function login($username, $password) {
                window.location.href = "<?= base_url() ?>Home/login/" + $username + "/" + $password + "/";
                // Cancel the default action
                // e.preventDefault();

            }

        </script>

<script src="<?= base_url() ?>js/jquery.min.js"></script>
    <script>
      /*  $(window).load(function (){
                    $('#body').addClass('loaded');
                });*/
                
                 $(window).load(function (){
                    $('#loader-wrapper').fadeOut(1000,function(){
                        $('#page').fadeIn(500);
                    });
                });
        </script>