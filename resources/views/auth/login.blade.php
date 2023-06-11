<x-layout>
    <x-slot:title>Вход</x-slot:title>
    <div class="form-wrapper">
        <h2>Вход</h2>
        <form action="{{route('auth.login')}}" method="post">
            @csrf
            <div>
                <input type="text" name="email" placeholder="email" value="{{old('email')}}">
                <div style="color: red;">
                    @error('email')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div>
                <input type="text" name="password" placeholder="password">
                <div style="color: red;">
                    @error('password')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div>
                <input type="submit">
            </div>
        </form>
        <p>
            Нет аккаунта?
            <a href="{{route('auth.register')}}">регистрация</a>
        </p>
    </div>
</x-layout>
