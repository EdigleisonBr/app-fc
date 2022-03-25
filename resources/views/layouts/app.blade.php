<!doctype html>
<html lang="en">
    <head>
        <!-- <meta charset="utf-8"> -->
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../../../favicon.ico">

        <title>@yield('title')</title>

        <!-- Estilos customizados para esse template -->
        <link href="/css/layouts.css" rel="stylesheet">

        {{-- font-awesome --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

        <!-- Principal CSS do Bootstrap -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

        @yield('styles')

    </head>

    <body>
        <nav class="navbar navbar-dark fixed-top flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 text-center text-success" href="/dashboard">
                <i class="fab fa-battle-net text-warning"></i> BR<span class="text-white">Tech</span>
            </a>
            <ul class="navbar-nav px-3 d-inline-block">
                @auth
                    <li class="nav-item text-nowrap d-inline-block mr-4 ">
                        <i class="fas fa-eye text-success"></i>
                        {{ Auth::user()->name }}
                    </li>
                    <li class="nav-item text-nowrap d-inline-block mr-4">
                        <form action="/logout" method="POST">
                            @csrf
                            <a 
                                href="/logout"
                                class="nav-link text-dark"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                            <i class="fas fa-sign-out-alt"></i>
                            Sair
                            </a>
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link text-dark mr-4">
                            <i class="fas fa-sign-in-alt"></i>
                            Entrar
                        </a>
                    </li>
                @endguest
                {{-- @guest
                    <li class="nav-item d-inline-block">
                        <a href="/login" class="nav-link text-dark">Entrar</a>
                    </li>
                    <li class="nav-item  d-inline-block">
                        <a href="/register" class="nav-link ml-3 mr-5 text-dark">Cadastrar</a>
                    </li>
                @endguest --}}
            </ul> 
        </nav> 
       
 
        <div class="container-fluid">
            <div class="row">
            
                <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                    <div class="sidebar-sticky">
                        @include('layouts.sidebar')
                    </div>
                </nav>
            
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4 mt-2">
                    @yield('content')
                </main>

            </div>
       </div>
          
    
        @yield('scripts')
        
        <!-- Principal JavaScript do Bootstrap
        ================================================== -->
        <!-- Foi colocado no final para a página carregar mais rápido -->
        <!-- JQuery Mask -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.10/jquery.mask.js"></script>

        <!-- JQuery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>       
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

        <!-- select2 -->
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <!-- Sweet Alert -->
        <script src = " https://unpkg.com/sweetalert/dist/sweetalert.min.js "></script> 

        <!-- Ícones -->
        <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
        <script>
            feather.replace()
        </script>
        
    @include('sweetalert::alert')
    </body>
</html>

