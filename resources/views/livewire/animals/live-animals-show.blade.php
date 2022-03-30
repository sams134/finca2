<div class="card mb-3">
    <div class="card-body">

        <div class="row">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="product-slider" id="galleryTop">

                    @if ($animal->images->count() > 0)
                        <div class="swiper-container theme-slider position-lg-absolute all-0"
                            data-swiper='{"autoHeight":false,"spaceBetween":5,"loop":true,"loopedSlides":5,"thumb":{"spaceBetween":5,"slidesPerView":5,"loop":true,"freeMode":true,"grabCursor":true,"loopedSlides":5,"centeredSlides":true,"slideToClickedSlide":true,"watchSlidesVisibility":true,"watchSlidesProgress":true,"parent":"#galleryTop"},"slideToClickedSlide":true}'>
                            <div class="swiper-wrapper h-100">
                                @foreach ($animal->images as $image)
                                    <div class="swiper-slide h-100"><img class="rounded-1 fit-cover h-100 w-100"
                                            src="{{ asset('storage/animals/' . $image->url) }}" alt="" /></div>
                                @endforeach
                            </div>
                            <div class="swiper-nav">
                                <div class="swiper-button-next swiper-button-white"></div>
                                <div class="swiper-button-prev swiper-button-white"></div>
                            </div>
                        </div>
                    @else
                        <div class="d-flex justify-content-center">
                            <img src="{{ asset('img/icons/cow.png') }}" alt="" class="w-25" />
                        </div>
                        <div class="bg-secondary d-flex justify-content-center mt-4">
                            <p class="text-white fw-bold p-2">No hay imagenes que mostrar</p>
                        </div>

                    @endif
                </div>
            </div>
            <div class="col-lg-4">
                <h5>{{ $animal->type->name }} #{{ $animal->number }}
                    @if ($animal->is_criollo == 1)
                        <strong class="text-success">(Criollo)</strong>
                    @endif
                </h5>
                <div class="mb-4">
                    Propiedad de: <a class="fs--1 mb-2 d-inline" href="#!">{{ $animal->owner->name }}</a>
                </div>


                <div class="table-responsive scrollbar">
                    <table class="table table-bordered overflow-hidden">
                        <colgroup>
                            <col class="bg-soft-primary" />
                            <col />

                        </colgroup>

                        <tbody>
                            <tr class="btn-reveal-trigger">
                                <td>Número</td>
                                <td>{{ $animal->number }}</td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td>Sexo</td>
                                <td>{{ $animal->gender == 1 ? 'Macho' : 'Hembra' }}</td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td>Color Animal</td>
                                <td>{{ $animal->color->name }}</td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td>Color Arete</td>
                                <td>{{ $animal->earing_color->name }}</td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td>Tipo:</td>
                                <td>{{ $animal->type->name }}</td>
                            </tr>
                            <tr class="btn-reveal-trigger">
                                <td>Estatus:</td>
                                <td>
                                    {{ $animal->status->name }}
                                    @if ($animal->status->is_active)
                                        <small>(En finca)</small>
                                    @endif
                                </td>
                            </tr>
                            @if ($animal->is_criollo == 1)
                                <tr class="btn-reveal-trigger">
                                    <td>Fecha Nacimiento:</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($animal->born_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>Hijo de:</td>
                                    <td>
                                        {{ $animal->mom->type->name}} #{{ $animal->mom->number}}
                                    </td>
                                </tr>
                            @else
                                <tr class="btn-reveal-trigger">
                                    <td>Fecha Compra:</td>
                                    <td>
                                        {{ Carbon\Carbon::parse($animal->bought_date)->format('d/m/Y') }}
                                    </td>
                                </tr>
                                <tr class="btn-reveal-trigger">
                                    <td>Comprado a:</td>
                                    <td>
                                        {{ $animal->bought_from }}
                                    </td>
                                </tr>
                            @endif


                        </tbody>
                    </table>
                </div>


                <p class="fs--1">
                    {{ $animal->description }}
                </p>
                @if ($animal->is_criollo == 2)
                    <h4 class="d-flex align-items-center">Costo:<span class="text-warning me-2 ms-2">
                            Q.{{ $animal->cost }}</span></h4>
                    <p class="fs--1 mb-1"> <span>Peso Compra: </span><strong>{{ $animal->bought_weight }}
                            Lbs.</strong></p>
                @endif
                {{-- if vendido --}}
                @if ($animal->status_id == 1)
                    <h4 class="d-flex align-items-center">Precio Venta:<span class="text-warning me-2 ms-2">
                            Q.{{ $animal->value }}</span></h4>
                @endif

                @if ($animal->status->is_active)
                    <p class="fs--1">Estado: <strong class="text-success">(Activo)</strong></p>
                @endif
                <div class="row">
                    @if ($animal->status->is_active)
                        <div class="col-auto px-2 px-md-2">
                            <button class="btn btn-sm btn-primary" wire:click="test">
                                <span class="fas fa-cart-plus me-sm-2"></span>
                                <span class="d-none d-sm-inline-block">Vender</span>
                            </button>
                        </div>
                        @livewire('camera-show',['animal' => $animal])
                    @endif
                    <input type="hidden" id="id_animal" value="{{$animal->id}}">
                </div>




            </div>
        </div>
        <div class="row mt-8">
            <div class="col-12">
                <div class="overflow-hidden mt-4">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item"><a class="nav-link active ps-0" id="comment-tab" data-bs-toggle="tab"
                                href="#tab-comment" role="tab" aria-controls="tab-comment"
                                aria-selected="true">Pesos</a></li>
                        <li class="nav-item"><a class="nav-link px-2 px-md-3" id="specifications-tab"
                                data-bs-toggle="tab" href="#tab-specifications" role="tab"
                                aria-controls="tab-specifications" aria-selected="false">Comentarios</a></li>
                        <li class="nav-item"><a class="nav-link px-2 px-md-3" id="reviews-tab"
                                data-bs-toggle="tab" href="#tab-reviews" role="tab" aria-controls="tab-reviews"
                                aria-selected="false">Fotos</a></li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-comment" role="tabpanel"
                            aria-labelledby="comment-tab">
                            <div class="mt-3">
                               @livewire('animals.weight-watcher', ['animal' => $animal])
                               

                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-specifications" role="tabpanel"
                            aria-labelledby="specifications-tab">
                            <div class="row">

                                @livewire('animals.animal-comment', ['animal' => $animal])


                            </div>

                        </div>
                        <div class="tab-pane fade" id="tab-reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="row">
                                @foreach ($animal->images as $image)
                                    <div class="col-12 col-sm-6 col-xl-4">
                                        <div class="card p-1 m-2">
                                            <div class="card-body">
                                                <img src="{{ asset('storage/animals/' . $image->url) }}" alt="" width="100%" class="">
                                                <div class="card-text mt-2">
                                                    <button class="btn btn-danger">Eliminar</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
                                @endforeach
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @push('scripts')
        <script>
            Livewire.on('swiper', function test() {
                docReady(swiperInit);
            });
           
          
        </script>
        <script src="/js/weightChart.js"></script>
    @endpush
</div>
