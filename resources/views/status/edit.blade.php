<x-app-layout>
    <form action="{{ route('status.update',$status) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3>Editar status de animal</h3>
            </div>
            <div class="card-body">
                
                <div class="mb-3">
                    <label class="form-label" for="statusLbl">Nombre del status</label>
                    <input class="form-control" id="statusLbl" type="text" value="{{$status->name}}"name="status" placeholder="Status..."/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="colorLbl">Color Etiqueta</label>
                    <select name="badge_color" id="colorLbl" class="form-control">
                        @foreach ($badge_colors as $color)
                            <option value="{{$color->id}}" 
                                @if ($color->id == $status->badge_color_id)
                                    selected
                                @endif
                                >{{$color->name}}</option>
                        @endforeach
                       
                    </select>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Editar status</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('status.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>