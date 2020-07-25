@extends('admin.main')


@section('main_content')
<script>
    function validate()
    {
        if(document.empForm.name.value !='' && document.empForm.email.value !='' && document.empForm.job_title.value !='' )
        document.empForm.btnsave.disabled=false
        else
        document.empForm.btnsave.disabled=true
    }
</script>

 <div class="container">

   
    <h1 class="text-center pt-4">جدول بيانات الموظفين</h1>
     @if (session('success'))
    <script>
     $.notify("شكرا ........ تمت العملية  بنجاح " , "success" );
    </script>
    {{-- <div class="alert alert-success text-right p-2">
      {{ session('msg') }}
    </div> --}}
@endif
<p>
      <button type="button" class="btn btn-success" data-toggle="modal" id="newEmpbtn" >
            موظف جديد <i class="fas fa-plus"></i>
     </button>
</p>


  <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-dark">
          <h4 class="modal-title" id='empCrudModal'></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title " style="" id="empCrudModal-show"></h4>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
         <form name="empForm" id="empForm" action="{{ Route('admin.employee.store') }}" enctype='multipart/form-data' method="POST">
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>

                <input type="hidden" name="emp_id" id="emp_id" >
              <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="row">
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">

                <strong>الاسم:</strong>

                <input type="text" name="name" id="name" class="form-control" placeholder="الاسم" onchange="validate()" >
                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">

                    <strong>البريد الالكتروني</strong>

                    <input type="text" name="email" id="email" class="form-control" placeholder="البريد الالكتروني" onchange="validate()">
                </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">

                <strong>المسمى الوظيفي:</strong>

                <input type="text" name="job_title" id="job_title" class="form-control" placeholder="المسمى الوظيفي" onchange="validate()">
                </div>
                </div>

                <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">

                <strong>الوصف الوظيفي</strong>

                <input type="text" maxlength="170" name="job_desc" id="job_desc" class="form-control" placeholder="الوصف الوظيفي"  >
                </div>
                </div>

    

                 <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">

                <strong>ملف السيرة الذاتية (CV)</strong>

                 <div class="ml-2 col-md-10">
                    <div id="msg"></div>
                  
                        <input type="file" name="cvs[]" class="cvfile w-100 " style="visibility: hidden; position: absolute;"  accept=".doc,.docx,.pdf">
                        <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Upload File" id="docFile">
                        <div class="input-group-append">
                            <button type="button" class="browseCv btn btn-dark">تحميل الملف...</button>
                        </div>
                        </div>
                  
                    <img src="https://placehold.it/80x80" id="previewDoc" class="img-thumbnail" alt="فارغ" style="width: 90px; height: 90px;">
                    <p id="docName" class=""> </p>
                    <button type="button" id="delCV" style="border: none;background-color:RGBA(255,255,255,0) font-size:2rem">&times;</button>
                </div>

                </div>
                </div>

                 <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">

                <strong>الصورة</strong>

                <div class="ml-2 col-md-10 ">

                   
                        <input type="file" name="img[]" class="imgfile w-100" style="visibility: hidden; position: absolute;" accept="image/*">
                        <div class="input-group my-3">
                        <input type="text" class="form-control" disabled placeholder="Upload File" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browseImg btn btn-primary">تحميل الصورة ...</button>
                        </div>
                        </div>
                 
                    <img src="https://placehold.it/80x80" id="previewImg" class="img-thumbnail" alt="فارغ" style="width: 90px; height: 90px;">
                    <p id="imgName"></p>
                       <button type="button" id="delIMG" style="border: none;background-color:RGBA(255,255,255,0) font-size:2rem">&times;</button>
                </div>


                </div>
                </div>
                
                <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">

                        <strong>حساب Linkedin</strong>

                        <input type="text" name="linkedin" id="linkedin" class="form-control" placeholder="linkedin" >
                        </div>
                </div>




                <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" id="btn-save" name="btnsave" class="btn btn-primary pr-4 pl-4 mt-5" disabled>حـفـظ</button>
                <a href="" id="cancelBtn" class="btn btn-danger pr-4 pl-4 mt-5">إلغــاء</a>
                </div>
                </div>
                </form>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>


    <div id="tag_container">
           @include('admin.empTable')
    </div>
</div>





<script type="text/javascript">
$(document).on('click', '#delCV', function(){
      $('.cvfile').val('');
      $('#previewDoc').attr('src', '/images/cv.png');
      $('#docFile').val('');

});


