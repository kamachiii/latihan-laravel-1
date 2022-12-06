<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- CSS Bootstrap --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="container">
            <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
                @csrf

                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nis:</strong>
                            <input value="{{ $student->nis }}" minlength="8" maxlength="8" type="text" name="nis" class="form-control" placeholder="NIS" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Nama:</strong>
                            <input value="{{ $student->name }}" type="text" name="name" class="form-control" placeholder="Nama" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Money:</strong>
                            <input value="{{ $student->money }}" type="text" name="money" class="form-control" placeholder="Money" autocomplete="off" required>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Rayon:</strong>
                            <select name="rayon" class="form-control form-select">
                                {{-- Tajur --}}
                                @for ($i = 1; $i <= 5; $i++)
                                <option @if($student->rayon == "Tajur $i"){{ "selected" }}@endif>Tajur {{ $i }}</option>
                                @endfor

                                {{-- Cicurug --}}
                                @for ($i = 1; $i <= 7; $i++)
                                <option @if($student->rayon == "Cicurug $i"){{ "selected" }}@endif>Cicurug {{ $i }}</option>
                                @endfor

                                {{-- Cisarua --}}
                                @for ($i = 1; $i <=6; $i++)
                                <option @if($student->rayon == "Cisarua $i"){{ "selected" }}@endif>Cisarua {{ $i }}</option>
                                @endfor

                                {{-- Cibedug --}}
                                @for ($i = 1; $i <= 3; $i++)
                                <option @if($student->rayon == "Cibedug $i"){{ "selected" }}@endif>Cibedug {{ $i }}</option>
                                @endfor

                                {{-- Sukasari --}}
                                @for ($i = 1; $i <=2; $i++)
                                <option @if($student->rayon == "Sukasari $i"){{ "selected" }}@endif>Sukasari {{ $i }}</option>
                                @endfor

                                {{-- Wikrama --}}
                                @for ($i = 1; $i <=4; $i++)
                                <option @if($student->rayon == "Wikrama $i"){{ "selected" }}@endif>Sukasari</option>
                                @endfor
                              </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="mt-5 btn btn-outline-primary">Submit</button>
                    </div>
                </div>

            </form>
        </div>
        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
