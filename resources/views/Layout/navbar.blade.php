<div class="container-fluid fixed-top">
    <div class="container topbar bg-primary d-none d-lg-block">
        <div class="d-flex justify-content-between">
            <div class="top-info ps-2">
                <small class="me-3"><i class="fas fa-map-marker-alt me-2 text-secondary"></i> <a href="#"
                        class="text-white">123 Street, New York</a></small>
                <small class="me-3"><i class="fas fa-envelope me-2 text-secondary"></i><a href="#"
                        class="text-white">Email@Example.com</a></small>
            </div>
            <div class="top-link pe-2">
                <a href="#" class="text-white"><small class="text-white mx-2">Privacy Policy</small>/</a>
                <a href="#" class="text-white"><small class="text-white mx-2">Terms of Use</small>/</a>
                <a href="#" class="text-white"><small class="text-white ms-2">Sales and Refunds</small></a>
            </div>
        </div>
    </div>
    <div class="container px-0">
        <nav class="navbar navbar-light bg-white navbar-expand-xl">
            <a href="index.html" class="navbar-brand">
                <h1 class="text-primary display-6">Fruitables</h1>
            </a>
            <button class="navbar-toggler py-2 px-3" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="fa fa-bars text-primary"></span>
            </button>
            <div class="collapse navbar-collapse bg-white" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="{{url('')}}" class="nav-item nav-link active">Home</a>
                    <a href="{{ url('produk')}}" class="nav-item nav-link">Produk</a>
                    <a href="{{ url('toko')}}" class="nav-item nav-link">Toko</a>
                    
                    <a href="c{{ url('tentang-kami')}}" class="nav-item nav-link">Tentang kami</a>
                </div>
                <div class="d-flex m-3 me-0">
                    <button class="btn-search btn border border-secondary btn-md-square rounded-circle bg-white me-4"
                        data-bs-toggle="modal" data-bs-target="#searchModal"><i
                            class="fas fa-search text-primary"></i></button>
                    <a href="#" class="position-relative me-4 my-auto">
                        <i class="fa fa-shopping-bag fa-2x"></i>
                        <span
                            class="position-absolute bg-secondary rounded-circle d-flex align-items-center justify-content-center text-dark px-1"
                            style="top: -5px; left: 15px; height: 20px; min-width: 20px;">3</span>
                    </a>
                    @guest
                    <a href="{{url('login')}}" class="my-auto">
                        <i class="fas fa-user fa-2x"></i> 
                    </a> 
                    @else
                        @if(session()->get('role') == 1)
                            <a href="{{ url('buyyer/user')}}" class="my-auto">
                                <i class="fas fa-user fa-2x"></i> Liana 
                            </a>
                        @elseif(session()->get('role') == 2)
                            <a href="{{ url('buyyer/user')}}" class="my-auto">
                                <i class="fas fa-user fa-2x"></i> Liana 
                            </a>
                        @endif
                    @endguest
                </div>
            </div>
        </nav>
    </div>
</div>
