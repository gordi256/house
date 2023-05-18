 <div>
     Добро пожаловать на сайт: {{ config('app.url') }}
     </br> </br>
     </br> Ваш логин : {{ $user->email }} </br> </br>
     </br> Установите Ваш пароль по ссылке <b><a
             href="{{ config('app.url') }}/forgot-password">{{ config('app.url') }}</a> </b>


 </div>
