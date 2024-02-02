<!--@author Guillaume-->
<nav class="navbar navbar-expand-lg navbar-dark c10" id="navbar">
    <div class="container-fluid">
        <!--Logo-->
        <a class="navbar-brand d-flex align-items-center" href="{{route('pageAccueil')}}">
            <img src="{{asset('imgs/logo_footer.svg')}}" width="155" height="" alt="Logo du Cégep de l'Outaouais">
            <span class="ms-3">Projet PHP</span>
        </a>

        <div class="collapse navbar-collapse justify-content-end fs-5" id="navbarNav">
            <!--Les differentes pages-->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item" >
                    <a class="nav-link" href="{{route('pageAccueil')}}"
                        @class(['active' => request()->routeIs('pageAccueil')])>
                        {{__('Accueil')}}
                    </a>
                </li>
                @auth()
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Liste
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('enseignants.index')}}"
                                @class(['active' => request()->routeIs('enseignants.index')])>
                                {{__('Enseignants')}}
                            </a>
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('cours.index')}}"
                                @class(['active' => request()->routeIs('cours.index')])>
                                {{__('Cours')}}
                            </a>
                        </li>
                        @if (Gate::any(['admin','gestionnaire']))
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('bloc_cours.index')}}"
                                @class(['active' => request()->routeIs('bloc_cours.index')])>
                                {{__('Bloc de cours')}}
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('bloc_heures.index')}}"
                                @class(['active' => request()->routeIs('bloc_heures.index')])>
                                {{__('Bloc d\'heures')}}
                            </a>
                        </li>
                        @endif
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('campus.index')}}"
                                @class(['active' => request()->routeIs('campus.index')])>
                                {{__('Les campus')}}
                            </a>
                        </li>
                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('local.index')}}"
                                @class(['active' => request()->routeIs('local.index')])>
                                {{__('Locaux')}}
                            </a>
                        </li>
                        @if (Gate::any(['admin','gestionnaire']))
                            <li class="dropdown-item">
                                <a class="nav-link text-black" href="{{route('contraintes.index')}}"
                                    @class(['active' => request()->routeIs('contraintes.index')])>
                                    {{__('Contraintes')}}
                                </a>
                            </li>
                            <li class="dropdown-item">
                                <a class="nav-link text-black" href="{{route('horaire.index')}}"
                                    @class(['active' => request()->routeIs('horaire.index')])>
                                    {{__('Horaires')}}
                                </a>
                            </li>
                        @endif

                        <li class="dropdown-item">
                            <a class="nav-link text-black" href="{{route('cheminements.index')}}"
                                @class(['active' => request()->routeIs('cheminements.index')])>
                                {{__('Chemiments')}}
                            </a>
                        </li>

                    </ul>
                </li>
                @endauth
                @if (Gate::any(['admin','gestionnaire']))
                <li class="nav-item">
                    <a class="nav-link" href="{{route('groupe_cours.index')}}"
                        @class(['active' => request()->routeIs('groupe_cours.index')])>
                        {{__('Création des groupes cours')}}
                    </a>
                </li>
                @endif
                <!--Connection-->
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">{{ __('Log Out') }}</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link"
                           @class(['active' => request()->routeIs('login')])
                           href="{{route('dashboard')}}">{{__('Se connecter')}}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>

        <!--Burger navbar mobile-->
        <div class="-mr-2 flex items-center sm:hidden">
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</nav>
