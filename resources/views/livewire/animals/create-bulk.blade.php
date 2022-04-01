<form action="" wire:submit.prevent="save">
    <x-page-title>
        <x-slot:title>Nuevo lote de Animales</x-slot:title>
     Ingrese varios animales a la vez. Todos deben de compartir, dueño, color de arete, sexo y estatus.
    </x-page-title>

<div class="card" x-data="{male:{{old('gender',1)}}}">
    
    <div class="card-body">
        <div class="row">
            <div class="mb-1" >
                <label class="form-label" for="ownerLbl">Dueño</label>
                <select name="owner_id" id="" class="form-control" wire:model.defer="owner_id">
                    @foreach ($owners as $owner)
                        <option  value="{{$owner->id}}">{{$owner->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
       
        <div class="mb-1 row">
            <div class="col-12 col-md-6">
                <div class="form-check">
                    <input class="form-check-input" id="gender1" type="radio" name="gender"  value="1" x-model="male" wire:model.defer="gender"/>
                    <label class="form-check-label" for="gender1">Macho</label>
                </div>
                
                <div class="form-check">
                    <input class="form-check-input" id="gender2" type="radio" name="gender" value="2"   x-model="male" wire:model.defer="gender"/>
                    <label class="form-check-label" for="gender2">Hembra</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="mb-1" >
                    <label class="form-label" for="earingLbl">Color Arete</label>
                    <select name="earing_color_id" id="" class="form-control" wire:model.defer="earing_color_id">
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
                    <select name="status_id" id="" class="form-control" wire:model.defer="status_id">
                        @foreach ($statuses as $status)
                            <option value="{{$status->id}}">{{$status->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="row" >
            <div class="col-12 col-md-6">
                <label class="form-label" for="numberLbl">Comprado a:</label>
                <input class="form-control 
                @error('bought_from')
                border border-3 border-warning
                @enderror
                " id="numberLbl" type="text" placeholder="Nombre del vendedor" name="bought_from" wire:model.defer="bought_from"/>
                @error('bought_from')
                <span class="text-danger">Nombre de vendedor requerido</span>
                 @enderror
                 
            </div>
            <div class="col-12 col-md-6">
                <label class="form-label" for="compraLbl">Fecha Compra:</label>
                <input class="form-control datetimepicker
                @error('bought_date')
                 border border-3 border-warning
                 @enderror
                 " id="datepickerCompra" type="text" placeholder="d/m/y" data-options='{"disableMobile":true}' wire:model.defer="bought_date" required/>
                 @error('bought_date')
                 <span class="text-danger">Fecha de Compra requerida</span>
                  @enderror
                 
            </div>
           
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <label class="form-label" for="numberLbl">Cantidad de Animales a ingresar:</label>
                <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Cant.</span>
                    <input class="form-control" type="number" placeholder="Cantidad de animales en lote" name="cant" wire:model="cant"/>
                </div>                        
            </div>
        </div>
        <div class="row table-responsive scrollbar">
            <table class="table table-striped">
                <thead>
                    <tr class="btn-reveal-trigger">
                      <th scope="col" style="width:120px">Número</th>
                      <th scope="col">Tipo</th>
                      <th scope="col">Color</th>
                      <th scope="col">Precio Compra</th>
                      <th scope="col">Peso Compra</th>
                      <th class="col" style="width:30%">Descripción</th>
                    </tr>
                  </thead>
                  <tbody class="">
                      @for ($i = 0; $i < $cant; $i++)
                        <tr>
                            <td> <input class="form-control" type="text fs-5" placeholder="Num" name="number[]" required wire:model.defer="number.{{$i}}"/></td>
                            <td>
                                @if ($gender==1)
                                <select name="male_id" id="" class="form-control" wire:model.defer="type_id.{{$i}}" required>
                                    <option value="" selected="selected">Seleccionar tipo</option>
                                    @foreach ($males as $male)
                                        <option value="{{$male->id}}">{{$male->name}}</option>
                                    @endforeach
                                </select>
                                @else
                                <select name="female_id" id="" class="form-control" wire:model.defer="type_id.{{$i}}" required>
                                    <option value="" selected="selected">Seleccionar tipo</option>
                                    @foreach ($females as $female)
                                        <option value="{{$female->id}}">{{$female->name}}</option>
                                    @endforeach
                                </select>
                                @endif
                            
                            </td>
                            <td>
                            <select name="color_id" id="" class="form-control" wire:model.defer="color_id.{{$i}}">
                                <option value="-1" selected="selected">Seleccionar color</option>
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
                                @endforeach
                            </select>
                            </td>
                            <td>
                            <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Q.</span>
                                <input class="form-control" type="number" placeholder="Precio Compra" name="cost" wire:model.defer="cost.{{$i}}"/>
                            </div>  
                            </td>
                            <td>
                            <div class="input-group mb-3"><span class="input-group-text" id="basic-addon1">Lbs.</span>
                                <input class="form-control" type="number" placeholder="Peso Inicial" name="bought_weight" wire:model.defer="bought_weight.{{$i}}"/>
                            </div>
                            </td>
                            <td> <input class="form-control" type="text" placeholder="Descripcion del animal" name="desc[]" wire:model.defer="description.{{$i}}"/></td>
                        </tr>
                      @endfor
                  </tbody>
            </table>
        </div>
      
        
       
       
       
    </div> {{-- card body --}}
    <div class="card-footer"> 
        <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar</button>
        <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
    </div>
  <div class="d-block">
      {{$message}}
  </div>
</div>
</form>