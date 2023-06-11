<x-layout>
    <x-slot:title>{{$profile->user->name}}</x-slot:title>
    <div class="wrapper" style="display: flex; flex-wrap: wrap;">
        <div class="about" style="margin-left: 20px; width: 30%; font-size: 24px;">
            <h2 style="font-size: 24px;">Информация</h2>
            <div class="phone">
                Номер телефона: {{$profile->phone?? 'Не указан'}}
            </div>

            <div class="about-myself">
                 О себе: {{$profile->about?? 'Не указан'}}
            </div>
        </div>

        <div class="additionally" style="width: 40%; font-size: 24px;">
            <h2 style="font-size: 24px;">Дополнительно:</h2>
            <div class="hobby">
                Хоби: {{$profile->hobby?? 'Не указан'}}
            </div>

            <div class="favorite_band">
                Любимая группа: {{$profile->favorite_band?? 'Не указан'}}
            </div>

            <div class="comment">
                Комментарий: {{$profile->comment?? 'Не указан'}}
            </div>
        </div>
        <div class="actions" style="width: 100%; margin-left: 20px; font-size: 32px">
            <a href="{{route('profiles.edit', ['profile' => $profile->id])}}">Редактировать</a>
        </div>
    </div>
</x-layout>
