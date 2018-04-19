<!DOCTYPE html>
@extends('adminlte::master')

@section('adminlte_css')
    <link rel="stylesheet"
          href="{{ asset('vendor/adminlte/dist/css/skins/skin-' . config('adminlte.skin', 'blue') . '.min.css')}} ">
    @stack('css')
    @yield('css')
@stop

@section('body')
    
    <div class="text-center">
        <h2><b>REI</b> do Almoço</h2>
        <p>Vote!</p>
        @include('admin.includes.alerts')
    </div>
    <div class="content">
        
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
                            <b>Votos</b> <a class="pull-right">{{ $applicant->votes()->get()[0]['total_votes'] }}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Vitórias</b> <a class="pull-right">{{ $applicant->victories()->count() }}</a>
                        </li>
                    </ul>
                              
                    
                    <a href="{{ route('voting.vote', ['id' => $applicant->id]) }}" class="btn btn-success btn-block"><b>Votar</b></a>
                </div>
            </div>
                        
        </div>
        @endforeach
    </div>
@stop
    
    
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
