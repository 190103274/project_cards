<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../../css/update-page.css">
    <title>Update card</title>
</head>
<body>
    <main class="main">
        <div class="update-popup">
            <div class="form">
                <form action="{{ route('card-update-submit', $data->id) }}" method="post" class="update-form">
                    @csrf
                    <h2 class="update-form__title">Update card:</h2>

                    <input value="{{ $data->title }}" type="text" name="card__title" id="card__title" placeholder="title" class="update-form__input">
                    
                    <input value="{{ $data->body }}" type="text" name="card__body" id="card__body" placeholder="body" class="update-form__input">
                    
                    <input value="{{ $data->link }}" type="text" name="card__link" id="card__link" placeholder="link" class="update-form__input">
                
                    <button type="submit" class="update-form__submit">Update</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>