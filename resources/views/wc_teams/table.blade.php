<div class="table-responsive">
    <table class="table" id="wcTeams-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Country</th>
        <th>Country Now</th>
        <th>Area</th>
        <th>Lat</th>
        <th>Lng</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wcTeams as $wcTeam)
            <tr>
                <td>{{ $wcTeam->name }}</td>
            <td>{{ $wcTeam->country }}</td>
            <td>{{ $wcTeam->country_now }}</td>
            <td>{{ $wcTeam->area }}</td>
            <td>{{ $wcTeam->lat }}</td>
            <td>{{ $wcTeam->lng }}</td>
                <td>
                    {!! Form::open(['route' => ['wcTeams.destroy', $wcTeam->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wcTeams.show', [$wcTeam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wcTeams.edit', [$wcTeam->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
