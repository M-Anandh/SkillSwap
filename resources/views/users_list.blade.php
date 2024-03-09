
    <h1>Another Page Content</h1>

    @if($users->isEmpty())
        <p>No users found with similar skills.</p>
    @else
        <ul>
            @foreach($users as $user)
                <li>{{ $user->name }} - {{ $user->email }}</li>
            @endforeach
        </ul>
    @endif
