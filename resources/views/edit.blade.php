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
        <form action="{{ route('update', $student->id) }}" method="POST" enctype="multipart/form-data">
            <div class="py-4">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div style="margin-left: 50%">
                                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                            </div>
                            @csrf
                                <div>
                                    <x-text-input value="{{ $student->nis }}" minlength="8" maxlength="8" class="block mt-1 w-full" type="text" name="nis" placeholder="NIS" required autocomplete="off"/>
                                </div>
                                <div>
                                    <x-text-input value="{{ $student->name }}" class="block mt-1 w-full" type="text" name="name" placeholder="Name" required autocomplete="off"/>
                                </div>
                                <div>
                                    <x-text-input value="{{ $student->rayon }}" class="block mt-1 w-full" type="text" name="rayon" placeholder="Rayon" required autocomplete="off"/>
                                </div>
                                <div>
                                    <x-text-input value="{{ $student->money }}" class="block mt-1 w-full" type="text" name="money" placeholder="Rayon" required autocomplete="off"/>
                                </div>
                                <div class="dropdown mt-1">
                                    <select class="btn btn-outline-secondary dropdown-toggle" name="method" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                      <option selected hidden>Method</option>
                                      <option class="bg-light text-dark">Add Money</option>
                                      <option class="bg-light text-dark">Take Money</option>
                                    </select>
                                    {{-- <select class="dropdown-menu">
                                      <li><a class="dropdown-item" href="#">Action</a></li>
                                      <li><a class="dropdown-item" href="#">Another action</a></li>
                                      <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </select> --}}
                                  </div>
                                <div class="mt-5 col-xs-12 col-sm-12 col-md-12 text-center">
                                    <button type="submit" class="btn btn-outline-secondary">Submit</button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- JS Bootstrap --}}
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>
