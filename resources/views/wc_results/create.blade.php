@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Wc Result
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'wcResults.store']) !!}

                        @include('wc_results.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
