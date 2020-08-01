@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wc Group
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($wcGroup, ['route' => ['wcGroups.update', $wcGroup->id], 'method' => 'patch']) !!}

                        @include('wc_groups.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection