<!-- Name Field -->
<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $wcTeam->name }}</p>
</div>

<!-- Country Field -->
<div class="form-group">
    {!! Form::label('country', 'Country:') !!}
    <p>{{ $wcTeam->country }}</p>
</div>

<!-- Country Now Field -->
<div class="form-group">
    {!! Form::label('country_now', 'Country Now:') !!}
    <p>{{ $wcTeam->country_now }}</p>
</div>

<!-- Area Field -->
<div class="form-group">
    {!! Form::label('area', 'Area:') !!}
    <p>{{ $wcTeam->area }}</p>
</div>

<!-- Lat Field -->
<div class="form-group">
    {!! Form::label('lat', 'Lat:') !!}
    <p>{{ $wcTeam->lat }}</p>
</div>

<!-- Lng Field -->
<div class="form-group">
    {!! Form::label('lng', 'Lng:') !!}
    <p>{{ $wcTeam->lng }}</p>
</div>

