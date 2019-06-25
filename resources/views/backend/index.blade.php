<!doctype html>
<html class="no-js" lang=""> <!--<![endif]-->
@include('backend.header.header')
<body>
    <!-- Left Panel -->
    <div id="app">
    
    
   @include('backend.block.leftbanner')
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        @include('backend.header.top')
        <!-- /#header -->
        <!-- Content -->
        @yield('content')
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        @include('backend.footer.bottom')
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    </div>
    <!-- Scripts -->
   @include('backend.footer.footer')

</body>
</html>