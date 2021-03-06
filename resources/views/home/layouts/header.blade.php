<header class="header">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-toggleable-md">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#Forest Timemenu"
                aria-controls="Forest Timemenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-md-center" id="Forest Timemenu">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link color-green-hover" href="{{ route('home.index') }}">Home</a>
                    </li>
                    @foreach ($cates as $cate)
                        <li class="nav-item">
                            <a class="nav-link color-green-hover"
                                href="{{ route('home.cate', ['id' => $cate->id]) }}">{{ $cate->name }}</a>
                        </li>
                    @endforeach

                </ul>
            </div>
        </nav>
    </div><!-- end container -->
</header><!-- end header -->
