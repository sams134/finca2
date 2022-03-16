<x-app-layout>
    <form action="{{ route('status.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue un nuevo status de animal </h3>
            </div>
            <div class="card-body">
               
                <div class="mb-3">
                    <label class="form-label" for="statusLbl">Nombre del status</label>
                    <input class="form-control" id="statusLbl" type="text" placeholder="Status..." name="status"/>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="colorLbl">Color Etiqueta</label>
                    <select name="badge_color" id="colorLbl" class="form-control">
                        @foreach ($badge_colors as $color)
                            <option value="{{$color->id}}">{{$color->name}}</option>
                        @endforeach
                       
                    </select>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar nuevo status</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('status.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>