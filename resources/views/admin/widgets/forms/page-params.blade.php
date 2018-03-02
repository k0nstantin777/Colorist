@if(isset($pageModel))
{{Form::open(['route' => ['admin.page.update', $pageModel->slug], 'id'=> 'page-params', 'class' => 'form-horizontal', 'role'=> 'form', 'method' => 'PUT'])}}
@else
{{Form::open(['route' => ['admin.page.store'], 'id'=> 'page-params', 'class' => 'form-horizontal', 'role'=> 'form'])}}
@endif
    {{Form::adminText('pageName',
        'Название страницы <sup><i class="fa fa-question-circle" title="Название страницы, указанное в меню сайта"></i></sup>',
        isset($pageModel) ? $pageModel->name : old('pageName'))}}
    {{Form::adminText('pageHint',
        'Описание страницы <sup><i class="fa fa-question-circle" title="Описание страницы используется для администратора"></i></sup>',
        isset($pageModel) ? $pageModel->hint : old('pageHint'))}}
    {{Form::adminText('pageTitle',
        'Title <sup><i class="fa fa-question-circle" title="МЕТА-тег Title: заголовок страницы, который виден, если навести на вкладку в браузере"></i></sup>',
        isset($pageModel) ? $pageModel->title : old('pageTitle'))}}
    {{Form::adminText('pageSlug',
        'Название в адресной строке <sup><i class="fa fa-question-circle" title="Название страницы, отображаемое в адресной строке браузера, после домена"></i></sup>',
        isset($pageModel) ? $pageModel->slug : old('pageSlug'))}}
    {{Form::adminText('pageKeywords',
        'Keywords <sup><i class="fa fa-question-circle" title="МЕТА-тег Keywords: ключевые слова на странице, например: Стрижка, укладка, мойка"></i></sup>',
        isset($pageModel) ? $pageModel->keywords : old('pageKeywords'))}}
    {{Form::adminText('pageDescription',
        'Description <sup><i class="fa fa-question-circle" title="МЕТА-тег Description: описание страницы, например: Наш салон предлагает на выбор несколько услуг"></i></sup>',
        isset($pageModel) ? $pageModel->description : old('pageDescription'))}}
    {{Form::adminSelect('pageStatus',
        'Статус страницы <sup><i class="fa fa-question-circle" title="Показывать или нет страницу на сайте"></i></sup>',
         ['Неактивна', 'Активна'], isset($pageModel) ? $pageModel->is_active : 1) }}
    {{Form::adminSelect('pageNoindex',
        'Индексация страницы <sup><i class="fa fa-question-circle" title="Разрешить или нет поисковым роботам индексацию страницы"></i></sup>',
         ['Индексировать', 'Не индексировать'], isset($pageModel) ? $pageModel->noindex : 0) }}
    {{Form::adminSelect('pageSitemap',
        'Карта сайта <sup><i class="fa fa-question-circle" title="Показывать или нет страницу на карте сайта"></i></sup>',
         ['Не показывать', 'Показывать'], isset($pageModel) ? $pageModel->sitemap : 1) }}
@if(isset($parentPage))
    {{Form::hidden('parentPage', $parentPage->id)}}
    {{Form::adminStatic('blockTemplate',
            'Родительская страница <sup><i class="fa fa-question-circle" title="Родительская страница, к которой привязывается данная страница"></i></sup>',
             $parentPage->name) }}
@endif
    {{Form::button('Сохранить', ['form'=> 'page-params', 'class' => 'btn btn-primary col-sm-offset-3', 'type' => 'submit'])}}
{{Form::close()}}


