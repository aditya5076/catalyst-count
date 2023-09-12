<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Companies</title>
  <!-- Include Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="#">Company List</a>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a class="nav-link" href="/create">Add Companies</a></li>
        <li class="nav-item"><a class="nav-link href=" {{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();" href="#">Logout</a>
          <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </div>
  </nav>

  @if ($message = Session::get('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ $message }}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif

  <div class="container mt-5">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
      <form method="GET" action="{{ route('home') }}">
        <div class="mb-3">
          <input type="text" name="name" placeholder="Filter by Anything" class="form-control" value="{{ request('name') }}">
        </div>
        <button type="submit" class="btn btn-primary">Filter</button>
      </form>
      @if(isset($count))
      <p>Total Records: {{ $count }}</p>
      @endif

      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Name</th>
            <th>domain</th>
            <th>year_founded</th>
            <th>industry</th>
            <th>size_range</th>
            <th>locality</th>
            <th>country</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($companies as $company)
          <tr>
            <td>{{ $company->company_name }}</td>
            <td>{{ $company->domain }}</td>
            <td>{{ $company->year_founded }}</td>
            <td>{{ $company->industry }}</td>
            <td>{{ $company->size_range }}</td>
            <td>{{ $company->locality }}</td>
            <td>{{ $company->country }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$companies->links()}}
    </div>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>