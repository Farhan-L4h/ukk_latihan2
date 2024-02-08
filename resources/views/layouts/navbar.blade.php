<nav class="navbar bg-body-tertiary shadow-sm" style="position: sticky; top: 0; z-index: 5;">
    <div class="container-fluid">
        <a class="navbar-brand"><b>Farhan Resto</b></a>
        <div class="d-flex justify-content-end">

        </div>

        <div class="d-flex justify-content-end nav-link">

            <div class="btn-group rounded" role="group" aria-label="Basic example">
                <button type="button" class="btn btn-primary"><a href="#carouselExampleCaptions" style="color: white; text-decoration: none;">Home </a></button>
                <button type="button" class="btn btn-primary"><a href="#content" style="color: white; text-decoration: none;">Menu</a></button>
                <button type="button" class="btn btn-primary"><a href="#" style="color: white; text-decoration: none;">Orderan</a></button>
            </div>
                
                <div class="dropdown ms-1 my-1">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }}
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item text-black" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
        </div>
        <!-- <form class="d-flex" role="search">
            
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
    </div>
</nav>