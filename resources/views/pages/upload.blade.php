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

    <div class="container my-5 ">

        @if($sign==0)
        <form action="{{route('sign.store')}}" method="post" enctype="multipart/form-data" class="mb-5">
            @csrf

            <div class="form-group">
                <h4 class="mb-3">Upload here your <span style="text-decoration:underline;" class="">signs</span> file: </h4>

                <div class="form-group bg-white mb-4">
                    <input id="signs-file" type="file" name="signs-file" class="@error('signs-file') is-invalid @enderror">
                </div>

                <input class="btn btn-primary text-white mb-4" type="submit" value="Upload signs file" name="submit">
    
                @error('signs-file')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror    

                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
            </div>
        </form>
        @endif

        @if($sign>0)
            <form action="{{route('horoscope.store')}}" method="post" enctype="multipart/form-data" class="mb-5">
                @csrf

                <div class="form-group">
                    <h4 class="mb-3">Upload here your <span style="text-decoration:underline;">horoscopes</span> file: </h4>

                    <div class="form-group bg-white mb-4">
                        <input id="horoscopes-file" type="file" name="horoscopes-file" class="@error('horoscopes-file') is-invalid @enderror">
                    </div>

                    <input class="btn btn-primary text-white mb-4" type="submit" value="Upload horoscopes file" name="submit">
        
                    @error('horoscopes-file')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror    

                    @if(session()->has('message-horoscope'))
                        <div class="alert alert-success">
                            {{ session()->get('message-horoscope') }}
                        </div>
                    @endif
                </div>
            </form>
        @endif
    </div>
    
</body>
</html>