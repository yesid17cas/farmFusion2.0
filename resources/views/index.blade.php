@extends('partials.layout')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0">
    <div id="header-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="w-100" src="{{Vite::asset('resources/img/vege1.jpg')}}" alt="Image" />
                <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                    <div class="p-3" style="max-width: 900px">
                        <h1 class="display-3 text-white mb-md-4">
                            ¡Descubre la frescura en cada bocado con nuestra selección de
                            vegetales directamente del campo a tu mesa!
                        </h1>
                        <a href="{{route('login')}}" class="btn btn-primary py-md-3 px-md-5 mt-2">Iniciar Sesión</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Acerca de nosotros start -->
<div class="container-fluid py-5" id="farmFusionAcerca">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h3 class="text-primary text-uppercase" style="letter-spacing: 5px">
                Acerca de Nosotros
            </h3>
        </div>
        <div class="row">
            <p>
                Buscamos facilitar la conexión directa entre productores locales y consumidores, garantizando la frescura y calidad de los productos ofrecidos, así mismo, luchamos por la justicia económica y social, velando por una remuneración económica justa para nuestros productores locales. <br>
                Nuestra finalidad es optimizar y automatizar la gestión de los distintos procesos administrativos, tales como inventario, eventos, pedidos y gestión de información.
            </p>
        </div>
    </div>
</div>
<!-- Acerca de nosotros end -->

<!-- Team Start -->
<div class="container-fluid py-5" id="farmFusionTeam">
    <div class="container pt-5 pb-3">
        <div class="text-center mb-3 pb-3">
            <h3 class="text-primary text-uppercase" style="letter-spacing: 5px">
                TEAM
            </h3>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                <div class="team-item bg-white mb-4">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="" alt="" />
                        <div class="team-social">
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h5 class="text-truncate">Paula Arbeláez</h5>
                        <p class="m-0">Desarrolladora</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                <div class="team-item bg-white mb-4">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="" alt="" />
                        <div class="team-social">
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h5 class="text-truncate">Juan José Castaño</h5>
                        <p class="m-0">Desarrollador</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                <div class="team-item bg-white mb-4">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="" alt="" />
                        <div class="team-social">
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h5 class="text-truncate">Andrés Céspedes</h5>
                        <p class="m-0">Desarrollador</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 pb-2">
                <div class="team-item bg-white mb-4">
                    <div class="team-img position-relative overflow-hidden">
                        <img class="img-fluid w-100" src="" alt="" />
                        <div class="team-social">
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="text-center py-4">
                        <h5 class="text-truncate">Yesid Castrillón</h5>
                        <p class="m-0">Desarrollador</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->
@endsection