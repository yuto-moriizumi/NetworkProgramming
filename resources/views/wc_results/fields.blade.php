<!-- Match Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('match_id', 'Match Id:') !!}
    {!! Form::number('match_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id0 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id0', 'Team Id0:') !!}
    {!! Form::number('team_id0', null, ['class' => 'form-control']) !!}
</div>

<!-- Team Id1 Field -->
<div class="form-group col-sm-6">
    {!! Form::label('team_id1', 'Team Id1:') !!}
    {!! Form::number('team_id1', null, ['class' => 'form-control']) !!}
</div>

<!-- Rs Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rs', 'Rs:') !!}
    {!! Form::number('rs', null, ['class' => 'form-control']) !!}
</div>

<!-- Rs Extra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rs_extra', 'Rs Extra:') !!}
    {!! Form::text('rs_extra', null, ['class' => 'form-control']) !!}
</div>

<!-- Rs Pk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('rs_pk', 'Rs Pk:') !!}
    {!! Form::text('rs_pk', null, ['class' => 'form-control']) !!}
</div>

<!-- Ra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ra', 'Ra:') !!}
    {!! Form::text('ra', null, ['class' => 'form-control']) !!}
</div>

<!-- Ra Extra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ra_extra', 'Ra Extra:') !!}
    {!! Form::text('ra_extra', null, ['class' => 'form-control']) !!}
</div>

<!-- Ra Pk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ra_pk', 'Ra Pk:') !!}
    {!! Form::text('ra_pk', null, ['class' => 'form-control']) !!}
</div>

<!-- Difference Field -->
<div class="form-group col-sm-6">
    {!! Form::label('difference', 'Difference:') !!}
    {!! Form::text('difference', null, ['class' => 'form-control']) !!}
</div>

<!-- Outcome Field -->
<div class="form-group col-sm-6">
    {!! Form::label('outcome', 'Outcome:') !!}
    {!! Form::text('outcome', null, ['class' => 'form-control']) !!}
</div>

<!-- Outcome 90Min Field -->
<div class="form-group col-sm-6">
    {!! Form::label('outcome_90min', 'Outcome 90Min:') !!}
    {!! Form::text('outcome_90min', null, ['class' => 'form-control']) !!}
</div>

<!-- Count Win Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count_win', 'Count Win:') !!}
    {!! Form::text('count_win', null, ['class' => 'form-control']) !!}
</div>

<!-- Count Lose Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count_lose', 'Count Lose:') !!}
    {!! Form::text('count_lose', null, ['class' => 'form-control']) !!}
</div>

<!-- Count Stillmate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('count_stillmate', 'Count Stillmate:') !!}
    {!! Form::text('count_stillmate', null, ['class' => 'form-control']) !!}
</div>

<!-- Point Field -->
<div class="form-group col-sm-6">
    {!! Form::label('point', 'Point:') !!}
    {!! Form::text('point', null, ['class' => 'form-control']) !!}
</div>

<!-- Extra Field -->
<div class="form-group col-sm-6">
    {!! Form::label('extra', 'Extra:') !!}
    {!! Form::text('extra', null, ['class' => 'form-control']) !!}
</div>

<!-- Pk Field -->
<div class="form-group col-sm-6">
    {!! Form::label('pk', 'Pk:') !!}
    {!! Form::number('pk', null, ['class' => 'form-control']) !!}
</div>

<!-- Duplicate Field -->
<div class="form-group col-sm-6">
    {!! Form::label('duplicate', 'Duplicate:') !!}
    {!! Form::text('duplicate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('wcResults.index') }}" class="btn btn-default">Cancel</a>
</div>
