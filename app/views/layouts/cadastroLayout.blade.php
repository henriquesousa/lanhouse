<!DOCTYPE html>
<html lang="pt-br">
  <head>
    @include('includes.head')
      @yield('head')  
  </head>
  <body>

     <!-- Wrap all page content here -->
    <div id="wrap">
      
      <!-- Fixed navbar -->
      @include('includes.nav')
      <!--/.nav-collapse -->
      
      <!-- container -->
      <div class="container">

        @yield('conteudo')
        
      </div>
        <!-- /container -->
    </div>
      <!-- /wrap -->
     
     @include('includes.footer')
      
      @include('includes.scripts')
        @yield('scripts') 

  </body>
</html>   
