<b>Информация о пользователе</b>

<div class="card-group">
    <div class="card">
        <div class="card-body">
        <img class="img-thumbnail rounded mx-auto d-block" src="{{@$user->avatar}}" alt="Аватар ">


            <h5 class="card-title"> 
            <a href="{{ @$user->edit_link }}">{{@$user->fio }}</a>
            
            </h5>
            <p class="card-text">{{@$user->email }}</p>
            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div>
    </div>
</div> 