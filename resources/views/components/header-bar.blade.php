<nav>
    @if(auth()->guest())
        <a href="{{route('auth.login')}}">Вход</a>
        <a href="{{route('auth.register')}}">Регистрация</a>
    @else
        @if(auth()->user()->isAdmin)
            <a href="{{route('profiles.index')}}">Все профили</a>
        @endif
        <a href="{{route('profiles.show', ['profile' => auth()->user()->profile->id])}}">Профиль</a>
        <a href="{{route('auth.logout')}}">Выход</a>
    @endif
</nav>
