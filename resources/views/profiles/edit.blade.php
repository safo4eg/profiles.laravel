<x-layout>
    <x-slot:title>{{$profile->user->name}}</x-slot:title>
    <div class="wrapper" style="display: flex; flex-wrap: wrap;">
        <div class="form-about" style="margin-left: 20px; width: 30%; font-size: 16px;">
            <h2 style="font-size: 24px;">Информация</h2>
            <form action="{{route('profiles.update', ['profile' => $profile->id])}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div>
                    <input type="text" name="phone" placeholder="phone" value="{{old('phone')?? $profile->phone}}">
                    <div style="color: red;">
                        @error('phone')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div>
                    <textarea name="about" style="height: 200px;" placeholder="Расскажите о себе">{{old('about')?? $profile->about}}</textarea>
                    <div style="color: red;">
                        @error('about')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="submit" value="Сохранить">
                </div>

            </form>
        </div>

        <div class="form-additionally" style="width: 40%; font-size: 16px;">
            <h2 style="font-size: 24px;">Дополнительно:</h2>
            <form action="{{route('profiles.update', ['profile' => $profile->id])}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="hobby">
                    <input type="text" name="hobby" placeholder="Хоби" value="{{old('hobby')?? $profile->hobby}}">
                    <div style="color: red;">
                        @error('hobby')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="favorite_band">
                    <input type="text" name="favorite_band" placeholder="Любимая группа" value="{{old('favorite_band')?? $profile->favorite_band}}">
                    <div style="color: red;">
                        @error('favorite_band')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div class="comment">
                    <input type="text" name="comment" placeholder="Комментарий" value="{{old('comment')?? $profile->comment}}">
                    <div style="color: red;">
                        @error('comment')
                            {{$message}}
                        @enderror
                    </div>
                </div>

                <div>
                    <input type="submit" value="Сохранить">
                </div>
            </form>
        </div>

    </div>
</x-layout>
