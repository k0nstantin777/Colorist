//Обработка формы редактирования блока
// $(document).on('submit', '.block-edit', function(){
//     event.preventDefault();
//     id = $(this).attr('id');
//     $.ajax({
//             url: '/api/admin/block/edit',
//             type: 'post',
//             data: $(this).serialize(),
//             //dataType:'json',
//
//             beforeSend: function (){
//                 $('#response'+id).show().html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
//             },
//
//             success: function (response) {
// //                console.log(response);
//                 $('.form-group').removeClass('has-error');
//                 $('.help-block').remove();
//                 $('#response'+id).hide().html('<p class="info"><span class="label label-success">Изменения сохранены</span></p>');
//                 $('#response'+id).fadeIn('slow');
//
//                 setTimeout(function(){
//                     $('#response'+id).fadeOut('slow');
//                 }, 2000);
//
//             },
//             error: function (error, status) {
//                 $('.form-group').removeClass('has-error');
//                 $('.help-block').remove();
//
//                 var errors = JSON.parse(error.responseText).errors;
//                 $.each(errors, function(key, value){
//                     $('#'+key).parents('.form-group').addClass('has-error');
//                     $('#response'+id).hide().html('<p class="info"><span class="label label-danger">'+value+'</span></p>');
//
//                 });
//
//                 $('#response'+id).fadeIn('slow');
//
//                 setTimeout(function(){
//                     $('#response'+id).fadeOut('slow');
//                 }, 3000);
//
//             }
//
//     });
//
// });

//Обработка формы редактирования параметров страницы
$(document).on('submit', '#page-params', function(){
    event.preventDefault();
    id = $(this).attr('id');
    $.ajax({
            url: '/api/admin/page/edit',
            type: 'post',
            data: $(this).serialize(),
            //dataType:'json',
            
            beforeSend: function (){
                $('#response').show().html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
            },
            
            success: function (response) {
//                console.log(response);
                $('.form-group').removeClass('has-error');
                $('.help-block').remove();
                $('#response').html('<p class="btn btn-success" style="opacity:0.5;">Изменения сохранены</p>');

                setTimeout(function(){
                    $('#response').fadeOut('slow');
                }, 2000);                
                
            },
            error: function (error, status) {
               
                $('.form-group').removeClass('has-error');
                $('.help-block').remove();
                
                var errors = JSON.parse(error.responseText).errors;
                $.each(errors, function(key, value){
                    $('#'+key).parents('.form-group').addClass('has-error');
                    $('#response').html('<p class="btn btn-danger" style="opacity:0.5;">'+value+'</p>');
                    
                });

                setTimeout(function(){
                    $('#response').fadeOut('slow');
                }, 3000);     
                
            }
            
    });  
});    
//Обработка формы назначения альбомов фотографиям в модальном окне
// $(document).on('submit', '.img-album-edit', function(){
//     event.preventDefault();
//     var id = $(this).attr('id');
//     $.ajax({
//             url: '/api/admin/img/albums/edit',
//             type: 'post',
//             data: $(this).serialize(),
//             //dataType:'json',
//
//             beforeSend: function (){
//                 $('#response'+id).show().html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
//             },
//
//             success: function (response) {
//
//                 $('#modal'+id).modal('hide');
//
//                 setTimeout(function(){
//                    $('#photo-panel').remove();
//                    $(response).appendTo('#photo-list');
//                 }, 500);
//             },
//             complite: function (){
//                 //
//             },
//             error: function (error, status) {
//
//                 var errors = JSON.parse(error.responseText).errors;
//                 $.each(errors, function(key, value){
//                     $('#'+key).parents('.form-group').addClass('has-error');
//                     $('#response'+id).hide().html('<p class="info"><span class="label label-danger">'+value+'</span></p>');
//
//                 });
//
//                 $('#response'+id).fadeIn('slow');
//
//                 setTimeout(function(){
//                     $('#response'+id).fadeOut('slow');
//                 }, 3000);
//
//             }
//
//     });
// });

//Обработка формы создания альбома в модальном окне
// $(document).on('submit', '.album-create', function(){
//     event.preventDefault();
//
//     $.ajax({
//             url: '/api/admin/album/create',
//             type: 'post',
//             data: $(this).serialize(),
//             //dataType:'json',
//
//             beforeSend: function (){
//                 $('#responseAlbumCreate').show().html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
//             },
//
//             success: function (response) {
//                 //console.log(response);
//                 $('.form-group').removeClass('has-error');
//                 $('.help-block').remove();
//                 $('#responseAlbumCreate').hide().html('<p class="info"><span class="label label-success">Альбом создан</span></p>');
//                 $('#responseAlbumCreate').fadeIn('slow');
//
//                 $('#albums-list').remove();
//                 $(response).appendTo('#table-albums');
//
//                 setTimeout(function(){
//                     $('#responseAlbumCreate').fadeOut('slow');
//                 }, 500);
//                 setTimeout(function(){
//                     $('#createAlbum').modal('hide');
//                 }, 1200);
//
//
//             },
//             error: function (error, status) {
// //                console.log(error);
//                 $('.form-group').removeClass('has-error');
//                 $('.help-block').remove();
//
//                 var errors = JSON.parse(error.responseText).errors;
//                 $.each(errors, function(key, value){
//                     $('#'+key).parents('.form-group').addClass('has-error');
//                     $('#responseAlbumCreate').hide().html('<p class="info"><span class="label label-danger">'+value+'</span></p>');
//
//                 });
//
//                 $('#responseAlbumCreate').fadeIn('slow');
//
//                 setTimeout(function(){
//                     $('#responseAlbumCreate').fadeOut('slow');
//                 }, 3000);
//
//             }
//
//     });
// });

