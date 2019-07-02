<script src="{{ URL('js/jquery.min.js') }}"></script>
<script src="{{ URL('js/bootstrap.min.js') }}"></script>
<script src="{{ URL('js/main.js') }}"></script>
<!-- <script src="{{ URL('js/app.js')}}"></script> -->
<script>
	$("#like").click(function(e){
		e.preventDefault();
        var id = {{ $post->id }};
        var like = parseInt($("#num_like").html());
        
        // alert(like);
        $.ajax({
            url: '/like/' + id,
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            }
        }).success(function(){
            $("#num_like").html( like + 1 );
        });
    });
    $("#dislike").click(function(e){
		e.preventDefault();
        var id = {{ $post->id }};
        var dislike = parseInt($("#num_dislike").html());
        
        // alert(like);
        $.ajax({
            url: '/dislike/' + id,
            method: 'POST',
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            }
        }).success(function(){
            $("#num_dislike").html( dislike + 1 );
        });
    });
    // $('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });    
</script>
