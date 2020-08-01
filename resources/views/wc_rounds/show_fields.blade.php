<!-- Tournament Id Field -->
<div class="form-group">
    {!! Form::label('tournament_id', 'Tournament Id:') !!}
    <p>{{ $wcRound->tournament_id }}</p>
</div>

<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $wcRound->name }}</p>
</div>

<!-- Ordering Field -->
<div class="form-group">
    {!! Form::label('ordering', 'Ordering:') !!}
    <p>{{ $wcRound->ordering }}</p>
</div>

<!-- Knockout Field -->
<div class="form-group">
    {!! Form::label('knockout', 'Knockout:') !!}
    <p>{{ $wcRound->knockout }}</p>
</div>

<!-- Start Date Field -->
<div class="form-group">
    {!! Form::label('start_date', 'Start Date:') !!}
    <p>{{ $wcRound->start_date }}</p>
</div>

<!-- End Date Field -->
<div class="form-group">
    {!! Form::label('end_date', 'End Date:') !!}
    <p>{{ $wcRound->end_date }}</p>
</div>

