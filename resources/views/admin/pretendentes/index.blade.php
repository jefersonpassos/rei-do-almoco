@extends('adminlte::page')

@section('title', 'Admin')

@section('content_header')
    <h1>Pretendentes</h1>
@stop

@section('content')
    @include('admin.includes.alerts')
    <div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body row">
            @foreach($applicants as $applicant)
            <div class="col-md-3">
                <div class="box box-primary ">
                    <div class="box-body box-profile">
                        @if($applicant->photo_url == null)
                        <img class="profile-user-img img-responsive img-circle" src="/images/profile_default.jpg" alt="User profile picture">
                        @else
                        <img class="profile-user-img img-responsive img-circle" src="{{ $applicant->photo_url }}" alt="User profile picture">
                        @endif
                        <h3 class="profile-username text-center">{{ $applicant->name }}</h3>
        
                        <p class="text-muted text-center">{{ $applicant->email }}</p>
        
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Votos</b> <a class="pull-right">{{ $applicant->votes()->count() }}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Vitórias</b> <a class="pull-right">{{ $applicant->victories()->count() }}</a>
                            </li>
                        </ul>
                      
            
                        <a href="{{ route('admin.applicant.delete', ['id' => $applicant->id]) }}" class="btn btn-danger btn-block"><b>Deletar</b></a>
                    </div>
                </div>
                
            </div>
            @endforeach
        </div>
    </div>
@stop