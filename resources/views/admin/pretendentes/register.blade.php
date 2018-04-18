@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Registrar Pretendente</h1>
@stop

@section('content')
    <div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            <div class="box-body">
                <div class="col-md-5">
                    <form method="POST" action="{{ route('admin.applicant.registered') }}">
                        
                        @include('admin.includes.alerts')
                        
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input name="name" class="form-control" type="text" id="name" placeholder="Insira o nome">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input name="email" class="form-control" id="email" placeholder="Insira o email" type="email">
                        </div>
                        <div class="form-group">
                            <label for="email">Imagem URL</label>
                            <input name="image" class="form-control" id="imagem" placeholder="Insira o email" type="text">
                        </div>
                        <button class='btn btn-primary' type='submit'>Registrar</button>
                    </form>
                </div>
               
             </div>
        </div>
    </div>
@stop