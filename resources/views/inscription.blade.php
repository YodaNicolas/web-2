<!doctype html>
<html lang="en">

<head>
    <title>Inscription</title>
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

        <section class="SectionInscription">
            <div class=" ContentFormInscription">
                <div class="card boxForm">
                    <div class="TitreCardInscp">Inscription</div>
                    <form id="IscriptionForm" action="{{ route('enregistrement') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Nom</label>
                                    <input type="text" class="inputInscrip form-control" placeholder="Nom"
                                        id="nom" name="nom" data-champ="Nom"">
                                </div>
                                <div class=" col-lg-6 col-sm-12">
                                    <label for="">Prénom</label>
                                    <input type="text" class="inputInscrip form-control" placeholder="Prénom"
                                        id="prenom" name="prenom" data-champ="Prénom">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Télephone</label>
                                    <input type="number" class="inputInscrip form-control" placeholder="Telephone"
                                        id="telephone" name="telephone" data-champ="Téléphone">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Email</label>
                                    <input type="email" class="inputInscrip form-control" placeholder="Email"
                                        id="email" name="email" data-champ="Email">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Mot de passe</label>
                                    <input type="password" class="inputInscrip form-control" placeholder="Mot de passe"
                                        id="password" name="password" data-champ="Mot de passe">
                                </div>
                                <div class="col-lg-6 col-sm-12">
                                    <label for="">Confirmer</label>
                                    <input type="password" class="inputInscrip form-control"
                                        placeholder="Confirmer mot de passe" id="confpassword" name="confpassword"
                                        data-champ="Confirmation">
                                </div>
                            </div>
                        </div>

                        <div class="TitreCardInscp">
                            <input type="submit" class="btn btn-primary" value="Enregistrer">
                        </div>
                        <a class="lienForm" href="connection.html">J'ai déjà un compte</a>
                        <div class="Erreur" id="messageErreur"></div>
                    </form>
                </div>
            </div>
        </section>
    </div>
    <!-- END BODY -->

    <script src="{{ asset('fonts/all.js') }}"></script>
    <script src="{{ asset('styles/js/inscription.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('styles/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('styles/js/all.min.js') }}"></script>
    <script src="{{ asset('styles/js/main.js') }}"></script>

</body>

</html>
