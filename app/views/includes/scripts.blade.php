<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('js/ie10-viewport-bug-workaround.js') }}"></script>
    <script type="text/javascript">
	    $(document).ready(function(){
			$('.phone').mask('(00) 0000-0000');
			$('.valor').mask('000.000.000.000.000,00', {reverse: true});
		})
	 </script>
    
    