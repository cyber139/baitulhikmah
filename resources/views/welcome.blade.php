@extends('layouts.app1')

@section('content')
<div id="carouselExampleControls" class="carousel slide bs-slider box-slider" data-ride="carousel" data-pause="hover" data-interval="false" >
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleControls" data-slide-to="1"></li>
    <li data-target="#carouselExampleControls" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      {{-- <div id="home" class="first-section" style="background-image:url('{{asset('images/c-1.png')}}');"> --}}
      <div id="home" class="first-section" style="background-image:url('{{$banner->banner_image}}');">
        <div class="dtab">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-right">
                <div class="big-tagline">
                  <h2>{{$banner->title}}</h2>
                  <p class="lead">{!!$banner->teacher_notice!!} </p>
                    {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="hover-btn-new"><span>Read More</span></a> --}}
                </div>
              </div>
            </div><!-- end row -->            
          </div><!-- end container -->
        </div>
      </div><!-- end section -->
    </div>
    <div class="carousel-item">
      {{-- <div id="home" class="first-section" style="background-image:url('{{asset('img/c-3.jpg')}}');"> --}}
      <div id="home" class="first-section" style="background-image:url('{{$banner2->banner_image}}');">
        <div class="dtab">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-left">
                <div class="big-tagline">
                  <h2 data-animation="animated zoomInRight">{{$banner2->title}}</h2>
                  <p class="lead" data-animation="animated fadeInLeft">{!!$banner->teacher_notice!!} </p>
                    {{-- <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="hover-btn-new"><span>Read More</span></a> --}}
                </div>
              </div>
            </div><!-- end row -->            
          </div><!-- end container -->
        </div>
      </div><!-- end section -->
    </div>
    {{-- <div class="carousel-item">
      <div id="home" class="first-section" style="background-image:url('{{asset('img/c-2.jpg')}}');">
        <div class="dtab">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-center">
                <div class="big-tagline">
                  <h2 data-animation="animated zoomInRight"><strong>KAFAI</strong> BAITUL HIKMAH</h2>
                  <p class="lead" data-animation="animated fadeInLeft">1 IP included with each server 
                    Your Choice of any OS (CentOS, Windows, Debian, Fedora)
                    FREE Reboots</p>
                    <a href="#" class="hover-btn-new"><span>Contact Us</span></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="#" class="hover-btn-new"><span>Read More</span></a>
                </div>
              </div>
            </div><!-- end row -->            
          </div><!-- end container -->
        </div>
      </div><!-- end section -->
    </div> --}}
    <!-- Left Control -->
    <a class="new-effect carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="fa fa-angle-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>

    <!-- Right Control -->
    <a class="new-effect carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="fa fa-angle-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<div id="news" class="section lb">
  <div class="container">
      <div class="section-title text-center">
          <h3>Maklumat Terkini</h3>
          {{-- <p>Lorem ipsum dolor sit aet, consectetur adipisicing lit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p> --}}
      </div><!-- end title -->

      <div class="row">
          <div class="col-md-6 offset-md-3">
              <div class="message-box">
                  <ul class="nav nav-pills nav-stacked" id="myTabs">
                      <li><a class="active" href="#tab1" data-toggle="pill">Umum</a></li>
                      <li><a href="#tab2" data-toggle="pill">Guru</a></li>
                  </ul>
              </div>
          </div><!-- end col -->
      </div>

      <hr class="invis">

      <div class="row">
          <div class="col-md-12">
              <div class="tab-content">
                  <div class="tab-pane active fade show" id="tab1">
                      <div class="row text-center">
                          <div class="col-md-12">
                              <div class="pricing-table pricing-table-highlighted">
                                  <div class="pricing-table-header grd1">
                                      <h2>{{strtoupper($notice->title)}}</h2>
                                      {{-- <h3>per month</h3> --}}
                                  </div>
                                  <div class="pricing-table-space"></div>
                                  <div class="pricing-table-features text-center">
                                    {{-- <p><i class="fa fa-link"></i></p>          --}}
                                    {!! $notice->body !!}<br>
                                    @if (is_null($notice->post_image))
                                    
                                    <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="display: none">
                                    @else
                          
                                    <img class="card-img-top" src="{{$notice->post_image}}" alt="Card image cap" style="width: 50%">
                          
                                    @endif
                                      {{-- <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                      <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                      <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                      <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                      <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p> --}}
                                  </div>
                                  <div class="pricing-table-sign-up">
                                      {{-- <a href="#" class="hover-btn-new orange"><span>Order Now</span></a> --}}
                                  </div>
                              </div>
                          </div>
                      </div><!-- end row -->
                  </div><!-- end pane -->

                  <div class="tab-pane fade" id="tab2">
                      <div class="row text-center">
                        <div class="col-md-12">
                          <div class="pricing-table pricing-table-highlighted">
                              <div class="pricing-table-header grd1">
                                  <h2>NOTIS</h2>
                                  {{-- <h3>per month</h3> --}}
                              </div>
                              <div class="pricing-table-space"></div>
                              <div class="pricing-table-features">
                                <p><i class="fa fa-link"> </i> {!! $banner2->teacher_notice !!}</p>
                              </div>
                          </div>
                      </div>
                      </div><!-- end row -->
                  </div><!-- end pane -->
              </div><!-- end content -->
          </div><!-- end col -->
      </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end section -->

