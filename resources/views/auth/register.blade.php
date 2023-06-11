<x-layout>
    <x-slot:title>Регистрация</x-slot:title>
    <div class="form-wrapper">
        <h2>Регистрация</h2>
        <form action="{{route('auth.register')}}" method="post">
            @csrf
            <div>
                <input type="text" name="name" placeholder="name" value="{{old('name')}}">
                <div style="color: red;">
                    @error('name')
                        {{$message}}
                    @enderror
                </div>
            </div>

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
                <input type="text" name="password_confirmation" placeholder="confirm">
                <div style="color: red;">
                    @error('password_confirmation')
                        {{$message}}
                    @enderror
                </div>
            </div>

            <div>
                <input type="submit">
            </div>
        </form>
        <p>
            Уже есть аккаунт?
            <a href="{{route('auth.login')}}">Вход</a>
        </p>
    </div>
</x-layout>
