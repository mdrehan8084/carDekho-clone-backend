<!DOCTYPE html>
<html>
<head>
  <title>Brands — Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <div>
    <a href="/admin/cars" class="btn btn-outline-light btn-sm me-2">Cars</a>
    <a href="/admin/brands/create" class="btn btn-danger btn-sm">+ Brand Add karo</a>
  </div>
</nav>

<div class="container mt-4">
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  <h4 class="fw-bold mb-3">All Brands</h4>
  <div class="d-flex flex-wrap gap-3">
    @foreach($brands as $brand)
    <div class="card p-3 text-center" style="width:150px;">
      <img src="{{ $brand->image }}" height="50" style="object-fit:contain;" />
      <p class="fw-bold mt-2 mb-1">{{ $brand->name }}</p>
      <form action="/admin/brands/{{ $brand->id }}" method="POST">
        @csrf @method('DELETE')
        <button class="btn btn-danger btn-sm w-100" onclick="return confirm('Delete karna hai?')">Delete</button>
      </form>
    </div>
    @endforeach
  </div>
</div>
</body>
</html>