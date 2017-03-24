<div class="card">
    <div class="card-image">
        <figure class="image is-4by3">
            <img src="http://bulma.io/images/placeholders/1280x960.png" alt="Image">
        </figure>
    </div>
    <div class="card-content">
        <div class="media">
            <div class="media-content">
                <p class="title is-6">
                    {{ $user->name() }}
                </p>
            </div>
        </div>
        <div class="content">
            <small>Added {{ $user->created_at->diffForHumans() }}</small>
        </div>
    </div>
    <footer class="card-footer">
        <a href="{{ route('employeesShow', ['user' => $user->id]) }}" class="card-footer-item">Profile</a>
        <a href="{{ route('employeesEdit', ['user' => $user->id]) }}" class="card-footer-item">Edit</a>
        <form class="card-footer-item" action="{{ route('employeesDestroy', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }} {{ method_field('DELETE') }}
            <button class="button is-link" type="submit">Delete</button>
        </form>
    </footer>
</div>
