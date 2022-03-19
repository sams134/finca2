<div>
    <x-page-title>
        <x-slot:title>Listado de Animales</x-slot:title>
       Vea todos los animales en la finca.
    </x-page-title>

    <div class="card mb-3">
        <div class="card-body">
            <a class="btn btn-primary me-1 mb-1" href="{{route('animals.create')}}">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Agregar Nuevo animal
            </a>
            <a class="btn btn-warning me-1 mb-1" href="">
                <span class="fas fa-plus me-1" data-fa-transform="shrink-3"></span>Agregar Nuevo Lote de Animales
            </a>
            <div class="block m-3">
                <label class="form-label" for="searchTxt">Nombre del nuevo Dueño</label>
                <input type="text" name="" id="searchTxt" wire:model="search" class="form-control" placeholder="Buscar numero, dueño, color, etc...">
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="mb-3 shadow p-3 bg-100 d-flex d-flex justify-content-between">
                
                <div style="width:50%" class="d-inline">
                    Ver 
                    <select name="cant" id="cant" wire:model="cant" class="">
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="1000">1000</option>
                    </select> Registros
                </div>
                <div>
                    <div class="form-check form-switch">
                        <label class="form-check-label" for="flexSwitchCheckChecked">Ver solo activos</label>
                        <input class="form-check-input" id="flexSwitchCheckChecked" type="checkbox" wire:model="active_only" />
                        
                      </div>
                </div>

            </div>
            <div class="table-responsive scrollbar">
                @if ($animals->hasPages())
             
                {{ $animals->links() }}
            
            @endif
            @if (count($animals) > 0)
                <table class="table table-striped table-hover" id="animalTable">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 60px">
                             
                            </th>
                            <th scope="col" wire:click="order('number')" style="width: 75px">#
                                @if ($sort == 'number')
                                            @if ($direction == 'asc')
                                                <span
                                                    class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                            @else
                                                <span
                                                    class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                            @endif

                                        @else
                                            <span class="fas fa-sort float-right text-gray-600"></span>
                                        @endif
                            </th>
                            <th scope="col" wire:click="order('owner_id')">Dueño
                                @if ($sort == 'owner_id')
                                @if ($direction == 'asc')
                                    <span
                                        class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                @else
                                    <span
                                        class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                @endif

                            @else
                                <span class="fas fa-sort float-right text-gray-600"></span>
                            @endif
                            </th>
                            <th scope="col" wire:click="order('gender')">Sexo
                                @if ($sort == 'gender')
                                @if ($direction == 'asc')
                                    <span
                                        class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                @else
                                    <span
                                        class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                @endif

                            @else
                                <span class="fas fa-sort float-right text-gray-600"></span>
                            @endif
                            </th>
                            <th scope="col" wire:click="order('type_id')">Tipo
                                @if ($sort == 'type_id')
                                @if ($direction == 'asc')
                                    <span
                                        class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                @else
                                    <span
                                        class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                @endif

                            @else
                                <span class="fas fa-sort float-right text-gray-600"></span>
                            @endif
                            </th>
                            <th scope="col" wire:click="order('color_id')">Color
                                @if ($sort == 'color_id')
                                @if ($direction == 'asc')
                                    <span
                                        class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                @else
                                    <span
                                        class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                @endif

                            @else
                                <span class="fas fa-sort float-right text-gray-600"></span>
                            @endif
                            </th>
                            <th scope="col" wire:click="order('status_id')">Status
                                @if ($sort == 'status_id')
                                @if ($direction == 'asc')
                                    <span
                                        class="fas fa-sort-alpha-up-alt float-right text-blue-600 mt-1"></span>
                                @else
                                    <span
                                        class="fas fa-sort-alpha-down-alt float-right text-blue-600 mt-1"></span>
                                @endif

                            @else
                                <span class="fas fa-sort float-right text-gray-600"></span>
                            @endif
                            </th>
                            <th class="text-end" scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($animals as $animal)
                        <tr>
                            <td>
                                <div class="avatar avatar-2xl">
                                    <a href="{{route('animals.show', $animal)}}">
                                        @if ($animal->images->count() > 0)
                                            <img src="{{asset('storage/animals/'.$animal->images->first()->url)}}" alt="" class="rounded-circle "/>
                                        @else
                                            <img src="{{asset('img/icons/cow.png')}}" alt="" />
                                        @endif
                                    </a>    
                                  </div>
                            </td>
                            <td > <a href="{{route('animals.show', $animal)}}">
                                {{$animal->number}}
                                </a>
                            </td>
                            <td> {{$animal->owner->name}} </td>  
                            <td>{{$animal->gender ==1?"Macho":"Hembra"}} </td>     
                            <td> {{$animal->type->name}} </td>       
                            <td> {{$animal->color->name}} </td>
                            <td> 
                                <span class="badge rounded-pill {{$animal->status->badge_color->color}}">{{$animal->status->name}}</span>
                             </td>       
                                                 
                            <td class="text-end">
                                <div>
                                    <a class="btn p-0" href="{{route('animals.edit',$animal)}}" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit"><span
                                            class="text-500 fas fa-edit"></span></a>
                                            <form action="" class="d-inline" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn p-0 ms-2 remove" type="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete" onClick="removeAnimal({{$animal->id}})"><span
                                            class="text-500 fas fa-trash-alt "></span></button>
                                            </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                            
                    
                    </tbody>
                </table>
                @else
                            No hay registros
                            @endif
               
            </div>

        </div>
    </div>
    <script src="{{asset('js/main.js')}}"></script>
</div>