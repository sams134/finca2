<x-app-layout>
    <form action="{{ route('owners.update',$owner) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3>Editar Dueño</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="ownerLbl">Nombre del dueño</label>
                    <input class="form-control" id="ownerLbl" type="text" value="{{$owner->name}}"name="owner"/>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Editar dueño</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('owners.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>