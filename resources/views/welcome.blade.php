<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SG-UNIQ</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        @livewireStyles
    </head>
    <body class="antialiased">



   <main class="flex-shrink-0">

            <header class="py-5 bg-light ">
                <div class="container px-5 pb-5">
                    <div class="row gx-5 align-items-center">
                        <div class="col-xxl-5">
                            <!-- Header text content-->
                            <div class="text-center text-xxl-start">

                                <div class="fs-3 fw-light text-muted">Vos diplomes à l'uniq</div>
                                <h4 class="display-3 fw-bolder mb-5"><span class="text-gradient d-inline">Bienvenue sur SG-UNIQ</span>

                                </h4>

                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xxl-start mb-3">
                                    <a class="btn btn-danger btn-lg px-5 py-3 me-sm-3 fs-6 fw-bolder" href="admin/dashboard">Explore</a>
                                    <a class="btn btn-outline-dark btn-lg px-5 py-3 fs-6 fw-bolder" href="{{ route('register') }}">creer un compte</a>
                                </div>
                              <!--  @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}

                                </div>
                            @endif -->

                            </div>


                        </div>
                        <div class="col-xxl-7 ">
                            <br><div class="card">

                            <img src="{{asset('assets/images/quiaqyeyadip.png') }}" alt="">
                            </div>

                        </div>


                    </div>
                </div>
            </header>
            <!-- About Section-->
            <section class="bg-light py-5">
                <div class="container px-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-xxl-8">
                            <div class="text-center my-5">
                                <h2 class="display-5 fw-bolder"><span class="text-gradient d-inline">A propos de nous</span></h2>
                                <p class="lead fw-light mb-4">Secrétariat generale de l'université Quisqueya</p>
                                <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit dolorum itaque qui unde quisquam consequatur autem. Eveniet quasi nobis aliquid cumque officiis sed rem iure ipsa! Praesentium ratione atque dolorem?</p>
                                <div class="d-flex justify-content-center fs-2 gap-4">
                                    <a class="text-gradient" href="#!"><i class="bi bi-twitter"></i></a>
                                    <a class="text-gradient" href="#!"><i class="bi bi-linkedin"></i></a>
                                    <a class="text-gradient" href="#!"><i class="bi bi-github"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </main>

         @livewireScripts
    </body>
</html>
