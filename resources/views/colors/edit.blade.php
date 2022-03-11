<x-app-layout>
    <form action="{{ route('colors.update',$color) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3>Editar Color</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="colorLbl">Color</label>
                    <input class="form-control" id="colorLbl" type="text" value="{{$color->name}}"name="color"/>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Editar Color</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>