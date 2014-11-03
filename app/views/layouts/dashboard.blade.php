
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        
        <meta name="generator" content="Bootply" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet">
         
        
        <!--[if lt IE 9]>
          <script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link rel="shortcut icon" href="/bootstrap/img/favicon.ico">
        <link rel="apple-touch-icon" href="/bootstrap/img/apple-touch-icon.png">
        <link rel="apple-touch-icon" sizes="72x72" href="/bootstrap/img/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="/bootstrap/img/apple-touch-icon-114x114.png">

        <script src="{{ asset('js/jquery.1.10.2.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/formMasc.js') }}"></script>

        <!-- CSS code from Bootply.com editor -->
        
        @yield('head')
    </head>
    
    <body>
        
        
  <!-- Fixed navbar -->
  @include('includes.nav')
  <!--/.nav-collapse -->
  
<!-- HEADER 
=================================-->

<div class="jumbotron text-center">
    <div class="container">
      <div class="row">
        <div class="col col-lg-12 col-sm-12">
          <h2>Minotaure .::. WEB  <small>Controle Integrado</small></h2>
          
          
        </div>
      </div>
    </div> 
</div>
<!-- /header container-->

<!-- CONTENT
=================================-->
<div class="container"><!-- /container -->

  <div class="container-mensagens" style="width: 1170px; margin-right: auto;margin-left: auto;">
      @if (Session::has('message'))
      <div class="alert alert-info">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <h5><strong>{{ Session::get('message') }}</strong></h5>
      </div>
    @endif
  </div>
    
    <div class="row"><!-- row -->
        <div class="col-md-3 col-sm-4 col-xs-12">
          <!-- Sidebar -->
          @include('includes.adminSidebar')
                  
        </div>
        <!-- /Sidebar -->
        
        <div class="col-md-9">
        <!-- Conteudo -->
          @yield('conteudo')
          
        </div>
  </div><!-- /row -->
</div><!-- /container -->
  
  <!-- Modal -->
  @yield('modal')
  <!-- /Modal -->
<hr>
<!-- /CONTENT ============
    
    <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
-->   
   
   
    @yield('scripts')
  </body>
</html>