@extends('admin.main')

@section('main_content')

<style>
    .info{
        color: lightslategray;
        font-style: italic
    }
</style>

<div class="container pt-3" style="direction: rtl; text-align:right">
    @if ($errors->any())
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
<div class="alert alert-success mt-3" role="alert">
     <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    {{session('success')}}
</div>
@endif


    <div class="row">
    <div class="col-6">
        <h3>معلومات الاتصال</h3>
    <p><h5>عن الموقع: </h5><span class="info"> {{$info->about}} </span></p>
    <p><h5>البريد الالكتروني: </h5><span class="info"> {{$info->email}} </span></p>
    <p><h5>رقم الهاتف: </h5><span class="info"> {{$info->phone}} </span></p>
    <p><h5>الفيس بوك: </h5><span class="info"> {{$info->facebook}} </span></p>
    <p><h5>تويتر: </h5><span class="info"> {{$info->twitter}} </span></p>
    <p><h5>لينكيد اين: </h5><span class="info"> {{$info->linkedin}} </span></p>

     

        
    </div>


    <div class="col-6">
           <h3> تعديل معلومات الاتصال </h3>
    <form method="POST" action="{{Route('admin.siteinfo.post')}}"> 
        @csrf
            <div class="form-group">
                <label for="txtAbout">عن الموقع</label>
                <input type="text" class="form-control" id="txtAbout" name="txtAbout" placeholder="عن الموقع" lder="موقع الظفيري">
            </div>

            <div class="form-row">
        
                <div class="form-group col-md-6">
                    <label for="txtEmail">البريد الالكتروني</label>
                    <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="البريد الالكتروني">
                </div>
                <div class="form-group col-md-6">
                    <label for="txtPhone">رقم الهاتف</label>
                    <input type="text" class="form-control" id="txtPhone" name='txtPhone' placeholder="رقم الهاتف">
                </div>
            </div>
            <div class="form-group">
                <label for="txtFacebook">الفيسبوك <i class="fab fa-facebook-square"></i></label>
                <input type="text" class="form-control" id="txtFacebook"  name="txtFace" placeholder="عنوان الفيسبوك">
            </div>
            <div class="form-group">
                <label for="txtTwitter">التويتر  <i class="fab fa-twitter"></i></label>
                <input type="text" class="form-control" id="txtTwitter" name="txtTwitter" placeholder="عنوان التويتر">
            </div>

            <div class="form-group">
                <label for="txtLinkedin">الينكيد ان  <i class="fab fa-linkedin"></i> </label>
                <input type="text" class="form-control" id="txtLinkedin" name="txtLinkedin" placeholder="عنوان الينكيد إن">
            </div>



        
            <button type="submit" class="btn btn-primary">حفظ</button>
        </form>

    </div>
 
    
</div>


</div>

<script>
window.setTimeout(function() {   
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
    
        $(this).remove(); 
    });
}, 6000);



</script>

@endsection