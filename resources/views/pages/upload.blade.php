<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Upload daily horoscope</title>
</head>
<body>

    <div class="container my-5">
        <form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <div class="form-group bg-white">
                    <input id="csv-file" type="file" name="csv-file" class="@error('csv-file') is-invalid @enderror">
                </div>
                <input class="btn btn-primary mb-3" type="submit" value="Upload csv file" name="submit">
    
                @error('csv-file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror    

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
            
        </form>
    </div>

</body>
</html>