$(document).on('click', '#delIMG', function(){
      $('.imgfile').val('');
      $('#previewImg').attr('src', '/images/empty.jpg');
      $('#file').val('');

});
 
    $(document).on("click", "#cancelBtn", function(e) {
     e.preventDefault();
        $('#myModal').modal('hide');


    });

    $(document).on("click", ".browseCv", function() {
            var file = $(this).parents().find(".cvfile");
            file.trigger("click");
            });

            $('.cvfile').change(function(e) {
              
            var fileName = e.target.files[0].name;
            $("#docFile").val(fileName);
    
        $('#docName').text(fileName);
        var ext = e.target.files[0].name.split('.').pop();
               if (ext == "pdf" ){
                         $("#previewDoc").attr("src", "/images/pdf.png");
                    } else if (ext.indexOf("doc") != -1) {
                        $("#previewDoc").attr("src", "/images/word.png");
                    } else if (ext.indexOf("docx") != -1) {
                        $("#previewDoc").attr("src", "/images/word.png");
                    }


            // var reader = new FileReader();
            // reader.onload = function(e) {
                // get loaded data and render thumbnail.



                //document.getElementById("previewDoc").src = e.target.result;
            // };
            // read the image file as a data URL.
           // reader.readAsDataURL(this.files[0]);
    });

     $(document).on("click", ".browseImg", function() {

     
            var file = $(this).parents().find(".imgfile");
            file.trigger("click");
            });

            $('.imgfile').change(function(e) {
                
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            $('#imgName').text(fileName);

            var reader = new FileReader();
            reader.onload = function(e) {
                // get loaded data and render thumbnail.
                document.getElementById("previewImg").src = e.target.result;
            };
            // read the image file as a data URL.
            reader.readAsDataURL(this.files[0]);
    });



    $(window).on('hashchange', function() {
        if (window.location.hash) {
            var page = window.location.hash.replace('#', '');
            if (page == Number.NaN || page <= 0) {
                return false;
            }else{
                getData(page);
            }
        }
    });

    $(document).ready(function()
    {
        $(document).on('click', '.pagination a',function(event)
        {
            event.preventDefault();

            $('li').removeClass('active');
            $(this).parent('li').addClass('active');

            var myurl = $(this).attr('href');
            var page=$(this).attr('href').split('page=')[1];

            getData(page);
        });



    });

    function getData(page){
        $.ajax(
        {
            url: '?page=' + page,
            type: "get",
            datatype: "html"
        }).done(function(data){
            $("#tag_container").empty().html(data);
            location.hash = page;
        }).fail(function(jqXHR, ajaxOptions, thrownError){
              alert('No response from server');
        });
    }

    $('body').on('click', '#newEmpbtn', function(){
       
        $('#empForm').trigger("reset");
        $('#empCrudModal').html("إضافة موظف جديد");
        $('.file').val('');
        $('.cvfile').val('');
        $('job_desc').val('');
        $('#previewDoc').attr('src', '/images/cv.png');
         $('#previewImg').attr('src', '/images/empty.jpg');
        $('#myModal').modal('show');
    });


    $('body').on('click', '#edit-emp', function () {

        var emp_id = $(this).data('id');

                 $('#empCrudModal').html("تعديل البيانات");
                $('#btn-update').val("Update");
                $('#btn-save').prop('disabled',false);
                $('#myModal').modal('show');

            
        $.get('employee/'+ emp_id+ '/edit', function (data) {
                $('#emp_id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#job_title').val(data.job_title);
                $('#linkedin').val(data.linkedin); 
                $('#job_desc').val(data.job_desc);
                console.log(data.job_desc);
                // $('#docFile').val(data.cv);
                // $('#file').val( data.picture );
                $("#previewImg").attr("src", data.picture );
                
                var ext = data.cv.split('.').pop();
               if (ext == "pdf" ){
                         $("#previewDoc").attr("src", "/images/pdf.png");
                    } else if (ext.indexOf("doc") != -1) {
                        $("#previewDoc").attr("src", "/images/word.png");
                    } else if (ext.indexOf("docx") != -1) {
                        $("#previewDoc").attr("src", "/images/word.png");
                    }

              
              
       })
});

/* Delete emp */
$('body').on('click', '#delete-emp', function () {
var emp_id = $(this).data("id");
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
                        url: "employee/"+emp_id,
                        data: {
                        "id": emp_id,
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

                $.notify("شكرا ........ تمت الحذف  بنجاح " , "success" );
                location.reload();
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


</script>




</div>



@endsection
