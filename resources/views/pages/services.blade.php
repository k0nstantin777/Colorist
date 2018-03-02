@component('components.slider')
    @slot('slides')
        <li style="background-image: url(img/9.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center">
                  <h1 class="probootstrap-heading">Наши услуги</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
    @endslot
@endcomponent
@component('components.section')
    @slot('class') probootstrap-bg-white  @endslot
    @slot('container')
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate" data-animate-effect="fadeIn">
                <h2>Наши предложения</h2>
            </div>
        </div>
        <!-- END row -->
        <div class="row">
            <div class="col-md-6">

                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_1.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Decor Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_3.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Residential Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_1.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Decor Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_2.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Interior Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_4.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Commercial Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

                <div class="probootstrap-service-2 probootstrap-animate">
                    <div class="image">
                        <div class="image-bg">
                            <img src="img/img_sm_2.jpg" alt="Free Bootstrap Template by ProBootstrap.com">
                        </div>
                    </div>
                    <div class="text">
                        <h3>Interior Design</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam pariatur modi praesentium deleniti molestiae officiis atque numquam quos quis nisi voluptatum architecto rerum error.</p>
                    </div>
                </div>

            </div>
        </div>    
    @endslot
    @slot('native')@endslot
@endcomponent

@component('components.section')
    @slot('class')@endslot
    @slot('container')
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Почему стоит выбрать нас</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-mobile3"></i></div>
                    <div class="text">
                        <h3>Consectetur Adipisicing</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>  
                </div>
                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-presentation"></i></div>
                    <div class="text">
                        <h3>Aliquid Dolorum Saepe</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>
                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-circle-compass"></i></div>
                    <div class="text">
                        <h3>Eveniet Tempora Anisi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-lightbulb"></i></div>
                    <div class="text">
                        <h3>Laboriosam Quod Dignissimos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>  
                </div>

                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-magnifying-glass2"></i></div>
                    <div class="text">
                        <h3>Asperiores Maxime Modi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>

                <div class="service left-icon probootstrap-animate" data-animate-effect="fadeInLeft">
                    <div class="icon"><i class="icon-browser2"></i></div>
                    <div class="text">
                        <h3>Libero Maxime Molestiae</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>

            </div>
        </div>
        <!-- END row -->  
    @endslot
    @slot('native')@endslot
@endcomponent

<section class="probootstrap-section probootstrap-bg-white">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>Прайс-лист</h2>
            </div>
        </div>
        <div class="col-md-6 col-md-offset-3 menuItem mb20">
            <ul class="menu mb20">
                <li>
                    Price
                </li>
                <li>
                    <div class="detail">Lorem ipsum dolor <span class="price">$14.49</span>
                    </div>
                </li>
                <li>
                    <div class="detail">Lorem ipsum dolor <span class="price">$20.50</span>
                    </div>
                </li>
                <li>
                    <div class="detail">Lorem ipsum dolor <span class="price">$9.99</span>
                    </div>
                </li>
                <li>
                    Lorem ipsum dolor
                </li>
                <li>
                    <div class="detail">Lorem ipsum dolor <span class="price">$7.99</span>
                    </div>
                </li>
                <li>
                    <div class="detail">Lorem ipsum dolor <span class="price">$14.49</span>
                    </div>
                </li>

            </ul>

        </div>
        <div class="col-sm-2 col-sm-offset-5">
            <a href="https://beauty.dikidi.net/ru/record/113831" target="_blank" class="btn btn-primary btn-lg">Записаться</a>
        </div>
    </div>
</section>