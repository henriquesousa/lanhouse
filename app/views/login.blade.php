
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <meta charset="utf-8">
        <title>Login Sistema</title>
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

        <!-- JavaScript jQuery code from Bootply.com editor  -->
        <script src="{{ asset('js/gAnalitics.js') }}"></script>


        <!-- CSS code from Bootply.com editor -->
        
        <style type="text/css">
            .modal-footer {   border-top: 0px; }
        </style>
    </head>
    
    <!-- HTML code from Bootply.com editor -->
    
    <body  >
        
        <!--login modal-->
        <div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="text-center">Login</h1>
              </div>


              <!--login erros-->
                  @if (isset($errors))
                    @foreach($errors->all() as $error)
                      <div class="alert alert-danger" role="alert">
                        {{ $error }}
                      </div>
                    @endforeach
                  @endif
              <!--login erros-->

              <div class="modal-body center-block">
                  {{ Form::open(array('route' => 'logon')) }}
                    <div class="form-group">
                      <input type="text" name="username" class="form-control input-lg" placeholder="Nome de Usuário">
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control input-lg" placeholder="Senha">
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-lg btn-block">Entrar</button>
                    </div>
                  {{ Form::close() }}
              </div>
              <div class="modal-footer">
                  <div class="col-md-12">
                  <h4 class="text-center">MINOTAURE - LANHOUSE - SYSTEM LOGIN</h4>
                  </div>    
              </div>
          </div>
          </div>
        </div>

        <script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script type='text/javascript' src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>   
    </body>
</html>