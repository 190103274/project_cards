<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/page.css">
    <link rel="stylesheet" href="./css/anothe.css">
    <title>Cards page</title>
</head>
<body>
    <header class="header">
        <div></div>
        <div class="header__langs">
            <a href="{{ route('enpage') }}" class="header__lang-link">En</a>
            <a href="{{ route('rupage') }}" class="header__lang-link">Ru</a>
        </div>
    </header>
    <main class="main">
        <div class="profile">
            <div class="profile__image profile__image_avatar"></div>
            <div class="profile__image profile__image_item">
                @if($errors->any())
                    <div class='alert alert-dager'>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form enctype="multipart/form-data" action="{{ route('add-form') }}" method="post" class="add-form">
                    @csrf
                    <h2 class="add-form__title">{{__('lang.add_title')}}</h2>

                    <input type="text" name="card__title" id="card__title" placeholder="{{__('lang.title_placehol')}}" class="add-form__input">
                    
                    <input type="text" name="card__body" id="card__body" placeholder="{{__('lang.body_placehol')}}" class="add-form__input">
                
                    <input type="file" name="card__file" id="card__file" class="add-form__file-input" multiple accept="image/jpeg,image/gif,image/png,application/pdf">

                    <button type="submit" class="add-form__submit">{{__('lang.add')}}</button>
                </form>
            </div>
        </div>

        <form action="{{ route('page') }}" method="get" class="search-block">
            
            @csrf
            <input type="text" name="search-input" id="search-input" placeholder="{{__('lang.find_placehol')}}" class="search-block__input">
            <button type="submit" class="search-block__button">{{__('lang.find')}}</button>
        
        </form>
        <div class="cards">
            @foreach($data as $el)

                <div class="card">
                    <img src="{{ $data_img->where('card_id', '=', $el->id)->first()->filename }}" alt="item{{ $el->id }}" class="card__image">
                    <h3 class="card__title">{{ $el->title }}</h3>
                    <p class="card__body">{{ $el->body }}</p>
                    <a href="{{ route('card-update', $el->id) }}"><button class="card__button-change">Change</button></a>
                    <a href="{{ route('card-delete', $el->id) }}"><button class="card__button-delete">Delete</button></a>
                </div>

            @endforeach
        </div>
    </main>
    <footer class="footer">
    
    </footer>
</body>
</html>