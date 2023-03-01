<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Sigmar+One&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="{{ asset('images/logo-lookhowux.png') }}" height="50" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Brands</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Benefits</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link btn btn-primary" href="#">Sign Up</a>
            </li>
          </ul>
          {{-- <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form> --}}
        </div>
      </div>
    </nav>
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h1>    
                        Latest UX Case
                    </h1>
                </div>
            </div>
            @foreach($brands as $brand)
            <div class="row mb-5">
                <div class="col-lg-12">
                    <img height="80" src="{{ Storage::url($brand->logo) }}" alt="">
                    <h2>
                        {{ $brand->name }}
                    </h2>
                    @php
                        $posts = \App\Models\Post::where('id_brand', $brand->id)->get(); 
                    @endphp
                    <p>
                        {{ count($posts) }} UX Cases
                    </p>
                    <div class="row">
                        @foreach($posts as $post)
                            <div class="col-lg-3">
                                <a href="{{ route('details', ['brand' => $brand->name, 'id_post' => $post->id]) }}">
                                    <img height="200" src="{{ Storage::url($post->photo) }}" alt="">
                                </a>
                            </div>
                        @endforeach    
                    </div>
                    <hr>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>