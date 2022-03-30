<x-app-layout>
    <form action="{{ route('animals.update',$animal)}}" method="POST" x-data="{male:{{$animal->gender}},criollo:{{$animal->is_criollo}}}"  enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="photoDeleted" value="false" id="photoDeleted">
        <div class="card">
            <div class="card-header">
                <h3>Edite datos del animal {{$animal->number}}</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-1" >
                        <label class="form-label" for="ownerLbl">Dueño </label>
                        <select name="owner_id" id="" class="form-control">
                            @foreach ($owners as $owner)
                                <option value="{{$owner->id}}"
                                    @if ($owner->id == $animal->owner_id)
                                        selected
                                    @endif
                                    >{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="numberLbl">Numero</label>
                    <input class="form-control" id="numberLbl" type="text" placeholder="numero" value="{{$animal->number}}" name="number"/>
                </div>
                <div class="mb-1 row">
                    <div class="col-12 col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" id="gender1" type="radio" name="gender" checked="" value="1" x-model="male"/>
                            <label class="form-check-label" for="gender1">Macho</label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" id="gender2" type="radio" name="gender" value="2"  x-model="male"/>
                            <label class="form-check-label" for="gender2">Hembra</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" id="gender1" type="radio" name="is_criollo"  value="1" x-model="criollo"/>
                            <label class="form-check-label" for="gender1">Criollo</label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" id="gender2" type="radio" name="is_criollo" checked value="2"  x-model="criollo"/>
                            <label class="form-check-label" for="gender2">Comprado</label>
                        </div>
                    </div>
                </div>
                <div class="row" x-show="criollo==1">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Hijo de:</label>
                        <select name="animal_id" id="" class="form-control">
                            <option></option>
                            @foreach ($animals as $animalEach)
                                <option value="{{$animalEach->id}}"
                                    @if ($animal->id == $animalEach->id)
                                        selected
                                    @endif
                                    >
                                    {{$animalEach->type->name}} {{$animalEach->color->name}} #{{$animalEach->number}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Fecha Nacimiento:</label>
                        <input class="form-control datetimepicker" id="datepickerNacimiento" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="born_date" value="{{$animal->born_date}}"/>
                    </div>
                </div>
                <div class="row" x-show="criollo==2">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Comprado a:</label>
                        <input class="form-control" id="numberLbl" type="text" placeholder="Nombre del vendedor" name="bought_from" value="{{$animal->bought_from}}"/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="compraLbl">Fecha Compra:</label>
                        <input class="form-control datetimepicker" id="datepickerCompra" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="bought_date" value="{{$animal->bought_date}}"/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Precio Compra:</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Q.</span>
                            <input class="form-control" type="text" placeholder="Precio Compra" name="cost" value="{{$animal->cost}}"/>
                        </div>                        
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Peso Compra:</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Lbs.</span>
                            <input class="form-control" type="text" placeholder="Peso Inicial" name="bought_weight" value="{{$animal->bought_weight}}"/>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-1" x-show="male==1">
                            <label class="form-label" for="numberLbl">Tipo</label>
                            <select name="male_id" id="" class="form-control">
                                @foreach ($males as $male)
                                    <option value="{{$male->id}}"
                                        @if (($animal->gender == 1)&&($male->id == $animal->type_id))
                                            selected
                                        @endif
                                        >{{$male->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1" x-show="male==2">
                            <label class="form-label" for="numberLbl">Tipo</label>
                            <select name="female_id" id="" class="form-control">
                                @foreach ($females as $female)
                                    <option value="{{$female->id}}"
                                        @if (($animal->gender == 2)&&($female->id == $animal->type_id))
                                            selected
                                        @endif
                                        >{{$female->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="colorLbl">Color</label>
                            <select name="color_id" id="" class="form-control">
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}"
                                        @if ($color->id == $animal->color_id)
                                        selected
                                    @endif
                                        >{{$color->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="earingLbl">Color Arete</label>
                            <select name="earing_color_id" id="" class="form-control">
                                @foreach ($earingColors as $earingColor)
                                    <option value="{{$earingColor->id}}"
                                        @if ($earingColor->id == $animal->earing_color_id)
                                        selected
                                    @endif
                                        >{{$earingColor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="statusLbl">Status</label>
                            <select name="status_id" id="" class="form-control">
                                @foreach ($statuses as $status)
                                    <option value="{{$status->id}}"
                                        @if ($status->id == $animal->status_id)
                                            selected
                                        @endif
                                        >{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="commentLbl">Comentario Inicial</label>
                           
                            <textarea name="description" id="" cols="30" rows="4" class="form-control">{{$animal->description}}</textarea>
                           
                        </div>
                    </div>
                    <div class="col-12 col-md-6 mt-5 d-flex align-items-start flex-column ">
                        <div class="avatar avatar-5xl mb-auto">
                            @if ($animal->images->first())
                            <img src="{{asset('storage/animals/'.$animal->images->first()->url)}}" alt="" id="preview-image-before-upload" class="rounded-circle img-thumbnail"/>
                            @else
                            <img src="{{asset('img/icons/cow.png')}}" alt="" id="preview-image-before-upload" class="rounded-circle img-thumbnail"/>
                            @endif
                            
                          </div>
                          <div class="d-flex">
                            @if ($animal->images->first())
                          <button class="btn btn-outline-danger m-3" id="btn_photo_delete" type="button">                            
                            <i class="fas fa-camera  border-secondary "></i> 
                            <span id="lbl_btn_photo_create">Eliminar Foto</span> 
                        </button>
                        @endif
                        <button class="btn btn-outline-secondary m-3" id="btn_photo_create" type="button">                            
                            <i class="fas fa-camera  border-secondary "></i> 
                            <span id="lbl_btn_photo_create">Tomar Fotografia</span> 
                        </button>
                    </div>
                    <input type="file" id="photoDialog_create" name="photo" class="d-none">
                    </div>
                </div>
                
               
            </div> {{-- card body --}}
            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Editar Animal</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
    <script>
        // "global" vars, built using blade
        var asset = '{{ URL::asset('') }}';
    </script>
    <script src="{{asset('js/main.js')}}"></script>
</x-app-layout>
