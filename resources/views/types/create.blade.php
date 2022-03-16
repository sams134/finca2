<x-app-layout>
    <form action="{{ route('types.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Agregue un nuevo tipo de animal. </h3>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" id="gender1" type="radio" name="gender" checked="" value="1"/>
                        <label class="form-check-label" for="gender1">Macho</label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" id="gender2" type="radio" name="gender" value="2"/>
                        <label class="form-check-label" for="gender2">Hembra</label>
                      </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="typeLbl">Nombre del tipo de animal</label>
                    <input class="form-control" id="typeLbl" type="text" placeholder="Tipo animal" name="type"/>
                </div>
                
               
            </div>

            <div class="card-footer">
                <button class="btn btn-outline-primary me-1 mb-1 float-end" type="submit">Agregar nuevo tipo</button>
                <a class="btn btn-outline-danger me-1 mb-1 float-end" href="{{ route('types.index') }}">Cancelar</a>
            </div>
        </div>
    </form>
</x-app-layout>