@extends('pages.main')
@section('content')


    <div class="page_title_ctn">
        <div class="container">
            <h2>Services</h2>

            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">services</a></li>
                <li class="active"><span>Web Application Development</span></li>
            </ol>

        </div>
    </div>

    <section id="fullwidth_3" class="fullWidthThree">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-5">
                    <h2>Web Application Development</h2>
                    <ul class="list-style-1">
                        <li>Our Web application development team (re)designs and develops websites and
                            applications, providing full lifecycle support. We employ proven processes
                            and methodologies to ensure a consistent environment for seamless,
                            predictable delivery worldwide, reducing your development costs by
                            leveraging global resources.</li>
                        <li>We deliver designs and solutions that transform complete range of business
                            processes. We combine the best of emerging technologies with valuable
                            components of legacy systems. We use our expertise and accelerate the
                            development process with our Rapid Application development methodology
                            (RAD) and use of the re-usable components from our industrial strength
                            component library as well as proven open source components.</li>
                        <li>T.A.S Technologies develops web sites and applications on a variety of
                            platforms. We work with our clients and select the right technology based
                            on client and project requirements..</li>
                    </ul>
                </div>
                <div class="col-md-7 col-sm-7">
                    <img class="img-responsive" src="{{asset('images/img-4.png')}}" alt="">
                </div>

            </div>
        </div>
    </section>

@endsection
