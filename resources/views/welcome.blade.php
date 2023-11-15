<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="container pt-lg-3">

        <h1 class="text-center w-50 mx-auto ">Caesar Cipher</h1>
        <hr >
        <form class="form-group" method="POST" action="{{url('/cipher-decipher')}}">
            @csrf
            <div class="row mt-2">
                <div class="col-md-5">
                    <textarea class="form-control" name="text" rows="8" required>{{$originalText ?? ""}}</textarea>
                </div>

                <div class="col-md-2 my-4 d-flex flex-column align-items-center justify-content-around">
                    <input type="number" name="shift_value" class="form-control" min="0" value="{{ $shiftValue ?? ""}}" required>
                    @if($errors->has('shift_value'))
                        <div class="invalid-tooltip">{{ $errors->first('text') }}</div>
                    @endif
                    <div class="btn-group-vertical">
                        <button class="btn btn-outline-primary" name="cipher" >Cipher</button>
                        <button class="btn btn-outline-primary" name="decipher" >Decipher</button>
                    </div>
                </div>

                <div class="col-md-5">
                    <textarea class="form-control" rows="8" readonly>{{$resultText ?? ""}}</textarea>
                </div>
            </div>
        </form>
    </body>
</html>
