<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Companies</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container">
    <ul class="nav nav-tabs justify-content-end">
      <li class="nav-item"><a class="nav-link" href="/home">View Companies</a></li>
      <li class="nav-item"><a class="nav-link href=" {{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" href="#">Logout</a>
        <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>

  <div class="container mt-5">
    <h2>Upload Companies</h2>
    @if ($errors->any())
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <strong>Whoops!</strong> There were some problems with your input.<br><br>
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

    </div>
    @endif

    <form method="post" action="{{ route('store') }}" enctype="multipart/form-data">
      @csrf
      <div class="mb-3">
        <label for="inputFile" class="form-label">Select File:</label>
        <input type="file" name="file" id="inputFile" multiple class="form-control @error('file') is-invalid @enderror" accept="csv/*">


        @error('file')
        <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>


  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>