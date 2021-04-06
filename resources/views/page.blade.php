<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/page.css">
    <link rel="stylesheet" href="./css/another.css">
    <title>Cards page</title>
</head>
<body>
    <header class="header">
    
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
                    <h2 class="add-form__title">Add new card:</h2>

                    <input type="text" name="card__title" id="card__title" placeholder="title" class="add-form__input">
                    
                    <input type="text" name="card__body" id="card__body" placeholder="body" class="add-form__input">
                    
                    <input type="text" name="card__link" id="card__link" placeholder="link" class="add-form__input">
                
                    <input type="file" name="card__file" id="card__file" class="add-form__file-input" multiple accept="image/jpeg,image/gif,image/png,application/pdf">

                    <button type="submit" class="add-form__submit">Add</button>
                </form>
            </div>
        </div>

        <form action="{{ route('page') }}" method="get" class="search-block">
            
            @csrf
            <input type="text" name="search-input" id="search-input" placeholder="Find cards..." class="search-block__input">
            <button type="submit" class="search-block__button">Find</button>
        
        </form>
        <div class="cards">
            @foreach($data as $el)

                <div class="card">
                    <img src="{{ $el->link }}" alt="item{{ $el->id }}" class="card__image">
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