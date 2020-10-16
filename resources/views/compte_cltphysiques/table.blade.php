<div class="table-responsive">
    <table class="table" id="compteCltphysiques-table">
        <thead>
            <tr>
                <th>Clientphysique Id</th>
        <th>Numerocompte</th>
        <th>Solde</th>
        <th>Clerib</th>
        <th>Frais</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($compteCltphysiques as $compteCltphysique)
            <tr>
                <td>{{ $compteCltphysique->clientphysique_id }}</td>
            <td>{{ $compteCltphysique->numerocompte }}</td>
            <td>{{ $compteCltphysique->solde }}</td>
            <td>{{ $compteCltphysique->clerib }}</td>
            <td>{{ $compteCltphysique->frais }}</td>
                <td>
                    {!! Form::open(['route' => ['compteCltphysiques.destroy', $compteCltphysique->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('compteCltphysiques.show', [$compteCltphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('compteCltphysiques.edit', [$compteCltphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