$(document).on('click', '.sort',function(){
    var id = $(this).attr('id').replace(/\D/g,'');
    var move = $(this).attr('id').replace(id,'');
    $('#move'+id).val(move);
});

$(document).on('submit', '.page-sort', function(event){
    event.preventDefault();
    var data = $(this).serialize();
    $.post('/api/admin/page/sort', data, function(response){
        $('#table-pages').remove();
        $(response).appendTo('#div-pages');
        //console.log(response);
    });
});
//
// //Обработка формы редактирования альбома в модальном окне
// function checkErrorsForm(form, modal){
//     if ($('.has-error', form).length){
//         $(modal).modal('show');
//     }
// }
//
// //активный пункт меню
// function setActiveItemMenu(uri){
//
//     $(".sidebar-menu").find('li').removeClass('active');
//     $(".sidebar-menu a[href='"+uri+"']").parents('li').addClass('active');
// }
//
// /**
//  * Получение текущего Uri (для главной страницы обрезаем слэш)
//  * @param {string} uri
//  * @returns {string}
//  */
// function getUri (uri){
//     if (uri.endsWith('/')){
//         return uri.substring(0, uri.lastIndexOf('/'));
//     }
//
//     return uri;
// }

//$(document).on('submit', '.album-edit', function(){
//    event.preventDefault();
//   var id = $('#albumId', this).val();
//   var name = $('#name', this).val();
//   var discription = $('#discription', this).val();
//    
//    $.ajax({
//            url: '/api/admin/album/edit',
//            type: 'post',
//            data: $(this).serialize(),
//            //dataType:'json',
//            
//            beforeSend: function (){
//                $('#responseAlbumEdit').show().html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw"></i>');
//            },
//            
//            success: function (response) {
//                //console.log(response);
//                $('.form-group').removeClass('has-error');
//                $('.help-block').remove();
//                $('#responseAlbumEdit').hide().html('<p class="info"><span class="label label-success">Измененя сохранены</span></p>');
//                $('#responseAlbumEdit').fadeIn('slow');
//                
//                $('#albums').remove();
//                $(response).appendTo('#albums-list');
//                
//                setTimeout(function(){
//                    $('#responseAlbumEdit').fadeOut('slow');
//                }, 500);  
//                setTimeout(function(){
//                    $('#editAlbum').modal('hide');
//                }, 1200);
//                
//                
//            },
//            error: function (error, status) {
////                console.log(error);
//                $('.form-group').removeClass('has-error');
//                $('.help-block').remove();
//                
//                var errors = JSON.parse(error.responseText).errors;
//                $.each(errors, function(key, value){
//                    $('#'+key).parents('.form-group').addClass('has-error');
//                    $('#responseAlbumCreate').hide().html('<p class="info"><span class="label label-danger">'+value+'</span></p>');
//                    
//                });
//                
//                $('#responseAlbumCreate').fadeIn('slow');
//                
//                setTimeout(function(){
//                    $('#responseAlbumCreate').fadeOut('slow');
//                }, 3000);     
//                
//            }
//            
//    });
//});


//$('.photo').draggable({containment: ".photos",revert: true,revertDuration: 0});
//
//$( ".place" ).droppable({
//
//over: function( event, ui )//если фигура над клеткой- выделяем её границей
//  {
//  $(this).addClass('hover');
//  },
//out: function( event, ui )//если фигура ушла- снимаем границу
//  {
//  $(this).removeClass('hover');
//  },
//drop:function( event, ui )//если бросили фигуру в клетку
//  {
//  $(this).append(ui.draggable);//перемещаем фигуру в нового предка
//  $(this).removeClass('hover');//убираем выделение
//  }
//});


//перемещение изображений в альбомах
// $(function(){
//         $(".image-sort").sortable({
//             placeholder: "placehold",
//             forcePlaceholderSize: true,
//             tolerance: 'pointer',
//             opacity: 0.6,
//             cursor: "move",
//             update: function (event, ui){
//                 var data = $(this).sortable("serialize") + '&albumId='+$(this).attr('id');
//                 $.post('/api/admin/image/sort', data, function(response){
//
//                 });
//
//             },
//         });
// });



