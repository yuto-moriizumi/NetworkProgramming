<div class="table-responsive">
    <table class="table" id="wcResults-table">
        <thead>
            <tr>
                <th>Match Id</th>
        <th>Team Id0</th>
        <th>Team Id1</th>
        <th>Rs</th>
        <th>Rs Extra</th>
        <th>Rs Pk</th>
        <th>Ra</th>
        <th>Ra Extra</th>
        <th>Ra Pk</th>
        <th>Difference</th>
        <th>Outcome</th>
        <th>Outcome 90Min</th>
        <th>Count Win</th>
        <th>Count Lose</th>
        <th>Count Stillmate</th>
        <th>Point</th>
        <th>Extra</th>
        <th>Pk</th>
        <th>Duplicate</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wcResults as $wcResult)
            <tr @click="hello([{{$wcResult->wc_team0_id}},{{$wcResult->wc_team1_id}}])">
                <td>{{ $wcResult->match_id }}</td>
            <td>{{ $wcResult->team_id0 }}</td>
            <td>{{ $wcResult->team_id1 }}</td>
            <td>{{ $wcResult->rs }}</td>
            <td>{{ $wcResult->rs_extra }}</td>
            <td>{{ $wcResult->rs_pk }}</td>
            <td>{{ $wcResult->ra }}</td>
            <td>{{ $wcResult->ra_extra }}</td>
            <td>{{ $wcResult->ra_pk }}</td>
            <td>{{ $wcResult->difference }}</td>
            <td>{{ $wcResult->outcome }}</td>
            <td>{{ $wcResult->outcome_90min }}</td>
            <td>{{ $wcResult->count_win }}</td>
            <td>{{ $wcResult->count_lose }}</td>
            <td>{{ $wcResult->count_stillmate }}</td>
            <td>{{ $wcResult->point }}</td>
            <td>{{ $wcResult->extra }}</td>
            <td>{{ $wcResult->pk }}</td>
            <td>{{ $wcResult->duplicate }}</td>
                <td>
                    {!! Form::open(['route' => ['wcResults.destroy', $wcResult->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wcResults.show', [$wcResult->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wcResults.edit', [$wcResult->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
