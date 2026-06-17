<!DOCTYPE html>
<html>
<head>
  <title>Cars — Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <a href="/admin/cars/create" class="btn btn-danger btn-sm">+ Car Add karo</a>
</nav>

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <h4 class="fw-bold mb-3">All Cars</h4>
  <table class="table table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Price</th>
        <th>Type</th>
        <th>Brand</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cars as $car)
      <tr>
        <td><img src="{{ $car->image }}" height="50" /></td>
        <td>{{ $car->name }}</td>
        <td>{{ $car->price }}</td>
        <td><span class="badge bg-danger">{{ $car->type }}</span></td>
        <td>{{ $car->brand }}</td>
        <td>
          <a href="/admin/cars/{{ $car->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
          <form action="/admin/cars/{{ $car->id }}" method="POST" style="display:inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" onclick="return confirm('Delete karna hai?')">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

</body>
</html>