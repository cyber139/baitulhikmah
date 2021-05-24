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
      <div id="home" class="first-section" style="background-image:url('{{asset('images/c-1.png')}}');">
        <div class="dtab">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-right">
                <div class="big-tagline">
                  <h2><strong>KAFAI </strong> Baitul Hikmah</h2>
                  <p class="lead">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
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
      <div id="home" class="first-section" style="background-image:url('{{asset('img/c-3.jpg')}}');">
        <div class="dtab">
          <div class="container">
            <div class="row">
              <div class="col-md-12 col-sm-12 text-left">
                <div class="big-tagline">
                  <h2 data-animation="animated zoomInRight">KAFAI <strong>BAITUL HIKMAH</strong></h2>
                  <p class="lead" data-animation="animated fadeInLeft">With Landigoo responsive landing page template, you can promote your all hosting, domain and email services. </p>
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
                          {{-- <div class="col-md-4">
                              <div class="pricing-table pricing-table-highlighted">
                                  <div class="pricing-table-header grd1">
                                      <h2>$59</h2>
                                      <h3>per month</h3>
                                  </div>
                                  <div class="pricing-table-space"></div>
                                  <div class="pricing-table-features">
                                      <p><i class="fa fa-envelope-o"></i> <strong>150</strong> Email Addresses</p>
                                      <p><i class="fa fa-rocket"></i> <strong>65GB</strong> of Storage</p>
                                      <p><i class="fa fa-database"></i> <strong>60</strong> Databases</p>
                                      <p><i class="fa fa-link"></i> <strong>30</strong> Domains</p>
                                      <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                  </div>
                                  <div class="pricing-table-sign-up">
                                      <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                  </div>
                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="pricing-table pricing-table-highlighted">
                                  <div class="pricing-table-header grd1">
                                      <h2>$85</h2>
                                      <h3>per month</h3>
                                  </div>
                                  <div class="pricing-table-space"></div>
                                  <div class="pricing-table-features">
                                      <p><i class="fa fa-envelope-o"></i> <strong>250</strong> Email Addresses</p>
                                      <p><i class="fa fa-rocket"></i> <strong>125GB</strong> of Storage</p>
                                      <p><i class="fa fa-database"></i> <strong>140</strong> Databases</p>
                                      <p><i class="fa fa-link"></i> <strong>60</strong> Domains</p>
                                      <p><i class="fa fa-life-ring"></i> <strong>24/7 Unlimited</strong> Support</p>
                                  </div>
                                  <div class="pricing-table-sign-up">
                                      <a href="#" class="hover-btn-new orange"><span>Order Now</span></a>
                                  </div>
                              </div>
                          </div> --}}
                      </div><!-- end row -->
                  </div><!-- end pane -->

                  <div class="tab-pane fade" id="tab2">
                      <div class="row text-center">
                        <div class="col-md-12">
                          <div class="pricing-table pricing-table-highlighted">
                              <div class="pricing-table-header grd1">
                                  <h2>NOTIS LAPOR DIRI</h2>
                                  {{-- <h3>per month</h3> --}}
                              </div>
                              <div class="pricing-table-space"></div>
                              <div class="pricing-table-features">
                                <p><i class="fa fa-link"></i>DIMAKLUMKAN BAHAWA GURU-GURU PERLU MELAPOR DIRI PADA <strong>1 JANUARI 2021</strong>SELARAS DENGAN SARANAN PEJABAT KESIHATAN BANDAR BARU SALAK TINGGI 
                                  BAGI MENGAWAL RISIKO MEREBAKNYA APA-APA PENYAKIT DI BAWAH AKTA PENCEGAHAN DAN PENGAWALAN PENYAKIT BERJANGKIT 1988.PENGETUA SEKOLAH</p>
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
        <p class="stat_count">12000</p>
        <h3>Students</h3>
      </div><!-- end col -->

      <div class="col-md-4 col-sm-4 col-xs-12">
        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-online"></i></span>
        <p class="stat_count">28</p>
        <h3>Teachers</h3>
      </div><!-- end col -->

      <div class="col-md-4 col-sm-4 col-xs-12">
        <span data-scroll class="global-radius icon_wrap effect-1 alignleft"><i class="flaticon-years"></i></span>
        <p class="stat_count">50</p>
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
              <p class="lead">Lorem Ipsum dolroin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem!</p>
          </div>
      </div><!-- end title -->
  
      <div class="row align-items-center">
          <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="message-box">
                  <h4>KAFA INTEGRASI BAITUL HIKMAH</h4>
                  <h2>Selamat Datang</h2>
                  <p>Quisque eget nisl id nulla sagittis auctor quis id. Aliquam quis vehicula enim, non aliquam risus. Sed a tellus quis mi rhoncus dignissim.</p>

                  <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis montes, nascetur ridiculus mus. Sed vitae rutrum neque. </p>

                  {{-- <a href="#" class="hover-btn-new orange"><span>Learn More</span></a> --}}
              </div><!-- end messagebox -->
          </div><!-- end col -->
  
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="post-media wow fadeIn">
                  <img src="{{asset('images/bg-1.jpg')}}" alt="" class="img-fluid img-rounded">
              </div><!-- end media -->
          </div><!-- end col -->
