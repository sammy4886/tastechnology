<!-- Start Nav bar -->
<nav class="navbar navbar-default navbar-fixed dark no-background divinnav">

    <!-- Start Top Search -->
    <div class="top-search">
        <div class="container-fluid">
            <div class="input-group">
                <span class="input-group-addon"><i class="ti-search"></i></span>
                <input type="text" class="form-control" placeholder="Search">
                <span class="input-group-addon close-search"><i class="ti-close"></i></span>
            </div>
        </div>
    </div>
    <!-- End Top Search -->

    <div class="container-fluid">
        <!-- Start Header Navigation -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                <i class="ti-align-left"></i>
            </button>
            <a class="navbar-brand" href="index-47.html">
                <img src="{{asset('images/tech.jpg')}}" srcset="{{asset('images/tech.jpg')}}" class="logo logo-display" alt="Divine">
                <img src="{{asset('images/tech.jpg')}}" srcset="{{asset('images/tech.jpg')}}" class="logo logo-scrolled" alt="Divine">

            </a>
        </div>
        <!-- End Header Navigation -->

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="navbar-menu">
            <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                <li><a href="{{url('/')}}">Home</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown" >Services</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('/web')}}">Web</a></li>
                        <li><a href="{{url('/business')}}">Business</a></li>
                        <li><a href="{{url('/portal')}}">Portal</a></li>
                    </ul>
                </li>
                <li><a href="{{url('/software')}}">Software</a></li>
                <li><a href="{{url('/contact')}}">Contact Us</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>
<!-- End Nav bar -->