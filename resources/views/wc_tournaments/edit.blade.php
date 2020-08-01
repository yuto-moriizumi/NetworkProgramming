@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wc Tournament
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wcTournament, ['route' => ['wcTournaments.update', $wcTournament->id], 'method' => 'patch']) !!}

                        @include('wc_tournaments.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection