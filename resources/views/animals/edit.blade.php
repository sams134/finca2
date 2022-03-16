<x-app-layout>
    <form action="{{ route('animals.update')}}" method="POST" x-data="{male:{{$animal->gender}}}">
        @csrf
        @method('PUT')
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
                <div class="mb-1">
                    <div class="form-check">
                        <input class="form-check-input" id="gender1" type="radio" name="gender" checked="" value="1" x-model="male"/>
                        <label class="form-check-label" for="gender1">Macho</label>
                      </div>
                     
                      <div class="form-check">
                        <input class="form-check-input" id="gender2" type="radio" name="gender" value="2"  x-model="male"/>
                        <label class="form-check-label" for="gender2">Hembra</label>
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
                            @if ($animal->comments->first())
                            <textarea name="comment" id="" cols="30" rows="4" class="form-control">{{$animal->comments->first()->comment}}</textarea>
                            @else
                            <textarea name="comment" id="" cols="30" rows="4" class="form-control"></textarea>
                            @endif
                        </div>
                    </div>
                    

                </div>
               
            </div> {{-- card body --}}
            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>
