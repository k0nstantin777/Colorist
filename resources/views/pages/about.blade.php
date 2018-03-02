@foreach($blocks as $block)
    @include($block->template->template)
@endforeach
@component('components.section')
    @slot('class') probootstrap-bg-white  @endslot
    @slot('container')
        <div class="row">
            <div class="col-md-6 col-md-offset-3 text-center section-heading probootstrap-animate">
                <h2>A Short Story</h2>
            </div>

            <!-- END row -->

            <div class="col-md-6 probootstrap-animate">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere est aspernatur quibusdam harum id. Et tenetur reiciendis repellat dolore aliquam nam maxime fuga quas eius maiores nesciunt enim earum! Beatae harum sed nam fugit error. Est tempora maxime obcaecati atque iusto. Reprehenderit sint deserunt necessitatibus magnam natus vero beatae saepe explicabo molestias similique fuga amet facilis molestiae recusandae voluptas dolore. Sed facilis quo voluptates ratione temporibus tempore autem iure rerum eum optio consectetur in reiciendis totam quibusdam esse maxime pariatur nesciunt similique accusantium dignissimos maiores asperiores sunt numquam! </p>
            </div>
            <div class="col-md-6 probootstrap-animate">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus molestias tempora voluptate eveniet omnis nisi eos, eum nulla ea ad! Rem quo esse facere, vel dolorem recusandae, deserunt officia a, quia illo accusamus, excepturi nam cumque et cupiditate ratione tempore? Expedita in possimus odit illo vitae ea fugit sapiente totam! Id labore ipsum molestias sunt ex. Voluptates deleniti delectus nulla esse similique.</p>
            </div>
        </div>
        <!-- END row -->

        <div class="row">
            <div class="col-md-4 probootstrap-animate">
                <img src="img/img_sm_4.jpg" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </div>
            <div class="col-md-4 probootstrap-animate">
                <img src="img/img_sm_2.jpg" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
            </div>
            <div class="col-md-4 probootstrap-animate">
                <img src="img/img_sm_3.jpg" alt="Free Bootstrap Template by ProBootstrap.com" class="img-responsive">
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
                <h2>Why Choose Us</h2>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-mobile3"></i></div>
                    <div class="text">
                        <h3>Consectetur Adipisicing</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>  
                </div>
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-presentation"></i></div>
                    <div class="text">
                        <h3>Aliquid Dolorum Saepe</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-circle-compass"></i></div>
                    <div class="text">
                        <h3>Eveniet Tempora Anisi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-lightbulb"></i></div>
                    <div class="text">
                        <h3>Laboriosam Quod Dignissimos</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>  
                </div>

                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-magnifying-glass2"></i></div>
                    <div class="text">
                        <h3>Asperiores Maxime Modi</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>

                <div class="service left-icon probootstrap-animate">
                    <div class="icon"><i class="icon-browser2"></i></div>
                    <div class="text">
                        <h3>Libero Maxime Molestiae</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto provident qui tempore natus quos quibusdam soluta at.</p>
                    </div>
                </div>

            </div>
        </div>
    @endslot
    @slot('native')@endslot
@endcomponent