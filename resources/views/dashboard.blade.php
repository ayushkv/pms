<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">

<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'>
<link rel='stylesheet' href='https://cdn.datatables.net/buttons/1.2.2/css/buttons.bootstrap.min.css'><link rel="stylesheet" href="./style.css">

</head>
<style>
	body {margin:2em;}
</style>
<body>
    <div class="text-center"><h2>Table 1</h2></div>
<table id="table1" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Category Name</th>
			<th>Supplier Name</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($products as $product) 
		<tr>
            <td>{{$product->product_name}}</td>
			<td>{{$product->category_name}}</td>
			<td>{{$product->supplier_name}}</td>
		</tr>
        @endforeach
	</tbody>
</table>
    <div class="text-center"><h2>Table 2</h2></div>
<table id="table2" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($prices as $price) 
		<tr>
            <td>{{$price->product_name}}</td>
			<td>{{$price->price}}</td>
		</tr>
        @endforeach
	</tbody>
</table>
    <div class="text-center"><h2>Table 3</h2></div>
<table id="table3" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Category Name</th>
            <th>Supplier Name</th>
            <th>Price</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($categories as $category)
		<tr>
            <td>{{$category->product_name}}</td>
			<td>{{$category->category_name}}</td>
			<td>{{$category->supplier_name}}</td>
			<td>{{$category->price}}</td>
		</tr>
        @endforeach
	</tbody>
</table>
    <div class="text-center"><h2>Table 4</h2></div>
<table id="table4" class="table table-striped table-bordered" cellspacing="0" width="100%">
	<thead>
		<tr>
			<th>Supplier Name</th>
			<th>Total Products</th>
            <th>Average Value of Each Product</th>
		</tr>
	</thead>
	<tbody>
        @foreach ($suppliers as $supplier)
		<tr>
            <td>{{$supplier->supplier_name}}</td>
			<td>{{$supplier->total_products}}</td>
			<td>{{$supplier->avg_value_products}}</td>
		</tr>
        @endforeach
	</tbody>
</table>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js'></script>
<script src='https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'></script>
<script src='https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/pdfmake.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.18/vfs_fonts.js'></script>
<script>
	$(document).ready(function() {
	// DataTable initialisation
	$('#table1').DataTable();
	$('#table2').DataTable();
	$('#table3').DataTable();
	$('#table4').DataTable();
});
</script>

</body>
</html>
