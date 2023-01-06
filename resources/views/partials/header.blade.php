<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="#!">Start Bootstrap</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('home')}}">Home</a></li>

                @if (Auth::check())
                <li class="nav-item"><a class="nav-link" href="{{ route('showupload')}}">upload</a></li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('logout')}}">logout</a></li>
                        <li><a class="dropdown-item" href="{{ route('myproduct')}}">myproduct</a></li>
                        <li><a class="dropdown-item" href="{{ route('showcashout')}}">my balance</a></li>
                        <li><a class="dropdown-item" href="{{ route('withdraw')}}">withdraw</a></li>


                    </ul>
                </li>
                 @else
                 <li class="nav-item"><a class="nav-link" href="{{ route('showregister')}}">Register</a></li>
                 <li class="nav-item"><a class="nav-link" href="{{ route('showlogin')}}">login</a></li>
                @endif

            </ul>
            <form class="d-flex">
                <button class="btn btn-outline-dark" type="submit">
                    <i class="bi-cart-fill me-1"></i>
                    Cart
                    <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </button>
            </form>
        </div>
    </div>
</nav>
