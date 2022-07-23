<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form method="POST" action="{{ url('/filter-file') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="csv_file">Choose CSV File</label>
                    <input type="file" class="form-control" id="csv_file" name="csv_file" value="{{ @old('csv_file')}}">
                </div>
                @error('csv_file')
                    <span class="text-danger">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mt-2">Submit</button>
                </div>
            </form>
        </div>
    </body>
</html>
