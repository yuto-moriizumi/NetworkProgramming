<!-- Round Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('round_id', 'Round Id:') !!}
    {!! Form::number('round_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Group Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('group_id', 'Group Id:') !!}
    {!! Form::number('group_id', null, ['class' => 'form-control']) !!}
</div>

<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start_date', 'Start Date:') !!}
    {!! Form::text('start_date', null, ['class' => 'form-control','id'=>'start_date']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
        $('#start_date').datetimepicker({
            format: 'YYYY-MM-DD HH:mm:ss',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush

<!-- Ordering Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordering', 'Ordering:') !!}
    {!! Form::number('ordering', null, ['class' => 'form-control']) !!}
</div>

<!-- Knockout Field -->
<div class="form-group col-sm-6">
    {!! Form::label('knockout', 'Knockout:') !!}
    {!! Form::number('knockout', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('wcMatches.index') }}" class="btn btn-default">Cancel</a>
</div>
