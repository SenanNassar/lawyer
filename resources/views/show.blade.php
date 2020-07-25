@extends('admin.main')


@section('main_content')


<title>مكتب الظفيري </title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="{{asset('css/datatable.css')}}">+
<link rel="stylesheet" href="{{asset('css/jquery-confirm.min.css')}}">




<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>






<script>

window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);



error=false

window.onload = function () {
if (document.documentElement.lang == 'ar') {
    var docDivz = document.getElementsByTagName("div");
    for (let i = 0; i < docDivz.length; i++) {
      if (docDivz[i].classList.contains("text-center")) {
        continue;
      }
      docDivz[i].classList.add("text-right");
    }
  }
}

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

@if (session('status'))
    <div class="alert alert-success text-right p-2">
        {{ session('status') }}
    </div>
@endif


<h1 align="center"> الاستشارات المرسلة</h1>

<form action="{{Route('admin.consRequst.index')}}">
<button type="submit" class="btn btn-success"> <i class="fas fa-redo"></i> اعدة تحميل</button>
</form>

<br/>
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-right">
{{-- <a class="btn btn-success mb-2" id="new-cons" data-toggle="modal">New Cons</a> --}}
</div>
</div>
</div>

<style>
    .tbBody td{
        vertical-align: middle;
        font-size:12px;
    }
</style>
<div class="table-responsive">
<table class="table table-bordered data-table display table-responsive"  style="width:100%; direction: rtl; text-align:right; vertical-align: middle" >
<thead class="text-center">
<tr id="">
{{-- <th width="5%">id</th> --}}


<th width="5%" >الرقم</th>
<th width="15%">الاسم</th>
{{-- <th width="10%">email</th> --}}
<th width="25%">الموضوع</th>
<th width="45%">الاستشارة</th>
<th width="20%">تفاصيل </th>
{{-- <th width="10%">phone_number</th> --}}
</tr>
</thead>
<tbody class="tbBody">
</tbody>
</table>
</div>



<!-- Add and Edit customer modal -->
<div class="modal fade" id="crud-modal" modal-dialog-centered aria-hidden="true" >
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title" id="consCrudModal"></h4>
</div>
<div class="modal-body">
            <form name="empForm" action="{{ Route('admin.employee.store') }}" method="POST">
            <input type="hidden" name="emp_id" id="emp_id" >
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
<div class="modal-dialog modal-dialog-centered" >
<div class="modal-content">
<div class="modal-header">
<h4 class="modal-title  m-auto" style="direction: rtl" id="consCrudModal-show"></h4>
</div>
<div class="modal-body">
<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12 ">

<div class="table-responsive">
<table class="table-responsive" style="direction: rtl;">
        <tr height="50px" class="border-bottom" ><td class="w-25 text-right"><strong>الاسم:</strong></td><td id="sname" class="text-right" ></td></tr>
        <tr height="50px" class="border-bottom"><td class="w-25 text-right"><strong>البريد الالكتروني:</strong></td><td id="semail"  class="text-right"></td></tr>
        <tr height="50px" class="border-bottom"><td class="w-25 text-right"><strong>رقم الهاتف</strong></td><td id="smobile"  class="text-right"></td></tr>
        <tr height="50px" class="border-bottom"><td class="w-25 text-right"><strong>العنوان</strong></td><td id="stitle"  class="text-right"></td></tr>

        <tr  style="max-height: 200px;" class="border-bottom"><td class="w-25 text-right" style="vertical-align: top;"><strong>نص الرسالة</strong></td>
                <td class="text-right"  >
                <div id="sbody" class="pt-3"style="vertical-align:middle;  overflow: auto;min-height:100px; max-height:300px"></div>
        </td></tr>
        <form action="{{Route('SendMail')}}" method="post">
                @csrf
        <input type="hidden" name="to" >
        <tr  style="max-height: 200px;" class="border-bottom"><td class="w-25 text-right" style="vertical-align: top;"><strong>الرد على الرسالة</strong></td>
                <td class="text-right"  >
                <div class="pt-3"style="vertical-align:middle;  overflow: auto;min-height:100px; max-height:300px">
                        <textarea class="form-control" id="txtArea" rows="5" name='txtCons'></textarea>

                </div>
        </td></tr>
        </form>

        <tr height="100px" ><td style="text-align: center margin:20px;" colspan="2"><span onclick="javascript:$('form').submit();" class="btn btn-success">ارسال</span> <a href="{{ Route('admin.consRequst.index') }}" class="btn btn-danger">إلغاء</a> </td></tr>
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


 var printCounter = 0;
var table = $('.data-table').DataTable({
processing: true,
serverSide: true,
ajax: "{{ Route('admin.consRequst.index') }}",
columns: [

{data: 'DT_RowIndex', name: 'DT_RowIndex'},
// {data: 'id', name: 'id'},
{data: 'name', name: 'name'},
// {data: 'email', name: 'email'},
{data: 'title', name: 'title'},
{data: 'body', name: 'body',
"render": function ( data, type, row, meta ) {
      return type === 'display' && data.length > 200 ?
        '<span title="'+data+'">'+data.substr( 0, 250 )+'...</span>' :
        data;
    }

},
{data: 'action', name: 'action', orderable: false, searchable: false},

],
  'language': {
          'url' : '//cdn.datatables.net/plug-ins/1.10.21/i18n/Arabic.json'
  },
  dom: 'Bfrtip',
        buttons: [ {
            extend: 'print',
            text: '<i class="fas fa-print" style="font-size:18px"></i>',
            },
            {
            extend: 'copy',
            text: '<i class="far fa-copy" style="font-size:18px"></i>',
            },
            {
            extend:  'csv',
            text: '<i class="fas fa-file-csv" style="font-size:18px"></i>',
            },
            {
            extend: 'excel',
            text: '<i class="far fa-file-excel text-success" style="font-size:18px"></i>',
            }
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
/* Show Consultations Details*/
$('body').on('click', '#show-cons', function () {
var cons_id = $(this).data('id');
$.get('consRequst/'+cons_id, function (data) {

$('#sname').html(data.name);
$('#semail').html(data.email);
$('#smobile').html(data.phone_number);
$('#stitle').html(data.title);
$('#sbody').html(data.body);
$('input[name="to"]').val(data.email);

})
$('#consCrudModal-show').html("تفاصيل الاستشارة");
$('#crud-modal-show').modal('show');
});

/* Delete customer */
$('body').on('click', '#delete-cons', function () {
var cons_id = $(this).data("id");
var token = $("meta[name='csrf-token']").attr("content");


$.alert({
    title: '<p style="text-align:right">حذف الرسالة</p>',
    content: '<p style="text-align:right">هل انت مناكد ؟</p>',
    rtl: true,

    closeIcon: true,
    buttons: {
        confirm: {
            text: 'تأكيد',
            btnClass: 'btn-danger',
            action: function () {
                $.ajax({
                        type: "DELETE",
                        url: "consRequst/"+cons_id,
                        data: {
                        "id": cons_id,
                        "_token": token,
                        },
                        success: function (data) {
                            // $('#msg').html('Customer entry deleted successfully');
                        // $("#customer_id_" + cons_id).remove();
                            table.ajax.reload();

                            },

                        error: function (data) {
                            console.log('Error:', data);
                            }

                });

                $.alert('<p style="text-align:center">تم الحذف بنجاح</p>');
            }
        },
        cancel: {
            text: 'إلغاء',
            action: function () {
            }
        }
    }
});


});

//confirm("Are You sure want to delete !");




});


</script>

@endsection
