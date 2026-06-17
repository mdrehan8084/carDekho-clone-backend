<!DOCTYPE html>
<html>
<head>
  <title>Car Add karo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <a href="/admin/cars" class="btn btn-outline-light btn-sm">← Wapas jao</a>
</nav>

<div class="container mt-4" style="max-width:600px">
  <h4 class="fw-bold mb-3">Nayi Car Add karo</h4>

  <form action="/admin/cars" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
      <label class="fw-bold">Car Name</label>
      <input type="text" name="name" class="form-control" required />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Price</label>
      <input type="text" name="price" class="form-control" placeholder="Rs10.00 - 15.00 Lakh" required />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Image Upload karo</label>
      <input type="file" name="image" class="form-control" />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Category</label>
      <select name="category" class="form-select">
        <option value="SUV">SUV</option>
        <option value="Sedan">Sedan</option>
        <option value="Hatchback">Hatchback</option>
        <option value="MUV">MUV</option>
        <option value="Luxury">Luxury</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="fw-bold">Type — Website pe kahan dikhega</label>
      <select name="type" class="form-select">
        <option value="suv">Most Searched Cars</option>
        <option value="electric">Electric Cars</option>
        <option value="upcoming">Upcoming Cars</option>
        <option value="latest">Latest Car</option>
         <option value="trusted">Trusted Used Cars</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="fw-bold">Brand</label>
      <input type="text" name="brand" class="form-control" placeholder="Tata, Mahindra, Maruti..." required />
    </div>
    <button type="submit" class="btn btn-danger w-100 py-2">
      ✅ Car Add karo
    </button>
  </form>
</div>

</body>
</html>