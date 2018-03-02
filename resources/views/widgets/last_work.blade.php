<div class="work-container">
        <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 work-title wow fadeIn">
                        <h2>{{$album->name}}</h2>
                    </div>
            </div>
            <div class="gamma-container gamma-loading" id="gamma-container">

                <ul class="gamma-gallery">

                        @foreach($images as $image)
                        <li>
                                <div data-alt="img{{$image->id}}" data-description="<i class='fa fa-eye fa-3x'></i>" data-max-width="1800" data-max-height="1350">
                                        <div data-src="{{$imgPath.$image->path}}" data-min-width="700"></div>
<!--                                        <div data-src="{{$imgPath.'big/'.$image->path}}" data-min-width="1000"></div>-->
                                        <div data-src="{{$imgPath.'big/'.$image->path}}" data-min-width="350"></div>
                                        <div data-src="{{$imgPath.'medium/'.$image->path}}" data-min-width="250"></div>
<!--                                        <div data-src="{{$imgPath.'medium/'.$image->path}}" data-min-width="200"></div>
                                        <div data-src="{{$imgPath.'medium/'.$image->path}}" data-min-width="140"></div>-->
                                        <div data-src="{{$imgPath.'medium/'.$image->path}}"></div>        
                                        <noscript>        
                                            <img class="" src="{{$imgPath.'medium/'.$image->path}}" alt="img{{$image->id}}"/>
                                        </noscript>
                                </div>
                        </li>
                        @endforeach
                </ul>        

                <div class="gamma-overlay"></div>
            </div>
                
                    
            
        </div>
</div>