<div class="table-responsive">
    <table class="table" id="wcRounds-table">
        <thead>
            <tr>
                <th>Tournament Id</th>
        <th>Name</th>
        <th>Ordering</th>
        <th>Knockout</th>
        <th>Start Date</th>
        <th>End Date</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wcRounds as $wcRound)
            <tr>
                <td>{{ $wcRound->tournament_id }}</td>
            <td>{{ $wcRound->name }}</td>
            <td>{{ $wcRound->ordering }}</td>
            <td>{{ $wcRound->knockout }}</td>
            <td>{{ $wcRound->start_date }}</td>
            <td>{{ $wcRound->end_date }}</td>
                <td>
                    {!! Form::open(['route' => ['wcRounds.destroy', $wcRound->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wcRounds.show', [$wcRound->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wcRounds.edit', [$wcRound->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
