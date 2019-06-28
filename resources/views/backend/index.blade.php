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
   <script>
       window.Laravel = <?php echo json_encode([
           'csrfToken' => csrf_token(),
        ]); ?>
    </script>
   <!-- <textarea cols="80" id="editor1" name="editor1" rows="10" data-sample-short>&lt;p&gt;This is some &lt;strong&gt;sample text&lt;/strong&gt;. You are using &lt;a href=&quot;https://ckeditor.com/&quot;&gt;CKEditor&lt;/a&gt;.&lt;/p&gt;</textarea> -->
</body>
</html>