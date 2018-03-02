
<!-- Content Header (Page header) -->
@component('admin.components.page-header')
    @slot('head')Панель управления@endslot
    @slot('breadcrump')
        <li class="active">Начальная страница</li>
    @endslot


@endcomponent

@section('local-scripts')
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="admin/assets/morris/morris.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="admin/assets/dist/js/pages/dashboard.js"></script>
@endsection
    
    
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>{{$messages_count}}</h3>
                        <p>cообщени{{messagesCountEnding($messages_count)}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-ios-email-outline"></i>
                    </div>
                    <a href="{{route('admin.message.index')}}" class="small-box-footer"> Перейти<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3>{{$reviews_count}}</h3>
                        <p>отзыв{{reviewCountEnding($reviews_count)}}</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-chatbubble-working"></i>
                    </div>
                    <a href="{{route('admin.review.index')}}" class="small-box-footer"> Перейти<i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div><!-- ./col -->

    </section><!-- /.content -->
