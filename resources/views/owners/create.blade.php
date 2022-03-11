<x-app-layout>
    <form action="{{ route('owners.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue un nuevo dueño</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="ownerLbl">Nombre del nuevo Dueño</label>
                    <input class="form-control" id="ownerLbl" type="text" placeholder="Nombre del propietario" name="owner"/>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('owners.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>