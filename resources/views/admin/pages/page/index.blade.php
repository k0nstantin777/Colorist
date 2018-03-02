{{--ADMIN.PAGES.PAGE.INDEX--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Страницы@endslot
    @slot('breadcrump')
    <li class="active">Страницы</li>
    @endslot
@endcomponent

@section('local-styles')
<!-- DataTables -->
<link rel="stylesheet" href="admin/assets/datatables/dataTables.bootstrap.css">
@endsection

@section('local-scripts')
    <!-- DataTables -->
    <script src="admin/assets/datatables/jquery.dataTables.min.js"></script>
    <script src="admin/assets/datatables/dataTables.bootstrap.min.js"></script>
    <script src="admin/js/ajax.js"></script>
    <script>
        $(function () {
            //$("#pages").DataTable();
            $(document).on('click', 'button.have_child', function(e){
                //e.preventDefault();
                var id = $(this).attr('id');
                if ($(this).hasClass('closed')){
                    $(this).html('<i class="fa fa-minus-square"></i>');
                    $('tr.page[id='+id+']').show('slow');

                } else {
                    $(this).html('<i class="fa fa-plus-square"></i>');
                    $('tr.page[id='+id+']').hide('slow')

                }

                $(this).toggleClass('closed');
            });
        });
    </script>
@endsection

<section class="content">
    <div class="row">
        <div class="col-xs-12 margin-bottom">
            <a href="{{route('admin.page.create')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Создать страницу</a>
        </div>
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Список страниц сайта</h3>
                </div><!-- /.box-header -->
                <div class="box-body" id="div-pages" >

                    @include('admin.widgets.lists.pages')

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
