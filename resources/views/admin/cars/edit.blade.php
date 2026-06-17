<!DOCTYPE html>
<html>
<head>
  <title>Car Edit karo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <a href="/admin/cars" class="btn btn-outline-light btn-sm">← Wapas jao</a>
</nav>

<div class="container mt-4" style="max-width:600px">
  <h4 class="fw-bold mb-3">Car Edit karo</h4>

  <form action="/admin/cars/{{ $car->id }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="fw-bold">Car Name</label>
      <input type="text" name="name" class="form-control" value="{{ $car->name }}" required />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Price</label>
      <input type="text" name="price" class="form-control" value="{{ $car->price }}" required />
    </div>
    <div class="mb-3">
      <label class="fw-bold">Current Image</label><br>
      @if($car->image)
        <img src="{{ $car->image }}" height="80" class="mb-2 rounded" />
      @endif
      <input type="file" name="image" class="form-control" />
      <small class="text-muted">Nayi image upload karo ya khali chhodo</small>
    </div>
    <div class="mb-3">
      <label class="fw-bold">Category</label>
      <select name="category" class="form-select">
        <option value="SUV" {{ $car->category == 'SUV' ? 'selected' : '' }}>SUV</option>
        <option value="Sedan" {{ $car->category == 'Sedan' ? 'selected' : '' }}>Sedan</option>
        <option value="Hatchback" {{ $car->category == 'Hatchback' ? 'selected' : '' }}>Hatchback</option>
        <option value="MUV" {{ $car->category == 'MUV' ? 'selected' : '' }}>MUV</option>
        <option value="Luxury" {{ $car->category == 'Luxury' ? 'selected' : '' }}>Luxury</option>
      </select>
    </div>
    <div class="mb-3">
      <label class="fw-bold">Type — Website pe kahan dikhega</label>
      <select name="type" class="form-select">
        <option value="suv" {{ $car->type == 'suv' ? 'selected' : '' }}>Most Searched Cars</option>
        <option value="electric" {{ $car->type == 'electric' ? 'selected' : '' }}>Electric Cars</option>
         <option value="upcoming" {{ $car->type == 'upcoming' ? 'selected' : '' }}>Upcoming Cars</option>
        <option value="latest" {{ $car->type == 'latest' ? 'selected' : '' }}>Latest Cars</option>
         <option value="trusted" {{ $car->type == 'trusted' ? 'selected' : '' }}>trusted car by bugdet</option>
      </select>
    </div> 
      
      
    <div class="mb-3">
      <label class="fw-bold">Brand</label>
      <input type="text" name="brand" class="form-control" value="{{ $car->brand }}" required />
    </div>
    <button type="submit" class="btn btn-warning w-100 py-2">
      ✅ Car Update karo
    </button>
  </form>
</div>

</body>
</html>