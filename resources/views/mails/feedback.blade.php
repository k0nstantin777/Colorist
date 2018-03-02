<p>Cообщение из формы обратной связи на сайте {{env('APP_NAME', route('home'))}}</p>
<p>Имя: {{$data['name']}}</p>
<p>email: {{$data['email']}}</p>
<p>Тема сообщения: {{$data['subject']}}</p>
<span>Сообщение: {{nl2br($data['message'])}}</span>