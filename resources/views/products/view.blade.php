@extends('layouts.main')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Coalition Test </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#"></a>
      </li>
    </ul>
  </div>
</nav>



<div class="container">
<form id="Product_form">
  <div class="form-group">
    <label for="exampleFormControlInput1">Product name</label>
    <input type="text" name="pname" class="form-control" id="productName" placeholder="add product name">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Quantity in stock</label>
    <input type="number" name="QuantityInStock" class="form-control" id="QuantityInStock" placeholder="">
  </div>

  <div class="form-group">
    <label for="exampleFormControlInput1">Price per item</label>
    <input type="number" name="pricePerItem" class="form-control" id="pricePerItem" placeholder="name@example.com">
  </div>

  <button type="submit" id="form_submit" class="btn btn-primary">Submit</button>

</form>
</div> <hr>


<div class="container">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Product name</th>
      <th scope="col">Quantity in stock</th>
      <th scope="col">Price per Item</th>
      <th scope="col">Datetime submitted</th>
      <th scope="col">Total value number</th>
    </tr>
  </thead>
  <tbody>
  @foreach($products as $product)
    <tr>
      <th scope="row">1</th>
      <td>{{ $product->pname }}</td>
      <td>{{ $product->QuantityInStock }}</td>
      <td>{{ $product->pricePerItem }}</td>
      <td>{{ $product->datetime_submitted }}</td>
      <td>{{ $product->QuantityInStock * $product->pricePerItem }}</td>
    </tr>
  @endforeach
    <tr>
    <td> Total </td>
    <td> {{ $total }} </td>
    
    </tr>
  </tbody>
</table>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>

$('#form_submit').click(function(e){
   
   var productsForm = $("#Product_form");
   var formData = productsForm.serialize();
   e.preventDefault();
          $.ajax({
              url:'/products',
              type:'POST',
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              data: formData,
              success:function(data){
                   location.reload();
              },
              error: function (data) {
           
              }
          });
      });
</script>

@endsection

