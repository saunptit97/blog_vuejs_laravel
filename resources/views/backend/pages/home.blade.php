@extends('backend.index')
@section('title', 'Admin | Home')
@section('content')

    <router-view name="homeIndex"></router-view>
    <router-view></router-view>

    <script type="application/javascript">
        window.Laravel = <?php echo json_encode([
            'csrf_token' => csrf_token(),
            'count_post' => $post,
            'count_category' => $category,
            'count_view' => $view,
            'count_like' => $like,
            'count_dislike' => $dislike
        ]); ?>
    </script>
@endsection