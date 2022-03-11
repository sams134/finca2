<x-app-layout>
    <form action="{{ route('colors.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue Color</h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label" for="colorLbl">Color</label>
                    <input class="form-control" id="colorLbl" type="text" placeholder="color" name="color"/>
                </div>
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('colors.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>
