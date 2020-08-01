<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<!-- Ordering Field -->
<div class="form-group col-sm-6">
    {!! Form::label('ordering', 'Ordering:') !!}
    {!! Form::number('ordering', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('wcGroups.index') }}" class="btn btn-default">Cancel</a>
</div>