<div class="section cl">
  <div class="container">
    <div class="row text-left stat-wrap">
      <div class="col-md-4 col-sm-4 col-xs-12">
        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-study"></i></span>
        <p class="stat_count">{{$counter->student_no}}</p>
        <h3>Students</h3>
      </div><!-- end col -->

      <div class="col-md-4 col-sm-4 col-xs-12">
        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
        <p class="stat_count">{{$counter->teacher_no}}</p>
        <h3>Teachers</h3>
      </div><!-- end col -->

      <div class="col-md-4 col-sm-4 col-xs-12">
        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
        <p class="stat_count">{{$counter->year_no}}</p>
        <h3>Years</h3>
      </div><!-- end col -->
    </div><!-- end row -->
  </div><!-- end container -->
</div><!-- end section -->

<div id="overviews" class="section wb">
  <div class="container">
      <div class="section-title row text-center">
          <div class="col-md-8 offset-md-2">
              <h3>About</h3>
              <p class="lead">{{$about->desc}}</p>
          </div>
      </div><!-- end title -->
      <div class="row align-items-center">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="message-box">
                  <h4>KAFA INTEGRASI BAITUL HIKMAH</h4>
                  <h2>{{$about->title}}</h2>
                  <p>{{$about->body}}</p>
              </div><!-- end messagebox -->
          </div><!-- end col -->
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="post-media wow fadeIn">
                  <img src="{{asset('images/bg-1.jpg')}}" alt="" class="img-fluid img-rounded">
              </div><!-- end media -->
          </div><!-- end col -->
      </div>
  </div><!-- end container -->
</div><!-- end section -->

  <footer id="ct" class="footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8 col-xs-12">
                  <div class="widget clearfix">
                      <div class="widget-title">
                          <h3>Our Location</h3>
                      </div>
                      {{-- <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>    --}}
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.958939292839!2d101.72967061484223!3d2.828105697939936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdc711a29086e1%3A0xb56fd04f52e44532!2sKafai%20Baitulhikmah%20Taman%20Seroja!5e0!3m2!1sen!2smy!4v1610743519141!5m2!1sen!2smy" width="330" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

                      <div class="footer-right">
                        <ul class="footer-links-soi">
                          {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li> --}}
                          {{-- <li><a href="#"><i class="fa fa-github"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                          <li><a href="#"><i class="fa fa-pinterest"></i></a></li> --}}
                        </ul><!-- end links -->
                      </div>						
                  </div><!-- end clearfix -->
              </div><!-- end col -->

      
      
              <div class="col-lg-4 col-md-4 col-xs-12">
                  <div class="widget clearfix">
                      <div class="widget-title">
                          <h3>Contact Details</h3>
                      </div>

                      <ul class="footer-links">
                          <li><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></li>
                          <li><a href="{{$contact->web}}">{{$contact->web}}</a></li>
                          <li>{{$contact->address}}</li>
                          <li>{{$contact->contact_no}}</li>
                      </ul><!-- end links -->
                  </div><!-- end clearfix -->
              </div><!-- end col -->
      
          </div><!-- end row -->
      </div><!-- end container -->
  </footer><!-- end footer -->


@endsection


@section('footer')
<div class="copyrights">
  <div class="container">
      <div class="footer-distributed">
          <div class="footer-center">                   
              <p class="footer-company-name">All Rights Reserved. &copy; 2020 <a href="#">BAITUL HIKMAH</p>
          </div>
      </div>
  </div><!-- end container -->
</div><!-- end copyrights -->
@endsection
