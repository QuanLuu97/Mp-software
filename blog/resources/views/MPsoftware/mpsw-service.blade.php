@extends('template.master')

@section('content')
<div class="mpsw-about-title mpsw-jp-service bg-case-studies">
  <div class="container">
    <div class="content-page-title">
      <p class="sub-title"><a href="#">Home</a> / <a href="#">{{ $service->name }}</a></p>
      <h1 class="page-title">SERVICES</h1>
    </div>
  </div>
</div>
<!-- Ms content -->
<!-- content -->
<div class="mpsw-content">
  <div class="mpsw-content-case">
    <div class="container">
      <h1 class="mpsw-heading text-center">
        {{ $service->name }}
      </h1>
      <div class="sep"></div>
    </div>
  </div>
  <div class="mpsw-our-company">
    <div class="container">
      <div class="content-left col-sm-12 col-md-6 wow slideInLeft" data-wow-delay="0" style="visibility: visible; animation-name: slideInLeft;">
        {!! $service->content !!}
      </div>
      <div class="content-right col-sm-12 col-md-6 wow fadeIn" data-wow-delay="0" style="visibility: visible; animation-name: fadeIn;">
        <img src="dist/images/{{ json_decode($service->images)[0] }}" alt="Services">
      </div>

    </div>
  </div>
  <div class="mpsw-service">
    <div class="container">
      <h1 class="have-bg mpsw-heading text-center">
        {{ $service->name }}
      </h1>
      <div class="sep"></div>
      <div class="list-services row">
        <div class="service-item col-sm-6 col-md-4 wow slideInLeft" data-wow-delay="0" style="visibility: visible; animation-name: slideInLeft;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service1.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Testing and QA
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>GUI testing</li>
                  <li>Functional testing</li>
                  <li>Performance testing</li>
                  <li>Security testing</li>
                  <li>Regression testing</li>
                  <li>Localization</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-item col-sm-6 col-md-4 wow slideInUp" data-wow-delay="0" style="visibility: visible; animation-name: slideInUp;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service2.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Mobility
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>Mobile Application Development</li>
                  <li>Social APIs Integration</li>
                  <li>Mobile Advertising</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-item col-sm-6 col-md-4 wow slideInRight" data-wow-delay="0" style="visibility: visible; animation-name: slideInRight;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service3.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Application Development
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>Application Migration</li>
                  <li>Application Maintenance</li>
                  <li>Application Integration</li>
                  <li>Migrate from legacy app to cloud</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="service-item col-sm-6 col-md-4 wow slideInLeft" data-wow-delay="0" style="visibility: visible; animation-name: slideInLeft;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service4.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Web Solutions
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>Web Development</li>
                  <li>Web App Development</li>
                  <li>Web Testing and Maintenance</li>
                  <li>Web Diagnosis/ Operation</li>
                  <li>CMS</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-item col-sm-6 col-md-4 wow slideInUp" data-wow-delay="0" style="visibility: visible; animation-name: slideInUp;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service5.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Design
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>UX/UI Design</li>
                  <li>Frontend Development</li>
                  <li>Graphics Design</li>
                </ul>
              </div>
            </div>
          </div>
        </div>

        <div class="service-item col-sm-6 col-md-4 wow slideInRight" data-wow-delay="0" style="visibility: visible; animation-name: slideInRight;">
          <div class="service-content">
            <div class="content-left">
              <div class="icon-service"><img src="dist/images/i-service6.jpg" alt=""></div>
            </div>
            <div class="content-right">
              <div class="service-text">
                <h2 class="servive-title">
                  <a href="#">
                    Enterprise Solution
                  </a>
                </h2>
                <ul class="list-normal">
                  <li>SAP Business One</li>
                  <li>ERP/ CRM</li>
                  <li>DMS/ SCM</li>
                  <li>Reporting/ Analytics</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection