<div class="table-responsive">
  <table class="table table-hover table-light table-striped">
    <thead>
      <tr class="thead-dark">
        <th>الرقم</th>
        <th>الاسم</th>
         <th>المسمى الوظيفي</th>
         <th>الوصف الوظيفي</th>
        <th>البريد الالكتروني</th>
        {{-- <th>السيرة الذاتية</th>
        <th>لينكيد ان</th>
        <th>الصورة</th> --}}
        <th>العمليات</th>

      </tr>
    </thead>
    <tbody>
        @foreach ($data as $emp)
         <tr>

        <td>{{ $emp->id }}</td>
        <td style="width: 25%">{{ $emp->name }}</td>
         <td style="">{{ $emp->job_title }}</td>
           <td style="">{{ $emp->job_desc }}</td>
        <td>{{ $emp->email }}</td>
        {{-- <td>{{ $emp->cv }}</td>
        <td>{{ $emp->linkedin }}</td>
        <td>{{ $emp->picture }}</td> --}}
        <td style="width: 11%">
             <div style="margin:auto">
                 <a class="btn btn-info text-white" id="edit-emp" data-toggle="modal" data-id='{{$emp->id }}'> <i class="fas fa-expand-arrows-alt"></i></a>
                 
                 <meta name="csrf-token" content="{{ csrf_token() }}">

                 <a id="delete-emp" data-id='{{$emp->id}}' class="btn btn-danger delete-cons text-white"> <i class="far fa-trash-alt"></i></a></div>



        </td>

         </tr>
        @endforeach
     
   
    </tbody>
  </table>
</div>
  {!! $data->render() !!}
