<div class="table-responsive">
    <table class="table" id="clientphysiques-table">
        <thead>
            <tr>
                <th>Prenom</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Cni</th>
        <th>Telephone</th>
        <th>Email</th>
        <th>Login</th>
        <th>Password</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientphysiques as $clientphysique)
            <tr>
                <td>{{ $clientphysique->prenom }}</td>
            <td>{{ $clientphysique->nom }}</td>
            <td>{{ $clientphysique->adresse }}</td>
            <td>{{ $clientphysique->cni }}</td>
            <td>{{ $clientphysique->telephone }}</td>
            <td>{{ $clientphysique->email }}</td>
            <td>{{ $clientphysique->login }}</td>
            <td>{{ $clientphysique->password }}</td>
                <td>
                    {!! Form::open(['route' => ['clientphysiques.destroy', $clientphysique->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientphysiques.show', [$clientphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{{ route('clientphysiques.edit', [$clientphysique->id]) }}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
