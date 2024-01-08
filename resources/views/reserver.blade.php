<!doctype html>
<html lang="en">

<head>
    <title>Reservation</title>
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
                    <i class="fa-solid fa-bars fa-2xl blanc"></i>
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
            <div class=" ContentFormInscription TaillCon">
                <div class="card boxForm BoxConnect">
                    <div class="TitreCardInscp">Reservation</div>
                    <form id="ReservationtionForm" action="{{ route('StoreReservation') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class=" row">
                                <div class="col-12">
                                    <label for="">Email</label>
                                    <input type="email" class=" form-control" placeholder="Entrez votre email"
                                        id="email" name="email" data-champ="Email">
                                </div>
                            </div>
                            <div class=" row">
                                <div class="col-6">
                                    <label for="">Nombre de ticket</label>
                                    <input type="number" class=" form-control"
                                        placeholder="Combien de tickets desirez-vous?" id="nombreTickets" name="tickets"
                                        data-champ="Nombre de tickets">
                                    <input type="number" hidden name="idEvent" value="{{ $id_event }}">
                                </div>
                                <div class="col-6">
                                    <label for="">Type de ticket</label>
                                    <select class="form-select " aria-label="Default select example"
                                        data-champ="Type de tickets" id="typeTicket" name="Type">
                                        <option value="0" selected>Type de tycket</option>
                                        <option value="Grand public">Grand public</option>
                                        <option value="Vip">Vip</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">

                            </div>

                        </div>

                        <div class="TitreCardInscp">
                            <input type="submit" class="btn btn-primary mb-2" value="Reserver">
                        </div>
                        <div class="Erreur" id="messageErreur"></div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <!-- END BODY -->
    <script src="{{ asset('fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/reservation.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>
</body>

</html>
