<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="{{isset($keywords) ? $keywords : ''}}"> 
    <meta name="description" content="{{isset($description) ? $description : ''}}">

    @if($noindex)
        <meta name="robots" content="noindex">
    @endif

    <title>{{ isset($title) ? $title : route('home') }}</title>
    <base href="{{ route('home')}}">
    
    <!-- Styles -->
    @yield('styles')
    @yield('local_styles')

    @if($sitemap)
        <link href='{{ url('sitemap.xml') }}' rel='alternate' title='Sitemap' type='application/rss+xml'/>
    @endif

    <link rel="shortcut icon" href="favicon.ico">

    <!--[if lt IE 9]>
      <script src="js/ie/html5shiv.min.js"></script>
      <script src="js/ie/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
        
    <!-- Top menu -->
    @yield('mainnavbar')

    <!-- Content -->
    @yield('content')

    <!-- Footer -->
    @yield('footer')
      
    <!-- scripts -->
    @yield('scripts')
    @yield('local_scripts')

   </body>
</html>