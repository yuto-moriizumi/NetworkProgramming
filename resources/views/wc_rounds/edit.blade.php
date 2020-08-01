@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wc Round
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wcRound, ['route' => ['wcRounds.update', $wcRound->id], 'method' => 'patch']) !!}

                        @include('wc_rounds.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection