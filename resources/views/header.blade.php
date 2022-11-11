<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">News Manager</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <span class="navbar-text">
        @if(!Auth::user())
        <a href="{{route('login')}}" class="link-primary">Log in</a>
        <a href="{{route('register')}}" class="link-primary">Registration</a>
        @else
            <a href="{{route('manager.posts')}}" class="link-primary" target="_blank">Admin Panel</a>
      </span>
    <form action="{{route('logout')}}" method="post">
        @csrf
        <button type="submit" class="btn btn-link" style="margin-left: 5px;"><i class="fa fa-sign-out fa-fw"></i>Log Out</button>
    </form>
    @endif
</nav>
