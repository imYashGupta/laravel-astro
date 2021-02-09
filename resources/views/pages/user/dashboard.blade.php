@extends("layouts.user")
@section('content')
<div class="col-xl-6 col-lg-6 col-md-12">
                  <div class="main-center-data">
                      <h3 class="display-username">Hi, Kelechi</h3>
                     
                      <div class="row">
                          <div class="col-md-6">
                              <ul class="m-0 p-0">
                                  <li>
                                      <a href="user_order.html">
                                          <div class="show-section-details">
                                              <img src="src/user/img/medical.svg" alt="icon"/>
                                              <h4 class="main-headings">My Orders<br/>Records</h4>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="user_appointment.html" class="mt-15">
                                          <div class="show-section-details">
                                              <img src="src/user/img/booking.svg" alt="icon"/>
                                              <h4 class="main-headings">My Appointment<br/>Calendar</h4>
                                          </div>
                                      </a>
                                  </li>
                                  <li>
                                      <a href="user_order.html" class="mt-15">
                                          <div class="show-section-details">
                                              <img src="src/user/img/documents.svg" alt="icon"/>
                                              <h4 class="main-headings">My<br/>Download</h4>
                                          </div>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                          <div class="col-md-6">
                              <ul class="m-0 p-0">
                                  <li>
                                          <div class="doctor-outer-block">
                                              <img src="src/user/img/user-profile.jpg" alt="user"/>
                                              <h4 class="main-headings">Alice Brown</h4>
                                              <div class="chat-messages mt-15">
                                                  <img src="src/user/img/chat2.svg" alt="chat"/>
                                               Total Ticket  2
                                              </div>
                                              <div class="click-action mt-30">
                                                  <a href="user_ticket.html">Ticket</a>
                                              </div>
                                          </div>
                                  </li>
                                  <li>
                                      <a href="../faq.php" class="mt-15">
                                          <div class="show-section-details">
                                              <img src="src/user/img/ask2.svg" alt="icon"/>
                                              <h4 class="main-headings">Quick FAQ</h4>
                                          </div>
                                      </a>
                                  </li>
                              </ul>
                          </div>
                          <!-- <div class="col-md-4">
                              <ul class="m-0 p-0">
                                  <li>
                                          <div class="doctor-outer-block gree-bg">
                                              <img src="src/user/img/free-trial.svg" alt="trial"/>
                                              <h4 class="main-headings">Free Trial</h4>
                                              <span class="short-description">Your free subscription plan expire in 3 weeks</span>
                                              <div class="click-action mt-30">
                                                  <a href="#">Upgrade now!</a>
                                              </div>
                                          </div>
                                  </li>
                              </ul>
                          </div> -->
                      </div>
                      <!-- <div class="looking-for-outer mt-15">
                          <div class="looking-for1 hover-effect-box round-crn">
                              <span>What are you looking for?</span>
                              <h4 class="mt-15">Telemedicine Services</h4>
                              <div class="see-all mt-15">
                                  <a href="#">Explore all <img src="src/user/img/arrow-forward.svg" alt="arrow-forward"></a>
                              </div>
                          </div>
                          <div class="looking-for2 pd-20-30 hover-effect-box round-crn">
                              <span>What are you looking for?</span>
                              <h4 class="mt-15">Concierge Services</h4>
                              <div class="see-all mt-15">
                                  <a href="#">Explore all <img src="src/user/img/arrow-forward.svg" alt="arrow-forward"></a>
                              </div>
                          </div>
                      </div> -->
                  </div>
              </div>
              <div class="col-xl-3 col-lg-3 col-md-12">
                  <div class="blog-stories">
                      <h4 class="blog-heading">Blog stories</h4>
                      <ul class="m-0 p-0">
                          <li class="mt-15">
                              <a href="../blog_single.php">
                                  <div class="blog-feature-image">
                                      <img src="src/user/img/blog-1.svg" alt="blog"/>
                                  </div>
                                  <div class="blog-extract short-description">
                                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                                  </div>
                              </a>
                          </li>
                          <li class="mt-15">
                              <a href="../blog_single.php">
                                  <div class="blog-feature-image">
                                      <img src="src/user/img/blog-2.svg" alt="blog"/>
                                  </div>
                                  <div class="blog-extract short-description">
                                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                                  </div>
                              </a>
                          </li>
                          <li class="mt-15">
                              <a href="../blog_single.php">
                                  <div class="blog-feature-image">
                                      <img src="src/user/img/blog-3.svg" alt="blog"/>
                                  </div>
                                  <div class="blog-extract short-description">
                                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                                  </div>
                              </a>
                          </li>
                          <li class="mt-15">
                              <a href="../blog_single.php">
                                  <div class="blog-feature-image">
                                      <img src="src/user/img/blog-4.svg" alt="blog"/>
                                  </div>
                                  <div class="blog-extract short-description">
                                      Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia.
                                  </div>
                              </a>
                          </li>
                      </ul>
                      <div class="see-all mt-30">
                          <a href="../blog.php">See all Stories <img src="src/user/img/arrow-forward.svg" alt="arrow-forward"/></a>
                      </div>
                  </div>
                  <div class="advertisment mt-15">
                      <img src="src/user/img/ads.svg" alt="ads" class="img-fluid" />
                  </div>
              </div>  
@endsection