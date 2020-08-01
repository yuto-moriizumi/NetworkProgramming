@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wc Team
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wcTeam, ['route' => ['wcTeams.update', $wcTeam->id], 'method' => 'patch']) !!}

                        @include('wc_teams.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection