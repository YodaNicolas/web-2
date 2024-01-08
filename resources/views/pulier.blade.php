<!doctype html>
<html lang="en">

<head>
    <title>Publication</title>
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



        <section class="SectionInscription">
            <div class=" ContentFormPublic ">
                <div class="card boxForm">

                    <div class="TitreCardInscp">Publication</div>
                    <form id="PublicationForm" action="{{ route('publier') }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Nom de l'évenement</label>
                                    <input type="text" class="inputInscrip form-control"
                                        placeholder="Nom de l'évenement" id="nom" name="nom"
                                        data-champ="Nom de l'évenement">
                                </div>
                                <div class=" col-lg-6 col-sm-12">
                                    <label for="">Lieu</label>
                                    <input type="text" class="inputInscrip form-control" placeholder="Lieu"
                                        id="email" name="lieu" data-champ="Lieu">
                                </div>

                            </div>
                            <div class="row">
                                <div class=" col-6">
                                    <label for="">Date de debut</label>
                                    <input type="date" class="inputInscrip form-control" id="dateDebut"
                                        name="debut" data-champ="Date de début">
                                </div>
                                <div class=" col-6">
                                    <label for="">Date de fin</label>
                                    <input type="date" class="inputInscrip form-control" id="dateFin"
                                        name="fin" data-champ="date de fin">
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6 ">
                                    <label for="">Passe (CFA)</label>
                                    <input type="number" class="inputInscrip form-control"
                                        placeholder="Prix d'entrée en CFA" id="passe1" name="passe1"
                                        data-champ="passe">
                                </div>
                                <div class="col-6">
                                    <label for="">Vip (CFA)</label>
                                    <input type="number" class="inputInscrip form-control"
                                        placeholder="Prix d'entrée Vip en CFA" id="Vip" name="passe2"
                                        data-champ="Passe Vip">
                                </div>
                                <input hidden type="number" value="{{ Auth::user()->role }}" id="role">
                            </div>
                            {{-- <div class="row">
                                <div class="col-12">
                                    <label for="">Ticket</label>
                                    <input type="file" class="inputInscrip form-control" id="affiche"
                                        name="affiche" data-champ="affiche" accept=".jpg, .jpeg, .png">
                                </div>
                                <div class="col-12">
                                    <label for="">Ticket vip</label>
                                    <input type="file" class="inputInscrip form-control" id="affiche"
                                        name="affiche" data-champ="affiche" accept=".jpg, .jpeg, .png">
                                </div>

                            </div> --}}
                            <div class="row">

                                <div class="col-12">
                                    <label for="">Affiche</label>
                                    <input type="file" class="inputInscrip form-control" id="affiche"
                                        name="image" data-champ="affiche" accept=".jpg, .jpeg, .png">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <label for="">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="62" rows="4"
                                        data-champ="Description"></textarea>

                                </div>

                            </div>
                        </div>

                        <div class="TitreCardInscp">
                            <input type="submit" class="btn btn-primary mb-2" value="Publier">
                        </div>
                        <div class="Erreur" id="messageErreur"></div>
                    </form>
                </div>
            </div>
        </section>
        <!-- FOOTER SECTION -->
    </div>
    <!-- END BODY -->

    <script src="{{ asset('fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/publication.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>
</body>

</html>
