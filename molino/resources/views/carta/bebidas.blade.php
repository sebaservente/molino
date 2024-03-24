<?php
/**
 * @var \App\Models\Producto[] $productos
 */
?>
@extends('template.main')

@section('title', 'Cafeteria')

@section('main')

    <h1 class="text-center my-3 bg-warning">Bebidas</h1>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="div__productos">
        @foreach($productos as $bebidas)
            @if($bebidas->categoria == 'bebidas')
                {{--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Launch demo modal
                </button>--}}
                <a href="#" data-toggle="modal" data-target="#exampleModalCenter">
                    <div class="productos my-3 shadow">
                        <div class="img__productos">
                            @if($bebidas->imagen != null && public_path('img/reserva') . '/' . $bebidas->imagen)
                                <picture class="">
                                    <source media="(min-width: 751px)"
                                            srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                    <source media="(min-width: 380px)"
                                            srcset="{{ asset('img/reserva/' . $bebidas->imagen) }}">
                                    <img src="{{ asset('img/reserva/' . $bebidas->imagen) }}" class="w-100"
                                         alt="{{ $bebidas->imagen_descripcion }}">
                                </picture>
                            @else
                                <picture class="">
                                    <source media="(min-width: 751px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                    <source media="(min-width: 380px)" srcset="{{ asset('img/cafeCleche.png') }}">
                                    <img src="{{ asset('img/cafeCleche.png') }}" class="w-100"
                                         alt="Imagen logo de la marca">
                                </picture>
                            @endif
                        </div>

                        <div class="datos__productos">
                            <p class="datos__parrafo">{{ $bebidas->titulo }}</p>
                            <p class="datos__parrafo">$ <span> {{ $bebidas->precio }}</span></p>
                        </div>
                    </div>
                </a>


            @endif
        @endforeach
    </div>

@endsection
