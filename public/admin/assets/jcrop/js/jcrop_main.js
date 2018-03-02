$(function(){
    // Для примера 1
    var jcrop_api;
    
    
    function initJcrop()//{{{
    {
      // Hide any interface elements that require Jcrop
      // (This is for the local user interface portion.)
      //$('.requiresjcrop').hide();

      // Invoke Jcrop in typical fashion
      $('#img').Jcrop({
        aspectRatio: 1/1,
        onChange: updateCoords,
        onSelect: updateCoords,
        onRelease: rebootCoords
      },function(){
        jcrop_api = this;
      });

    };
//    $('#img-preview').Jcrop({ // Привязываем плагин JСrop к изображению с id=cropbox1
//        aspectRatio: 1/1,
//        onChange: updateCoords,
//        //onSelect: updateCoords
//    });
    $(document).on('submit', '#upload', function(e){
        e.preventDefault();
        
        var formData = new FormData(this);
        $.ajax({
            url: '/api/admin/upload/image/profile',
            method: 'post',
            data: formData, 
            contentType: false, // Тип кодирования данных мы задали в форме, это отключим
            processData: false,
            success: function (response){
               
                $('#user').attr('src', response);
                $('#help')
                    .addClass('callout-success')
                    .removeClass('callout-danger')
                    .html('<h4>Успешно!</h4><p>Изображение сохранено</p>')
                    .fadeIn('slow');
                setTimeout(function(){
                    $('#help').fadeOut('slow');
                    
                }, 2000); 
            },
            error: function(error){
                
                $('#help')
                    .addClass('callout-danger')
                    .removeClass('callout-success')
                    .html('<h4>Ошибка!</h4><p>'+error.responseJSON.message+'</p>')
                    .fadeIn('slow');
                setTimeout(function(){
                    $('#help').fadeOut('slow');
                }, 2000); 
            }
        });        
    });
    
    var imgPreview = $('#img').attr('src');
    
    $('#image').change(function () {
    
        var input = $(this)[0];
        if (input.files && input.files[0]) {
            if (input.files[0].type.match('image.*')) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    initJcrop();
                    //$('#img').attr('src', e.target.result).show();
                    $('#preview').attr('src', e.target.result).show();
                    $('.jcrop-holder').find('img').attr('src', e.target.result);
                    $('#div-preview').css({width:'200px', height:'200px'});
                }
                reader.readAsDataURL(input.files[0]);
            } else {
                console.log('error input file');
            }
        } else {
            console.log('error input file');
        }
    });

    $('#reset-img-preview').click(function() {
        $('#image').val('');
        jcrop_api.release();
        $('#img').attr('src', imgPreview);
        $('.jcrop-holder').find('img').attr('src', imgPreview)
    });
            
            
});

function updateCoords(c) {
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
    
    var rx = 200 / c.w; // 200 - размер окна предварительного просмотра
    var ry = 200 / c.h;

    $('#preview').css({
        width: Math.round(rx * 400) + 'px',
        height: Math.round(ry * 400) + 'px',
        marginLeft: '-' + Math.round(rx * c.x) + 'px',
        marginTop: '-' + Math.round(ry * c.y) + 'px'
    });
    
};

function rebootCoords() {
    $('#x').val('');
    $('#y').val('');
    $('#w').val('');
    $('#h').val('');
       
};
