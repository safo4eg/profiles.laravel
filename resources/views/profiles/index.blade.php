<x-layout>
    <x-slot:title>Все профили</x-slot:title>
    <table>
        <thead>
            <tr>
                <th>№</th>
                <th>Имя</th>
                <th>email</th>
                <th>действие</th>
            </tr>
        </thead>
        <tbody>
            @foreach($profiles as $profile)
                <tr>
                    <td>{{$profile->id}}</td>
                    <td>{{$profile->user->name}}</td>
                    <td>{{$profile->user->email}}</td>
                    <td><a href="{{route('profiles.show', ['profile' => $profile->id])}}">Смотреть</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-layout>
