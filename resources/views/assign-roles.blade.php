<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assign Roles</title>
</head>
<body>
    <h1>Assign Roles to {{ $user->name }}</h1>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('users.assign-roles.post', $user) }}" method="POST">
        @csrf
        @foreach ($roles as $role)
            <div>
                <label>
                    <input
                        type="checkbox"
                        name="roles[]"
                        value="{{ $role->id }}"
                        {{ $user->roles->contains($role) ? 'checked' : '' }}
                    >
                    {{ $role->name }}
                </label>
            </div>
        @endforeach

        <button type="submit">Assign Roles</button>
    </form>
</body>
</html>
