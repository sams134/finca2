<x-app-layout>
    <x-page-title>
        <x-slot:title>Tipos de Animales</x-slot:title>
        Administre los nombres de los tipos de animales que hay en la finca. Algunos ejemplos son Chivo, novillo, vaca, etc.
    </x-page-title>

    <div class="card mb-3">
        <div class="card-body">
            <a class="btn btn-primary me-1 mb-1" href="{{ route('types.create') }}">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Agregar tipo de animal
            </a>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive scrollbar">
                <table class="table table-striped table-hover" id="typesTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Dueño</th>
                            <th scope="col">Sexo</th>
                            <th class="text-end" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $key => $type)
                            <tr>
                                <td style="width: 24px">{{ $key + 1 }}</td>
                                <td>{{ $type->name }}</td>
                                <td>{{$type->gender==1?"Macho":"Hembra"}}</td>
                                <td class="text-end">
                                    <div>
                                        <a class="btn p-0" href="{{route('types.edit',$type)}}" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Edit"><span
                                                class="text-500 fas fa-edit"></span></a>
                                                <form action="{{route('types.destroy',$type)}}" class="d-inline" method="post">
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
