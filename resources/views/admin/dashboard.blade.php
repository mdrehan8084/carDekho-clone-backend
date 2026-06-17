<!DOCTYPE html>
<html>
<head>
  <title>Admin Panel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark px-4">
  <a class="navbar-brand fw-bold" href="/admin">🚗 CarDekho Admin</a>
  <div>
    <a href="/admin/cars" class="btn btn-outline-light btn-sm">Cars Manage karo</a>
       <a href="/admin/brands" class="btn btn-outline-light btn-sm">Brands</a>
      <button onclick="logout()" class="btn btn-danger btn-sm">
  Logout
</button>
  </div>
</nav>

<div class="container mt-4">
  <h4 class="fw-bold mb-4">Dashboard</h4>

  <div class="row g-3">
    <div class="col-md-4">
      <div class="card text-white bg-danger p-3">
        <h3>{{ $totalCars }}</h3>
        <p class="mb-0">Total Cars</p>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card text-white bg-dark p-3">
        <h3>{{ $totalContacts }}</h3>
        <p class="mb-0">Contact Messages</p>
      </div>
    </div>
  </div>

  <h5 class="fw-bold mt-4">Recent Cars</h5>
  <table class="table table-bordered mt-2">
    <thead class="table-dark">
      <tr>
        <th>Name</th>
        <th>Price</th>
        <th>Type</th>
        <th>Brand</th>
      </tr>
    </thead>
    <tbody>
      @foreach($recentCars as $car)
      <tr>
        <td>{{ $car->name }}</td>
        <td>{{ $car->price }}</td>
        <td><span class="badge bg-danger">{{ $car->type }}</span></td>
        <td>{{ $car->brand }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<script>

function logout()
{
    let token = localStorage.getItem("token");

    fetch("http://127.0.0.1:8000/api/logout", {
        method: "POST",
        headers: {
            "Authorization": "Bearer " + token,
            "Accept": "application/json"
        }
    })
    .then(res => res.json())
    .then(data => {

        localStorage.removeItem("token");

        alert(data.message);

        window.location.href = "http://localhost:5173/login";
    });
}
</script>

</body>
</html>
