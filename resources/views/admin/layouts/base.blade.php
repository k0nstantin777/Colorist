<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{isset($title) ? $title : route('home')}}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <base href="{{ route('home')}}">
    @include('admin.parts.styles')
    @yield('local-styles')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
        <!--header start--> 
        @yield('header') 
        <!--header end-->
        <!--sidebar start-->
        @yield('sidebar')
        <!--sidebar end-->
      
        <!--main content start-->
        @yield('content')
        <!--main content end-->

        <!--footer start-->
        @yield('footer')
        <!--footer end-->
      
        <!--control-sidebar start-->
        @yield('control-sidebar')
        <!--control-sidebar end-->

        @yield('callout')

      
    </div><!-- ./wrapper -->

    <!-- javascripts -->
    @include('admin.parts.scripts')    
    @yield('local-scripts')
        
  </body>
</html>