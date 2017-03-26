<div class="card employeeTile">
    <div class="card-content">
        <div class="media">
            <div class="media-left">
                <figure class="image is-48x48">
                    <img src="http://bulma.io/images/placeholders/96x96.png" alt="Image">
                </figure>
            </div>
            <div class="media-content">
                <p class="employeeTile-name">
                    {{ $user->name() }}
                </p>
                <p class="employeeTile-email">
                    {{ $user->email }}
                </p>
            </div>
        </div>
    </div>
    <footer class="card-footer employeeTile-footer">
        <a href="{{ route('employeesShow', ['user' => $user->id]) }}" class="card-footer-item">Profile</a>
        <a href="{{ route('employeesEdit', ['user' => $user->id]) }}" class="card-footer-item">Edit</a>
        <form class="card-footer-item" action="{{ route('employeesDestroy', ['user' => $user->id]) }}" method="POST">
            {{ csrf_field() }} {{ method_field('DELETE') }}
            <button class="button is-link employeeTile-delete" type="submit">Delete</button>
        </form>
    </footer>
</div>
