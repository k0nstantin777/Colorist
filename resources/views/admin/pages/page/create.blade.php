{{--ADMIN.PAGES.PAGE.CREATE--}}
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Создание страницы@endslot
    @slot('breadcrump')
        <li><a href="{{route('admin.page.index')}}">Страницы сайта</a></li>
        <li class="active">Создание страницы</li>
    @endslot
@endcomponent

<!-- Main content -->
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-sm-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Форма создания страницы</h3>
                </div><!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">
                    @include('admin.widgets.forms.page-params')
                </div><!-- /.box-body -->

            </div><!-- /.box -->
        </div><!--/.col (right) -->
    </div>   <!-- /.row -->
</section><!-- /.content -->
