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
        @if((int)date('H') >= 10 &&  (int)date('H') <= 11 )
        <div class="col-md-8">
            @foreach($applicants as $applicant)
            <div class="col-md-4">
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
        @else
        <div class="col-md-8">
            @foreach($winnersToday as $winnerToday)
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="box box-widget widget-user-2">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-yellow">
                          <div class="widget-user-image">
                            @if($winnerToday->photo_url == null)
                            <img class="img-circle" src="/images/profile_default.jpg" alt="User Avatar">
                            @else
                            <img class="img-circle" src="{{ $winnerToday->photo_url }}" alt="User Avatar">
                            @endif
                          </div>
                          <!-- /.widget-user-image -->
                          <h3 class="widget-user-username">Rei do dia!</h3>
                          <h5 class="widget-user-desc">{{ $winnerToday->name }}</h5>
                        </div>
                        <div class="box-footer no-padding">
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
            @endforeach
        </div>
        @endif
        <div class="col-md-4">
            <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title">Ultímos Reis</h3>

                  <div class="box-tools pull-right">
                    <!--<span class="label label-danger">Vencedores</span>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                    @foreach($applicants as $applicant)
                        @foreach( $applicant->victories()->get() as $winner)
                        <li>
                          @if($applicant->photo_url == null)
                          <img src="/images/profile_default.jpg" alt="User Image">
                          @else
                          <img src="{{ $applicant->photo_url }}" alt="User Image">
                          @endif
                          <a class="users-list-name" href="#">{{ $applicant->name }}</a>
                          <span class="users-list-date">{{ $winner->created_at->format('d/m/Y') }}</span>
                        </li>
                        @endforeach
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer text-center">
                  
                </div>
                <!-- /.box-footer -->
              </div>
        </div>
    </div>
@stop
    
    
@section('adminlte_js')
    <script src="{{ asset('vendor/adminlte/dist/js/adminlte.min.js') }}"></script>
    @stack('js')
    @yield('js')
@stop
