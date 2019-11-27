<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Test App</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light main-navbar">
		<div class="container">
			<a class="navbar-brand" href="{{url('/')}}">VACANCIES</a>
		</div>
	</nav>	 
    <div id="app">           
        
        <main class="container">
            @yield('content')           
        </main>
      
    </div>
        
     <!-- <script type="application/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.6/angular.min.js"></script> -->
     <script type="application/javascript"
      src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">      
    </script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script> 
        
</body>
</html>
