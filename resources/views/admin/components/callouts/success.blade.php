@section ('callout')
<script>
        setTimeout(function(){
            $('#callout_result').animate({bottom:'0'}, 1000);
        }, 500);
        
        
        setTimeout(function(){
            $('#callout_result').animate({bottom:'-100%'}, 1000);
        }, 5000);
       
</script>



<style>
    #callout_result {
        position: fixed; bottom:-100%; width:100%; z-index: 1000;
    }
</style>


<div class='col-xs-12'>
    <div class="callout callout-success" id="callout_result">
        <h4>Успешно!</h4>
        <p>{{$message}}</p>

    </div>
</div>
@endsection