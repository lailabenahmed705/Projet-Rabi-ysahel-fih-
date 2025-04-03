@extends('users::layouts.master')

@section('content')
    <div class="container">
        <h1>Gestion des Rôles et Permissions</h1>

        <a href="{{ route('role_permissions.create') }}" class="btn btn-primary">Créer un rôle</a>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Nom du Rôle</th>
                    <th>Permissions</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $permission)
                                <span class="badge bg-success">{{ $permission->name }}</span>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('role_permissions.edit', $role->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                            <form action="{{ route('role_permissions.destroy', $role->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
