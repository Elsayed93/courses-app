<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

    <title>Home Page</title>

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"
        integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <button class="nav-link active loginBtn" aria-current="page" type="submit">Login</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary" href="{{route('register')}}">Sign Up</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container row mt-5">
        <h3>Display {{ $courses->count() }} Total Courses</h3>
    </div>

    <div class="container-fluid row mt-5">

        {{-- sidebar --}}
        <div class="col-md-4">
            <h4>Categories</h4>
            @foreach ($categories as $category)
                <div class="row">
                    <p>{{ $category->name }}</p>
                </div>
            @endforeach



        </div>
        {{-- end of sidebar --}}


        {{-- courses --}}
        <div class="col-md-8">
            <h4>All Courses</h4>({{ $courses->count() }})

            {{-- couress row --}}
            <div class="row courses-row mt-5">
                @foreach ($courses as $course)
                    <div class="col-md-4 mb-5">
                        <div class="card">
                            <img src="{{ $course->image ? asset('uploads/courses_images/' . $course->image) : asset('uploads/courses_images/default.jpg') }}"
                                class="card-img-top" alt="course image" height="200">
                            <div class="card-body">
                                <a href="#">
                                    <h5 class="card-title">{{ $course->name }}</h5>
                                </a>
                                <p class="card-text">{{ $course->description }}</p>
                            </div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><b>category:</b> {{ $course->category->name }}</li>
                                <li class="list-group-item"><b>level: </b>{{ $course->levels }}</li>
                                <li class="list-group-item"><b>hours: </b>{{ $course->hours }} Hrs</li>
                            </ul>
                            <div class="card-body">
                                @if ($course->rating == 0)
                                    <small class="text-muted">rating: {{ $course->rating }}</small>
                                @else
                                    <b>rating:</b>
                                    @for ($i = 0; $i < $course->rating; $i++)
                                        <i class="fas fa-star"></i>
                                    @endfor
                                @endif

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- end of couress row --}}

        </div>
        {{-- end of courses --}}

    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
</body>

</html>
