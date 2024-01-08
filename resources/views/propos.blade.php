<!doctype html>
<html lang="en">

<head>
    <title>A propos</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('fonts/all.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/Mafeuille.css') }}">
    <link rel="stylesheet" href="{{ asset('styles/css/bootstrap.min.css') }}">
</head>

<body margeur>
    <div class="container-fluid margeur">
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img height="50" width="50" src="../images/logo blanc.png"
                        alt=""></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="fa-solid fa-bars fa-2xl" style="color: #ffffff;"></i> </button>
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
                            <img src="../images/caroussel/Jacob_Desvarieux.jpg" class=" taillImCarousel  w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>A la une</h5>
                                <p>Grand concert d'hommage.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../images/caroussel/concert-wizkid-à-abidjan-9.jpg" class="taillImCarousel  w-100"
                                alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>A la une</h5>
                                <p>Edition 2 du concert ciel ouvert.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="../images/caroussel/whatsapp_image_2022-08-19_at_13.24.31.jpg"
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
        <section class="SectionPublicCible">

            <div class="delimiteurTtre2-4 bleu">
                <h1 class="txtTitre bleu">Qui sommes nous?</h1>
            </div>

            <div class="row Apropos">
                <div class="col-lg-4 col-sm-12 col-md-12 CentrTxt ">
                    <h3>Description</h3>
                    Notre site web de réservation de tickets pour événements et festivals est là pour vous aider à
                    profiter pleinement de l’expérience de vos événements préférés. Nous nous engageons à offrir une
                    plateforme en ligne conviviale et facile à naviguer qui vous permettra de réserver vos places pour
                    les événements en question en quelques clics seulement.
                    Peu importe le type d’événement que vous souhaitez assister, notre site web a tout pour vous
                    satisfaire. De la musique live à des événements sportifs, en passant par des spectacles de comédie
                    et des festivals, vous découvrirez un large choix de billets pour des événements incroyables.
                </div>
                <img src="../images/logo bleu.png" width="75" height="200" alt=""
                    class="col-lg-4 col-sm-12 col-md-12 imgPropos">
                <div class="col-lg-4 col-sm-12 col-md-12 CentrTxt ">
                    <h3>Objectifs</h3>
                    L’objectif principal de notre site web est de fournir aux utilisateurs un moyen facile d’acheter des
                    billets en ligne pour les
                    événements auxquels ils souhaitent assister.Voici quelques objectifs clés à considérer :
                    Fournir une interface utilisateur conviviale pour la recherche d’événements et la réservation de
                    billets;
                    Permettre aux organisateurs d’événements de créer des pages pour leurs événements, en fournissant
                    des informations détaillées sur l’événement, telles que la date, l’heure, l’emplacement, les
                    artistes, les présentateurs, les sponsors, etc;
                    Offrir un site web mobile convivial qui permet aux utilisateurs de réserver des billets en
                    déplacement à partir de leurs appareils mobiles.
                </div>
            </div>

        </section>

        <!-- FOOTER SECTION -->

        <div class="container-fluid text-center footer">
            <div class="FlouNoir">
                <div class="row align-items-center">
                    <div class="LogoPrprtes">
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <a href="../index.html"><img class="lgo" src="../images/logo blanc.png"
                                    alt=""></a>
                        </div>
                    </div>
                    <div class=" lgn1Foot">

                        <div class="CoteGauche">
                            <div class="L1Gche">

                                <div class="DivTelMail">
                                    <p class="LiensFoot">Telephonne: 44-45-46-43</p>
                                    <p class="LiensFoot" style="width: 98% !important;">Email: reserven.bf.@gmail.com
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class=" L1droite">
                            <a class="LiensFoot" href="index.html">Accueil</a>
                            <a class="LiensFoot" href="pages/contact.html">Contact</a>
                            <a class="LiensFoot" href="#FORMAT">A propos de nous.</a>
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

    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/jquery.min.js') }}"></script>
    <script src="{{ asset('styles/js/popper.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>

</body>

</html>
