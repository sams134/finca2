<x-app-layout>
    <x-page-title>
        <x-slot:title>Colores</x-slot:title>
        Administre los colores de los animales
    </x-page-title>

    <div class="card mb-3">
        <div class="card-body">
            <a class="btn btn-primary me-1 mb-1" href="{{ route('colors.create') }}">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Agregar color
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive scrollbar">
                <table class="table table-striped" id="colorsTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Color</th>
                            <th class="text-end" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($colors as $key => $color)
                            <tr>
                                <td style="width: 24px">{{ $key + 1 }}</td>
                                <td>{{ $color->name }}</td>
                                <td class="text-end">
                                    <div>
                                        <a class="btn p-0" href="{{route('colors.edit',$color)}}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit"><span
                                                class="text-500 fas fa-edit"></span></a>
                                                <form action="{{route('colors.destroy',$color)}}" class="d-inline" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn p-0 ms-2 remove" type="button" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Delete"><span
                                                class="text-500 fas fa-trash-alt "></span></button>
                                                </form>
                                        
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <script src="{{asset('js/main.js')}}"></script>
</x-app-layout>
