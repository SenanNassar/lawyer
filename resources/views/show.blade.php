<!DOCTYPE html>
<html>
<head>

<title>Laravel 7 CRUD using Datatables</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
error=false

function validate()
{
        if(document.userForm.name.value !='' && document.userForm.email.value !='' )
        document.userForm.btnsave.disabled=false
        else
        document.userForm.btnsave.disabled=true
}



</script>
</head>
<body>

<div class="container">
<h1 align="center">Laravel 7 CRUD using Datatables</h1>

<form action="{{Route('admin.consRequst.index')}}">
<button type="submit"> go therr</button>
</form>

<br/>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
<a class="btn btn-success mb-2" id="new-cons" data-toggle="modal">New Cons</a>
</div>
</div>
</div>

<table class="table table-bordered data-table" >
<thead>
<tr id="">
<th width="5%">id</th>
<th width="5%">No</th>
<th width="10%">Name</th>
<th width="10%">email</th>
<th width="15%">title</th>
<th width="35%">body</th>
<th width="10%">phone_number</th>


<th width="20%">Action</th>
</tr>
</thead>
<tbody>
</tbody>
</table>
</div>

<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="consCrudModal"></h4>
</div>
<div class="modal-body">
<form name="consForm" action="{{ Route('admin.consRequst.store') }}" method="POST">
<input type="hidden" name="cons_id" id="cons_id" >
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" id="name" class="form-control" placeholder="Name" onchange="validate()" >
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Email:</strong>
<input type="text" name="email" id="email" class="form-control" placeholder="Email" onchange="validate()">
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 text-center">
<button type="submit" id="btn-save" name="btnsave" class="btn btn-primary" disabled>Save</button>
<a href="{{ Route('admin.consRequst.index') }}" class="btn btn-danger">Cancel</a>
</div>
</div>
</form>
</div>
</div>
</div>
</div>

<!-- Show cons modal -->
<div class="modal fade" id="crud-modal-show" aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="consCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">
<div class="col-xs-2 col-sm-2 col-md-2"></div>
<div class="col-xs-10 col-sm-10 col-md-10 ">

<table class="table-responsive ">
<tr height="50px"><td><strong>Name:</strong></td><td id="sname"></td></tr>
<tr height="50px"><td><strong>Email:</strong></td><td id="semail"></td></tr>

<tr><td></td><td style="text-align: right "><a href="{{ Route('admin.consRequst.index') }}" class="btn btn-danger">OK</a> </td></tr>
</table>
</div>
</div>
</div>
</div>
</div>
</div>

</body>

<script type="text/javascript">

$(document).ready(function () {

var table = $('.data-table').DataTable({
processing: true,
serverSide: true,
ajax: "{{ Route('admin.consRequst.index') }}",
columns: [
{data: 'DT_RowIndex', name: 'DT_RowIndex'},
{data: 'id', name: 'id'},
{data: 'name', name: 'name'},
{data: 'email', name: 'email'},
{data: 'title', name: 'title'},
{data: 'body', name: 'body'},
{data: 'phone_number', name: 'phone_number'},
{data: 'action', name: 'action', orderable: false, searchable: false},
]
});

/* When click New customer button */
$('#new-cons').click(function () {
$('#btn-save').val("create-cons");
$('#cons').trigger("reset");
$('#consCrudModal').html("Add New Cons");
$('#crud-modal').modal('show');
});

/* Edit customer */
$('body').on('click', '#edit-cons', function () {
var cons_id = $(this).data('id');
$.get('consRequst/'+cons_id+'/edit', function (data) {
$('#consCrudModal').html("Edit Cons");
$('#btn-update').val("Update");
$('#btn-save').prop('disabled',false);
$('#crud-modal').modal('show');
$('#cons_id').val(data.id);
$('#name').val(data.name);
$('#email').val(data.email);

})
});
/* Show Consultations */
$('body').on('click', '#show-cons', function () {
var cons_id = $(this).data('id');
$.get('consRequst/'+cons_id, function (data) {

$('#sname').html(data.name);
$('#semail').html(data.email);

})
$('#consCrudModal-show').html("Cons Details");
$('#crud-modal-show').modal('show');
});

/* Delete customer */
$('body').on('click', '#delete-cons', function () {
var cons_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");
confirm("Are You sure want to delete !");

$.ajax({
type: "DELETE",
url: "localhost/admin/consRequst/"+cons_id,
data: {
"id": cons_id,
"_token": token,
},
success: function (data) {

//$('#msg').html('Customer entry deleted successfully');
//$("#customer_id_" + user_id).remove();
table.ajax.reload();
},
error: function (data) {
console.log('Error:', data);
}
});
});

});

</script>
</html>

