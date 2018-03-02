<p>Новая отзыв на сайте {{env('APP_NAME', route('home'))}}</p>
<p>Имя: {{$data['review-name']}}</p>
<span>Отзыв {{nl2br($data['review-text'])}}</span>