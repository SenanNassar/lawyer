  <div class="row">
    <div class="col-1"></div>
    <div class="col-10 ">
  <div class="swiper-container">
          <div class="swiper-wrapper">
            @foreach ($emps as $emp)
            <div class="swiper-slide">
        
                <div class="card" style="width: 17rem; direction:rtl; text-align:center" data-aos="zoom-in">
                  <img class="card-img-top img-thumbnail card-style-img img-fluid p-0" src="{{ $emp->picture }}" >
                  <div class="card-body">
                    <div class="card-title" style="font-size: 14px; font-weight: bolder">{{$emp->name}}</div>
  
                    <li class="card-text" style="font-weight: bold; color:#15d6a1;padding-bottom:5px">{{$emp->job_title}}</li>
                    <p class="card-text trimText" style="font-family: myfont2;">
                       {{$emp->job_desc}}
                    </p>
                  </div>
                  
                   
                    <div class="card-footer">
            
                <!-- Facebook -->
            <a href="{{ $emp->cv }}" class="px-4" style="color:#15d6a1;"><i class="far fa-file  material-tooltip-email" data-toggle="tooltip" data-placement="top" title="CV"></i></a>
                <!-- Twitter -->
            <a href="mailto:{{ $emp->email }}"style="color:#15d6a1;"  title="{{ $emp->email }}"  class="px-4"><i class="fas fa-at material-tooltip-email" data-toggle="tooltip" data-placement="top" title="email"></i></a>
                <!-- Google + -->
                <a href="{{ $emp->linkedin }}" style="color:#15d6a1;"  class="px-4"><i class="fab fa-linkedin-in"></i></a>
            </div>
                </div>
                
              </div>
      
              @endforeach
         
          </div>
          <!-- Add Pagination -->
                <div><br><br></div>
          <div class="swiper-pagination mt-5"></div>
        </div>
        </div>
        <div class="col-1"></div>
        </div>
{{-- 
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

      <div class="carousel-inner row w-100 mx-auto">
          @foreach ($emps as $emp)
           
       @if ( $loop->iteration == 1)
              <div class="carousel-item col-md-4 active">
        @else
                <div class="carousel-item col-md-4">
       @endif
     
           <div class="card"  data-aos="zoom-in">
            <img class="card-img-top img-thumbnail card-style-img img-fluid p-0" src="{{ $emp->picture }}" >
           
            <div class="card-body text-center">
            <h6 class="card-title text-center" >{{$emp->name}}</h6>
            <p class="card-text text-muted  trimText">
                <span class="text-success">{{$emp->job_title}}</span><br><br>
               {{$emp->job_desc}}
            </p>               
            </div>
            <div class="card-footer">
            
                <!-- Facebook -->
            <a href="{{ $emp->cv }}" class="btn btn-light"><i class="far fa-file  material-tooltip-email" data-toggle="tooltip" data-placement="top" title="CV"></i></a>
                <!-- Twitter -->
            <a href="mailto:{{ $emp->email }}" class="btn btn-light" title="{{ $emp->email }}"><i class="fas fa-at material-tooltip-email" data-toggle="tooltip" data-placement="top" title="email"></i></a>
                <!-- Google + -->
                <a href="{{ $emp->linkedin }}" class="btn btn-light"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
        </div>

      
        </div>
        </div> 
        
      </div>
      <div class="container">
           <div class="col-12 text-center p-4">
            <a class="btn btn-outline-muted mx-1 prev" href="javascript:void(0)" title="Previous">
              <i class="fa fa-lg fa-chevron-left"></i>
            </a>
            <a class="btn btn-outline-muted mx-1 next" href="javascript:void(0)" title="Next">
              <i class="fa fa-lg fa-chevron-right"></i>
            </a>
          </div>
         
      </div>
      
     
     
  --}}