</div>
{{-- <div class="row align-items-center">
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="post-media wow fadeIn">
                  <img src="images/about_03.jpg" alt="" class="img-fluid img-rounded">
              </div><!-- end media -->
          </div><!-- end col -->
  
  <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
              <div class="message-box">
                  <h2>The standard Lorem Ipsum passage, used since the 1500s</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

                  <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum.</p>

                  <a href="#" class="hover-btn-new orange"><span>Learn More</span></a>
              </div><!-- end messagebox -->
          </div><!-- end col -->
  
      </div><!-- end row --> --}}
  </div><!-- end container -->
</div><!-- end section -->


 
{{-- 
  <div class="all-title-box">
		<div class="container text-center">
			<h1>Contact<span class="m_1">Lorem Ipsum dolroin gravida nibh vel velit.</span></h1>
		</div>
	</div>
	
    <div id="contact" class="section wb">
        <div class="container">
            <div class="section-title text-center">
                <h3>Need Help? Sure we are Online!</h3>
                <p class="lead">Let us give you more details about the special offer website you want us. Please fill out the form below. <br>We have million of website owners who happy to work with us!</p>
            </div><!-- end title -->

            <div class="row">
                <div class="col-xl-6 col-md-12 col-sm-12">
                    <div class="contact_form">
                        <div id="message"></div>
                        <form id="contactform" class="" action="contact.php" name="contactform" method="post">
                            <div class="row row-fluid">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="Your Phone">
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea class="form-control" name="comments" id="comments" rows="6" placeholder="Give us more details.."></textarea>
                                </div>
                                <div class="text-center pd">
                                    <button type="submit" value="SEND" id="submit" class="btn btn-light btn-radius btn-brd grd1 btn-block">Get a Quote</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- end col -->
				<div class="col-xl-6 col-md-12 col-sm-12">
					<div class="map-box">
						<div id="custom-places" class="small-map"></div>
					</div>
				</div>
            </div><!-- end row -->
        </div><!-- end container -->
    </div><!-- end section --> --}}


  <footer id="ct" class="footer">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8 col-xs-12">
                  <div class="widget clearfix">
                      <div class="widget-title">
                          <h3>Our Location</h3>
                      </div>
                      {{-- <p> Integer rutrum ligula eu dignissim laoreet. Pellentesque venenatis nibh sed tellus faucibus bibendum. Sed fermentum est vitae rhoncus molestie. Cum sociis natoque penatibus et magnis dis montes.</p>    --}}
                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.958939292839!2d101.72967061484223!3d2.828105697939936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cdc711a29086e1%3A0xb56fd04f52e44532!2sKafai%20Baitulhikmah%20Taman%20Seroja!5e0!3m2!1sen!2smy!4v1610743519141!5m2!1sen!2smy" width="400" height="200" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

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
                          <li><a href="mailto:baitulhikmah@gmail.com">baitulhikmah@gmail.com</a></li>
                          <li><a href="#">www.baitulhikmah.com</a></li>
                          <li>Kafai Baitulhikmah Taman Seroja<br>
                            No. 22, Jalan Seroja 2, Taman Seroja, 43900 Sepang, Selangor</li>
                          <li>+603 8376 6284</li>
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
