<x-app-layout>
    <form action="{{ route('animals.store')}}" method="POST" x-data="{male:1}" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue un animal</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="mb-1" >
                        <label class="form-label" for="ownerLbl">Dueño</label>
                        <select name="owner_id" id="" class="form-control">
                            @foreach ($owners as $owner)
                                <option value="{{$owner->id}}">{{$owner->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="numberLbl">Numero</label>
                    <input class="form-control" id="numberLbl" type="text" placeholder="numero" name="number"/>
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
                                    <option value="{{$male->id}}">{{$male->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-1" x-show="male==2">
                            <label class="form-label" for="numberLbl">Tipo</label>
                            <select name="female_id" id="" class="form-control">
                                @foreach ($females as $female)
                                    <option value="{{$female->id}}">{{$female->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="colorLbl">Color</label>
                            <select name="color_id" id="" class="form-control">
                                @foreach ($colors as $color)
                                    <option value="{{$color->id}}">{{$color->name}}</option>
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
                                    <option value="{{$earingColor->id}}">{{$earingColor->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="mb-1" >
                            <label class="form-label" for="statusLbl">Status</label>
                            <select name="status_id" id="" class="form-control">
                                @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                   
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="commentLbl">Descripcion</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="col-12 col-md-6 mt-5 d-flex align-items-start flex-column ">
                            <div class="avatar avatar-5xl mb-auto">
                                <img src="{{asset('img/icons/cow.png')}}" alt="" id="preview-image-before-upload" class="rounded-circle img-thumbnail"/>
                              </div>
                            <button class="btn btn-outline-secondary m-3" id="btn_photo_create" type="button">                            
                                <i class="fas fa-camera  border-secondary "></i> 
                                <span id="lbl_btn_photo_create">Tomar Fotografia</span> 
                            </button>
                        <input type="file" id="photoDialog_create" name="photo" class="d-none">
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
