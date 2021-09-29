<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

        <title>Movie App</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css" >
        <!-- Css -->
        <link rel="stylesheet" href="{{secure_asset('css/app.css')}}">
        
        <!-- Bootstrap core CSS -->
        <link href="{{asset('frontend/dist/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- Custom styles Carousel -->
        <link href="{{asset('frontend/carousel.css')}}" rel="stylesheet">

      
    </head>
    <body class="antialiased">
         <div id="app">
         <app-component></app-component>
        </div>
       <script src="{{asset('js/app.js')}}"></script>
  <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
    <script src="{{asset('frontend/assetsassets/js/vendor/jquery-slim.min.js')}}"></script>
    <script src="{{asset('frontend/assets/js/vendor/popper.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/bootstrap.min.js')}}"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="{{asset('frontend/assets/js/vendor/holder.min.js')}}"></script>
    </body>
</html>
