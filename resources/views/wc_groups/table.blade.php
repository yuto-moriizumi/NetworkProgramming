<div class="table-responsive">
    <table class="table" id="wcGroups-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Ordering</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($wcGroups as $wcGroup)
            <tr>
                <td>{{ $wcGroup->name }}</td>
            <td>{{ $wcGroup->ordering }}</td>
                <td>
                    {!! Form::open(['route' => ['wcGroups.destroy', $wcGroup->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('wcGroups.show', [$wcGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('wcGroups.edit', [$wcGroup->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
