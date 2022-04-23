<x-app-layout>
    <form action="{{ route('animals.store')}}" method="POST" x-data="{male:{{old('gender',1)}},criollo:{{old('is_criollo',2)}}}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue un animal</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-1" >
                        <label class="form-label" for="ownerLbl">Dueño</label>
                        <select name="owner_id" id="" class="form-control" value="{{old('owner_id')}}">
                            @foreach ($owners as $owner)
                                <option  value="{{$owner->id}}"
                                    @if ($owner->id == 1)
                                        selected
                                    @endif
                                    @if (old('owner_id') == $owner->id)
                                    selected
                                    @endif
                                    >{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="numberLbl">Numero</label>
                    <input class="form-control" id="numberLbl" type="text" placeholder="numero" name="number" required/>
                </div>
                <div class="mb-1 row">
                    <div class="col-12 col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" id="gender1" type="radio" name="gender"  value="1" x-model="male"/>
                            <label class="form-check-label" for="gender1">Macho</label>
                        </div>
                        
                        <div class="form-check">
                            <input class="form-check-input" id="gender2" type="radio" name="gender" value="2"   x-model="male"/>
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
                            @foreach ($animals as $animal)
                                <option value="{{$animal->id}}"
                                    @if (old('animal_id') == $animal->id)
                                        selected
                                    @endif
                                    >
                                    {{$animal->type->name}} {{$animal->color->name}} #{{$animal->number}} ({{$animal->owner->name}})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Fecha Nacimiento:</label>
                        <input class="form-control datetimepicker" id="datepickerNacimiento" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="born_date" value="{{old('born_date')}}"/>
                    </div>
                </div>
                <div class="row" x-show="criollo==2">
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Comprado a:</label>
                        <input class="form-control" id="numberLbl" type="text" placeholder="Nombre del vendedor" name="bought_from" value="{{old('bought_from')}}"/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="compraLbl">Fecha Compra:</label>
                        <input class="form-control datetimepicker" id="datepickerCompra" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' name="bought_date" value="{{old('bought_date')}}"/>
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Precio Compra:</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Q.</span>
                            <input class="form-control" type="text" placeholder="Precio Compra" name="cost" />
                        </div>                        
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="numberLbl">Peso Compra:</label>
                        <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Lbs.</span>
                            <input class="form-control" type="text" placeholder="Peso Inicial" name="bought_weight" />
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
                                        @if (old('male_id') == $male->id)
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
                                        
                                            @if (old('female_id') == $female->id)
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
                                        
                                            @if (old('color_id') == $color->id)
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
                                        
                                            @if (old('earing_color_id') == $earingColor->id)
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
                                        
                                            @if (old('status_id') == $status->id)
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
                            <label class="form-label" for="commentLbl">Descripcion</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{old('description')}}</textarea>
                        </div>
                        <div class="col-12 col-md-6 mt-5 d-flex align-items-start flex-column ">
                            <div class="avatar avatar-5xl mb-auto">
                                <img src="{{asset('img/icons/cow.png')}}" alt="" id="preview-image-before-upload" class="rounded-circle img-thumbnail"/>
                              </div>
                            <button class="btn btn-outline-secondary m-3" id="btn_photo_create" type="button">                            
                                <i class="fas fa-camera  border-secondary "></i> 
                                <span id="lbl_btn_photo_create">Tomar Fotografia</span> 
                            </button>
                        <input type="file" id="photoDialog_create" name="photo" class="d-none" value="{{old('photo')}}">
                        </div>
               
                </div>
               
            </div> {{-- card body --}}
            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
            </div>
        </div>
    </form>

<script src="{{asset('js/main.js')}}"></script>
</x-app-layout>
