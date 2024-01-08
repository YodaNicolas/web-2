<!doctype html>
<html lang="en">

<head>
    <title>Accueil</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('fonts/all.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/Mafeuille.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
</head>

<body margeur>
    <div class="container-fluid margeur">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img height="50" width="50" src="images/logo blanc.png"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff;"></i>
                </button>
                <div class=" DivNavLink collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="{{ route('accueil') }}">Accueil</a>
                        <a class="nav-link" href="{{ route('publication') }}">Publier</a>
                        <a class="nav-link" href="{{ route('propos') }}">A propos</a>
                        @auth

                            @if (Auth::user()->role == 1)
                                <a class="nav-link" href="{{ route('HomeAdmin') }}">
                                    Gestion managers
                                </a>
                            @else
                                <a class="nav-link" href="{{ route('EvenListe', ['id_manager' => Auth::user()->id]) }}">
                                    Mes évenements
                                </a>
                            @endif

                            <a class="nav-link" href="{{ route('deconnexion') }}">Se déconnecter</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Se connecter</a>
                        @endauth
                        <a class="nav-link" href="tel:44454643"> <i class="fa-solid fa-phone fa-shake"
                                style="color: #ffffff;"></i> +226 44 45 46 43</a>
                        @auth
                            @if (Auth::user()->role == 1)
                                <div class="infoConnecte"> <i class="fa-solid fa-user fa-beat" style="color: #ffffff;"></i>
                                    Super admin:
                                    {{ Auth::user()->nom }} </div>
                            @else
                                <div class="infoConnecte"> <i class="fa-solid fa-user fa-beat" style="color: #ffffff;"></i>
                                    :
                                    {{ Auth::user()->nom }}</div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>
        </nav>
        <!-- END nav -->

        @if (session('status'))
            <div
                style=" display:flex; justify-content:center; padding-bottom:4px;padding-top:4px; background-color:black">
                <div class="SucesDiv" style=" display:flex; justify-content:center">
                    {{ session('status') }}
                </div>
            </div>
        @endif
        <div class="zoneCaroussel">

            <div class="Zcarous">
                <div id="carouselExampleCaptions" class="carousel slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="images/caroussel/Jacob_Desvarieux.jpg" class=" taillImCarousel  w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>A la une</h5>
                                <p>Grand concert d'hommage.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/caroussel/concert-wizkid-à-abidjan-9.jpg" class="taillImCarousel  w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>A la une</h5>
                                <p>Edition 2 du concert ciel ouvert.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="images/caroussel/whatsapp_image_2022-08-19_at_13.24.31.jpg"
                                class="taillImCarousel  w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>A la une</h5>
                                <p>Concert de l'artiste Tanya.</p>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
        <section class="SectionpaysHotes">
            <div class="delimiteurTtre1-3 blanc">
                <h1 class="txtTitre blanc">Evenements</h1>
            </div>

            <div class="container-fluid d-flex justify-content-center">
                <div class="row contneurCardPays">

                    @foreach ($Events as $Event)
                        <div class="card itemEvent" style="width: 18rem;">
                            <a href="{{ route('detail', ['id_event' => $Event->id]) }}"><img
                                    src="affiches/{{ $Event->affiche }}" class="card-img-top affiche"
                                    alt="..."></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $Event->nom }}</h5>
                                @if ($Event->date)
                                    <p class="card-text"> <i class="fa-solid fa-calendar-days"></i> Date: Le
                                        $Event->date->format('d/m/y') <br>
                                @endif

                                <i class="fa-solid fa-location-dot"></i> Lieu: {{ $Event->lieu }} <br>
                                <i class="fa-solid fa-money-bill-wave"></i> Pass: {{ $Event->passe1 }} <br>
                                <a class="lienTel" href="tel:+1234567890"><i class="fa-solid fa-phone fa-bounce"></i>
                                    Tel: 44774477</a>
                                </p>
                                <a href="{{ route('Reserver', ['id_event' => $Event->id]) }}"
                                    class="btn btn-primary">Reserver</a>
                            </div>
                        </div>
                    @endforeach



                </div>
            </div>
        </section>


        <!-- FOOTER SECTION -->

        <div class="container-fluid text-center footer">
            <div class="FlouNoir">
                <div class="row align-items-center">

                    <div class="LogoPrprtes">
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <a href="index.html"><img class="lgo" src="images/logo blanc.png" alt=""></a>
                        </div>
                    </div>
                    <div class=" lgn1Foot">

                        <div class="CoteGauche">
                            <div class="L1Gche">

                                <div class="DivTelMail">
                                    <p class="LiensFoot">Telephonne: 44-45-46-43</p>
                                    <p class="LiensFoot">Email: reservationeven.bf.@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class=" L1droite">
                            <a class="LiensFoot" href="index.html">Accueil</a>
                            <a class="LiensFoot" href="tel:44454643">Contacter</a>
                            <a class="LiensFoot" href="pages/propos.html">A propos de nous.</a>
                        </div>


                    </div>

                    <div class="LgnSuiv row align-item-center justify-content-center">
                        <h1 class="blanc svlg"><strong> Suivez nous. </strong></h1>
                        <div class="col-4 col-lg-4 col-md-4 col-sm-4">
                            <a href="https://www.facebook.com/"> <i class="fa-brands fa-square-facebook fa-shake icon"
                                    style="color: #ffffff;"></i></a>
                            <a href="https://twitter.com/"><i class="fa-brands fa-square-twitter fa-shake icon"
                                    style="color: #ffffff;"></i></a>
                        </div>
                    </div>
                    <div style="background-color:rgba(0, 0, 0, 0.733); width:100%; color:rgba(255, 255, 255, 0.671)">
                        &copy; 2023 YODA & ILBOUDO. Tous droits réservés.
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- END BODY -->
    <script src="{{ asset('styles/fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('styles/js/all.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.min.js') }}"></script>
    <script src="{{ asset('styles/js/popper.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>
</body>

</html>
