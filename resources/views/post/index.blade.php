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
                <a class="nav-link" aria-current="page" href="{{ route('admin.index.brand') }}">Brand</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.index.post') }}">Post</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5">
                    <a class="btn btn-primary" href="{{ route('admin.create.post') }}">Add New</a>
                </div>
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                          <tr> 
                            <th scope="col">ID</th>
                            <th scope="col">Photo</th>
                            <th scope="col">Description</th> 
                            <th scope="col">Actions</th> 
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr> 
                                <td>{{ $post->id }}</td>
                                <td><img height="60" src="{{ Storage::url($post->photo) }}" alt=""></td>
                                <td>{{ $post->description }}</td>
                                <td>
                                    <a href="{{ route('admin.edit.post', $post->id) }}" class="btn btn-info">Edit</a>
                                    <form method="POST" action="{{ route('admin.destroy.post', $post->id) }}">
                                        
                                        @method('delete')
                                        @csrf
                                        <button class="mt-3 btn btn-danger form-delete">Delete</button>
                                     </form>
                                </td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>