<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">UXample</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="{{ route('home') }}">Home</a> 
              </li>
              <li class="nav-item"> 
                <a class="nav-link" aria-current="page" href="#">Brand</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="py-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-12">
                    <h1>    
                        {{ $brand->name }} UX Cases
                    </h1>
                </div>
            </div>
            <div class="row mb-5 pb-5">
                <div class="col-lg-7">
                    <img height="400" src="{{ Storage::url($details->photo) }}" alt="">
                </div>
                <div class="col-lg-4 mt-5">
                    <h3>
                        Explanation
                    </h3>
                    <p>
                        {{ $details->description }}
                    </p>
                </div>
            </div>
            <div class="row mt-5 pt-5">
                @foreach($relate_posts as $post)
                    <div class="col-lg-3">
                        <a href="{{ route('details', ['brand' => $brand->name, 'id_post' => $post->id]) }}">
                            <img height="200" src="{{ Storage::url($post->photo) }}" alt="">
                        </a>
                    </div>
                @endforeach    
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>