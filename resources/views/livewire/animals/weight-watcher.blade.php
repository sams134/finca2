<div class="row">
    <div class="col-12 col-xl-8">
        <canvas id="myChart" width="400" height="300"></canvas>
    </div>
    <div class="col-12 col-xl-4" x-data="{today:true}">
        <form class="list-group-item form-group" wire:submit.prevent="save">
            <label for="message">Ingrese peso</label>
            <div class="input-group mb-3"><span
                    class="input-group-text fas fa-balance-scale-left fs-2 p-2"
                    id="basic-addon1"></span>
                <input class="form-control" type="number" placeholder="Peso en lbs"
                    aria-label="Peso" aria-describedby="basic-addon1" wire:model.defer="weight"/>
                <button class="btn btn-primary">Guardar</button>
            </div>
            <div class="form-check">
                <input class="form-check-input" id="flexCheckChecked" type="checkbox"
                    value="" checked="" wire:model.defer="today" x-model="today"/>
                <label class="form-check-label" for="flexCheckChecked">Peso al día de
                    hoy</label>
            </div>
            <div class="input-group mb-3" x-show="!today">
                
                <input class="form-control datetimepicker" id="datepicker" type="text" placeholder="Fecha de peso" data-options='{"disableMobile":true}' wire:model.defer="date"/>

            </div>
        </form>
        <button class="btn btn-primary" wire:click="redibujar">Redibujar</button>
        <table class="table fs--1 mt-3">
            <tbody>
                @foreach ($animal->weights as $weight)
                    <tr>
                        <td class="bg-100" style="width: 30%;">
                            {{ Carbon\Carbon::parse($weight->date)->format('d/m/Y') }}
                        </td>
                        <td>{{ $weight->weight }} lbs.</td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
</div>