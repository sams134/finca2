
<div class="col-auto px-0">
    <button class="btn btn-sm btn-outline-danger border-300" wire:click="$set('open',true)" data-bs-toggle="tooltip" data-bs-placement="top" title="Tomar fotografia" >
        <span class="fas fa-camera me-1"></span>{{$animal->images->count()}}
    </button>

<x-jet-dialog-modal wire:model="open">
    <x-slot name="title">
        Tomar Foto para {{$animal->type->name}} #{{$animal->number}}
    </x-slot>
    <x-slot name="content">
        <div wire:loading wire:target="image" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Imagen Cargando...</strong>
            <span class="block sm:inline">Espere un momento mientras se carga</span>
            
          </div>
          @if ($image)
          <img src="{{$image->temporaryUrl()}}" alt="" class="mb-4" style="width:100%">
          <span> {{$image}}</span>
      @endif
        <div class="d-flex justify-content-center">
            <button id="cameraBtnModal" class="p-4">
                <i class="fas fa-camera fs-6"></i>
            </button>
        </div>
        <input type="file" id="cameraModal" class="d-none" wire:model.defer="image">
    </x-slot>
    <x-slot name="footer">
        <button class="btn btn-danger me-1 mb-1" type="button" wire:click="$set('open',false)">Cancelar
        </button>
        <button class="btn btn-primary me-1 mb-1" type="button" wire:click="save">Guardar
        </button>
    </x-slot>
  </x-jet-dialog-modal>
  <script src="{{asset('js/main.js')}}"></script>
</div>