<!doctype html>
<html lang="en">

<head>
    <title>Liste managers</title>
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


        <section class="SectionpaysHotes">

            <div class="container-fluid d-flex justify-content-center">

                <div class="card ZoneTableau text-center">
                    <div class="card-header titrepDetal">
                        Liste des managers d'évenement
                    </div>
                    @if (session('status'))
                        <div style=" display:flex; justify-content:center;margin-top:3px">
                            <div class="SucesDiv" style=" display:flex; justify-content:center">
                                {{ session('status') }}
                            </div>
                        </div>
                    @endif
                    <div class="card-body" style="overflow: scroll;">
                        @if (count($Managers) == 0)
                            <h3 style="color: red; widht:100% ; text-align:center"> Aucun manager pour
                                l'instant</h3>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N</th>
                                        <th scope="col">Nom</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Numéro</th>
                                        <th style="text-align:center" scope="col">Evenement</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($Managers as $Manager)
                                        <tr>
                                            <th class="table-secondary" scope="row">1</th>
                                            <td class="table-secondary">{{ $Manager->nom }}</td>
                                            <td class="table-secondary">{{ $Manager->email }}</td>
                                            <td class="table-secondary">{{ $Manager->numero }}</td>
                                            <td class="table-secondary"
                                                style="display:flex;justify-content:center; gap:5px; ">
                                                <a href="{{ route('EvenListe', ['id_manager' => $Manager->id]) }}"
                                                    style="height: 25px; display:flex; align-items:center"
                                                    type="button" class="btn btn-info">Detail</a>
                                                <form action="{{ route('SupprManager') }}"method="post"
                                                    id="formSupprEvent{{ $Manager->id }}">
                                                    @csrf
                                                    <input type="number" hidden name="id_manag"
                                                        value="{{ $Manager->id }}">
                                                    <input type="number" hidden value="{{ $loop->iteration }}">
                                                    <button style="height: 25px; display:flex; align-items:center"
                                                        type="button" class=" btnTableau btn btn-danger"
                                                        data-bs-toggle="modal"
                                                        data-bs-target="#supprModal{{ $Manager->id }}">Supprimer</button>
                                                </form>
                                            </td>
                                        </tr>

                                        <div class="modal" id="supprModal{{ $Manager->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Confirmation</h5>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Voulez vous vraiment supprimer le manager Numéro
                                                            {{ $loop->iteration }}: <br> {{ $Manager->nom }} avec
                                                            tous ses évenements ?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">NON</button>
                                                        <button type="button"
                                                            onclick="confirmerSuppresseion('{{ $Manager->id }}')"
                                                            class="btn btn-primary">OUI
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                    <div class="card-footer text-body-secondary">
                        Total: {{ count($Managers) }} managers d'évenement
                    </div>
                </div>

            </div>
        </section>


        <!-- FOOTER SECTION -->

        <div class="container-fluid text-center footer">
            <div class="FlouNoir">
                <div class="row align-items-center">

                    <div class="LogoPrprtes">
                        <div class="col-lg-6 col-md-12 col-sm-12 ">
                            <a href="index.html"><img class="lgo" src="../images/logo blanc.png"
                                    alt=""></a>
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
                            <a class="LiensFoot" href="../index.html">Accueil</a>
                            <a class="LiensFoot" href="tel:44454643">Contacter</a>
                            <a class="LiensFoot" href="propos.html">A propos de nous.</a>
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
    <script src="{{ asset('fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/confirmation2.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>

</body>

</html>
