<div class="mt-5"> {{-- Вывод ошибок валидации. Данный код может быть использован привалидации в разных представлениях (посты, комментарии, формы). Чтобы избежать дублирование кода, мы можем вынести данный код в отдельное представление и подключать его там, где он нужен --}}

    @if (session ('success'))
        <div class="alert alert-success">
            {{ session ('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
