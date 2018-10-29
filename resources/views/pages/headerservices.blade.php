<nav class="navbar navbar-default navbar-sticky divinnav">

    <div class="navbar-header">
        <a class="navbar-brand" href="#"><img src="{{asset('images/tech.jpg')}}" class="logo" alt=""></a>
    </div>

    <div class="container" style="margin-right: -15px;">

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
    <!-- End Side Menu -->
</nav>
