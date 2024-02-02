<footer class="bg-light text-center text-lg-start position-relative mt-auto">
    <div class="container p-2">
        <div class="row">
            <div class="col-lg-5 col-md-12 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">À propos de nous</h5>
                <!--pour ne pas avoir de pub https://www.youtube.com/watch?v=kbssO7f1HCs-->
                <a class="c8" href="https://www.yout-ube.com/watch?v=dQw4w9WgXcQ">
                    2 étudiants en programmation et sécurité qui ont développé ce site afin d'améliorer la gestion des horaires des enseignants du Cégep
                </a>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0 ml-3">
                <h5 class="text-uppercase mb-4">Liens utiles</h5>
                <ul class="list-unstyled mb-0">
                    <a class="nav-link" href="{{route('pageAccueil')}}"
                        @class(['active' => request()->routeIs('pageAccueil')])>
                        {{__('Accueil')}}
                    </a>
                    @auth()
                    <a class="dropdown-link" href="{{route('enseignants.index')}}"
                        @class(['active' => request()->routeIs('enseignants.index')])>
                        {{__('Les enseignants')}}
                    </a>
                    @endauth
                    @if (Gate::any(['admin','gestionnaire']))
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('creationhoraire')}}"
                                @class(['active' => request()->routeIs('creationhoraire')])>
                                {{__('Creation d\'un horaire')}}
                            </a>
                        </li>
                    @endif
                </ul>
            </div>

            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="text-uppercase mb-4">Suivez-nous</h5>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/cegep.outaouais/?locale=fr_CA" class="text-dark"><i class="fa fa-facebook fa-2x"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/cegepoutaouais/?hl=fr" class="text-dark"><i class="fa fa-instagram fa-2x"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://cegepoutaouais.qc.ca/" class="text-dark"><i class="fa fa-google fa-2x"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="text-center p-2 c9">
        © 2023 Cégep de l'Outaouais - Tous droits réservés
    </div>
</footer>
