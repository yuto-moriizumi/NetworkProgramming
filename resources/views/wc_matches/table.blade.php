<div class="table-responsive">
    <table class="table" id="wcMatches-table">
        <thead>
            <tr>
                <th>Round Id</th>
        <th>Group Id</th>
        <th>Start Date</th>
        <th>Ordering</th>
        <th>Knockout</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wcMatches as $wcMatch)
            <tr>
                <td>{{ $wcMatch->round_id }}</td>
            <td>{{ $wcMatch->group_id }}</td>
            <td>{{ $wcMatch->start_date }}</td>
            <td>{{ $wcMatch->ordering }}</td>
            <td>{{ $wcMatch->knockout }}</td>
                <td>
                    {!! Form::open(['route' => ['wcMatches.destroy', $wcMatch->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wcMatches.show', [$wcMatch->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wcMatches.edit', [$wcMatch->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
