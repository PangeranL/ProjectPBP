<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Role Management</title>
</head>
<body>
    <h1>Admin - Manage Roles</h1>
    
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h2>Assign Roles to Users</h2>
    <form action="{{ route('admin.assignRole', ['nik' => '1234567890123456']) }}" method="POST">
        @csrf
        <label for="role">Select Role:</label>
        <select name="role" id="role">
            @foreach($roles as $role)
                <option value="{{ $role->role }}">{{ $role->role }}</option>
            @endforeach
        </select>
        <button type="submit">Assign Role</button>
    </form>

    <h2>Users and Their Roles</h2>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->nik }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        @foreach($user->roles as $role)
                            <span>{{ $role->role }}</span><br>
                        @endforeach
                    </td>
                    <td>
                        <form action="{{ route('admin.removeRole', ['nik' => $user->nik]) }}" method="POST">
                            @csrf
                            <label for="role">Remove Role:</label>
                            <select name="role" id="role">
                                @foreach($user->roles as $role)
                                    <option value="{{ $role->role }}">{{ $role->role }}</option>
                                @endforeach
                            </select>
                            <button type="submit">Remove Role</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
