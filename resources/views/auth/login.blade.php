<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Hilfe</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">



    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-social.css') }}" rel="stylesheet">

</head>
<body>


<div class="split left">
    <div class="centered">
        <div class="header">
            <div class="titleTag col-md-12">
                <h1><b>Hilfe</b></h1>
            </div>
        </div>
        @include('partials.github')
    </div>
</div>
<div class="split right">


    <div class="centered centerContent">
        <h3>Trending Now</h3>

        <div class="container card-container">
            <div class="row">
                <br>
                <div class="col-md-6 card-deck">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="language-block">
                                <span class= "language-circle"> </span><span class="language">Python</span>
                                <i class="fas fa-star" style="color: #666"></i>
                                </span><span class="language">6</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 card-deck">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="language-block">
                                <span class= "language-circle"> </span><span class="language">Python</span>
                                <i class="fas fa-star" style="color: #666"></i>
                                </span><span class="language">6</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 card-deck">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="language-block">
                                <span class= "language-circle"> </span><span class="language">Python</span>
                                <i class="fas fa-star" style="color: #666"></i>
                                </span><span class="language">6</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 card-deck">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="language-block">
                                <span class= "language-circle"> </span><span class="language">Python</span>
                                <i class="fas fa-star" style="color: #666"></i>
                                </span><span class="language">6</span>
                            </p>

                        </div>
                    </div>

                </div>
                <div class="col-md-6 card-deck">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">Card title</h4>
                            <p class="card-text">This card has supporting text below as a natural lead-in to additional
                                content.This card has supporting text below as a natural lead-in to additional
                                content.</p>
                            <p class="language-block" >
                                <span class= "language-circle"> </span><span class="language">Python</span>
                                <i class="fas fa-star" style="color: #666"></i>
                                </span><span class="language">6</span>
                            </p>

                        </div>
                    </div>

                </div>



            </div>
        </div>

    </div>
</div>


</body>
<script>
    $(document).ready(function ($) {
        tab = $('.tabs h3 a');
        tab.on('click', function (event) {
            event.preventDefault();
            tab.removeClass('active');
            $(this).addClass('active').css("opacity", 0).animate({opacity: 1}, 1000);
            ;

            tab_content = $(this).attr('href');
            $('div[id$="tab-content"]').removeClass('active');
            $(tab_content).addClass('active').css("opacity", 0).animate({opacity: 1}, 1000);
            ;
            ;
        });
    });
</script>
</html>
