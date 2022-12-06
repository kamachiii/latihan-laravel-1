<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(session('login') || session('success'))
    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (session('login'))
                        {{ session('login') }}
                    @endif

                    @if ($message = Session::get('success'))
                        {{ $message }}
                    @endif

                    @if ($message = Session::get('update'))
                        {{ $message }}
                    @endif

                    @if ($message = Session::get('delete'))
                        {{ $message }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
    <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
        <div class="py-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <div style="margin-left: 50%">
                            <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                        </div>
                        @csrf
                            <div>
                                <x-text-input minlength="8" maxlength="8" class="block mt-1 w-full" type="text" name="nis" placeholder="NIS" required autocomplete="off"/>
                            </div>
                            <div>
                                <x-text-input class="block mt-1 w-full" type="text" name="name" placeholder="Name" required autocomplete="off"/>
                            </div>
                            <div>
                                <x-text-input class="block mt-1 w-full" type="text" name="rayon" placeholder="Rayon" required autocomplete="off"/>
                            </div>
                            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Rayon :</strong>
                                    <select name="rayon" class="form-control form-select">
                                        Tajur
                                        @for ($i = 1; $i <= 5; $i++)
                                        <option>Tajur {{ $i }}</option>
                                        @endfor

                                        Cicurug
                                        @for ($i = 1; $i <= 7; $i++)
                                        <option>Cicurug {{ $i }}</option>
                                        @endfor

                                        Cisarua
                                        @for ($i = 1; $i <=6; $i++)
                                        <option>Cisarua {{ $i }}</option>
                                        @endfor

                                        Cibedug
                                        @for ($i = 1; $i <= 3; $i++)
                                        <option>Cibedug {{ $i }}</option>
                                        @endfor

                                        Sukasari
                                        @for ($i = 1; $i <=2; $i++)
                                        <option>Sukasari {{ $i }}</option>
                                        @endfor

                                        Wikrama
                                        @for ($i = 1; $i <=4; $i++)
                                        <option>Sukasari {{ $i }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div> --}}
                            <input type="number" value="0" name="money" hidden>
                            <div class="mt-5 col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-outline-secondary">Submit</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <?php $i = 1; ?>
                    <table class="table table-bordered">
                        <tr>
                            <th class="text-center">No</th>
                            <th class="text-center">Nis</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Rayon</th>
                            <th class="text-center">Money</th>
                            <th width="280px" class="text-center">Action</th>
                        </tr>
                        @foreach ($students as $student)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $student->nis }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->rayon }}</td>
                            <td>Rp. {{ number_format($student->money,2,",",".")}}</td>
                            <td>
                                <form action="{{ route('delete', $student->id) }}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <a href="{{ route('edit', $student->id) }}"><button type="button" class="btn btn-outline-primary">Edit</button></a>
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
