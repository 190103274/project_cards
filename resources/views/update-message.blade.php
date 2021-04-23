<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./../../../css/update-page1.css">
    <title>Update card</title>
</head>
<body>
    <main class="main">
        <div class="update-popup">
            <div class="form">
                <form enctype="multipart/form-data" action="{{ route('card-update-submit', $data->id) }}" method="post" class="update-form">
                    @csrf
                    <h2 class="update-form__title">{{__('lang.update_title')}}</h2>

                    <input value="{{ $data->title }}" type="text" name="card__title" id="card__title" placeholder="{{__('lang.title_placehol')}}" class="update-form__input">
                    
                    <input value="{{ $data->body }}" type="text" name="card__body" id="card__body" placeholder="{{__('lang.body_placehol')}}" class="update-form__input">
                
                    <input type="file" name="card__file" id="card__file" class="add-form__file-input" multiple accept="image/jpeg,image/gif,image/png,application/pdf">

                    <button type="submit" class="update-form__submit">{{__('lang.update')}}</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>