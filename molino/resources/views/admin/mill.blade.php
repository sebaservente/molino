<?php
/**
 * @var
 */
?>
@extends('template.admin')

@section('title', 'Iniciar Sesión')

{{--@push('js')
    <script>
        let password = document.querySelector('#password');
        let email = document.querySelector('#email');
        let ver = document.querySelector('#ver');
        let span = document.querySelector('.span');
        let spanPassword = document.querySelector('.spanPassword');

        span.style.color = 'red';
        spanPassword.style.display = 'none';

        /*let sentidos = 0;
        email.addEventListener('change', () => {
            if(!sentidos){
                span.style.display = 'flex';
                span.style.color = 'green';
                sentidos = 1;
            } else {
                span.style.color = 'red';
                sentidos = 0;
            }
        })*/

        let sentidoPassword = 0;
        password.addEventListener('change', () => {
            if(!sentidoPassword){
                spanPassword.style.display = 'flex';
                spanPassword.style.color = 'green';
                sentidoPassword = 1;
            } else {
                spanPassword.style.color = 'red';
                sentidoPassword = 0;
            }
        })

        let sentido = 0;
        ver.addEventListener("click", ()=>{
            console.log('hola mundo')
            /*if(!sentido){
                password.type = 'text';
                password.style.color = 'gray';
                ver.style.color = 'orange';
                sentido = 1;
            }
            else {
                password.type = 'password';
                password.style.color = 'black';
                ver.style.color = 'black';
                sentido = 0;
            }*/
        })
    </script>
@endpush--}}

@section('admin')
    <h1 class="pt-4 text-center textBold8 text-uppercase fontSize1_3">Administración Mill</h1>
    <div class="py-5">
        <h2 class="text-center textBold8 text-uppercase">Login de Ingreso</h2>
        <div class="div__formCrearProducto">
            <form action="{{ route('login.In') }}" method="post" class="p-3 rounded rounded-lg shadow">
                @csrf
                <div class="py-2">
                    <label for="email" class="form-label">Email</label>
                    <input
                        type="email"
                        name="email"
                        id="email"
                        class="form-control"
                        value="{{ old('email')}}"
                        @error('email') aria-describedby="error-email" @enderror>

                </div>
                @error('email')
                <div class="text-dark textBold8" id="error-email"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-2">
                    <label for="password" class="form-label fw-bold d-flex">Password</label>
                    <input type="password" name="password" id="password" class="form-control"
                           @error('password') aria-describedby="error-password" @enderror >
                </div>
                    {{--<span class="spanPassword"><i class="bi bi-check2-circle px-2"></i></span>--}}
                  {{--  <span class="span"> <i class="bi bi-eye px-2 py-2 " role="button" id="ver"></i></span>--}}
                @error('password')
                <div class="text-dark textBold8" id="error-password"><span class=""><i class="bi bi-x-circle px-1"></i></span>{{ $message }}</div>
                @enderror
                <div class="py-3">
                    <button class="btn btn-dark w-100 shadow">Ingresar</button>
                    {{--<a href="{{ route('admin.create') }}" class="btn btn-danger">Ingresar</a>--}}
                    <div class="pt-3"><a href="{{ route('recuperarPassword') }}" class="text-decoration-none text-dark fontSizePequeño">¿ Olvidaste tu Contraseña ?</a></div>
                </div>
            </form>



        </div>
    </div>


@endsection
