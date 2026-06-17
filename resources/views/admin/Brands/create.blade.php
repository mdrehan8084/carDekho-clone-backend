<!DOCTYPE html>
<html>
<head>
  <title>Brand Add karo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <a href="/admin/brands" class="btn btn-outline-light btn-sm">← Wapas jao</a>
</nav>

<div class="container mt-4" style="max-width:500px">
  <h4 class="fw-bold mb-3">Naya Brand Add karo</h4>
  <form action="/admin/brands" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="fw-bold">Brand Name</label>
      <input type="text" name="name" class="form-control" placeholder="Tata, Maruti..." required />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Brand Logo</label>
      <input type="file" name="image" class="form-control" required />
    </div>
    <button type="submit" class="btn btn-danger w-100">Brand Add karo ✅</button>
  </form>
</div>
</body>
</html>