@extends('pages.main')
@section('content')


    <div class="page_title_ctn">
        <div class="container">
            <h2>Contact</h2>

            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><span>Contact Us</span></li>
            </ol>

        </div>
    </div>

    <!-- Contact Section -->

    <section class="contactus-one" id="contactus"><!-- Section id-->
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6">
                    {{--<div class="map">--}}
                        <div style="width: 100%"><iframe width="100%" height="600" src="https://maps.google.com/maps?width=100%&amp;height=600&amp;hl=en&amp;q=Teku%2C%20Kathmandu+(Tas%20Technology)&amp;ie=UTF8&amp;t=&amp;z=14&amp;iwloc=B&amp;output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"><a href="https://www.maps.ie/create-google-map/">Google map generator</a></iframe></div><br />
                {{--</div>--}}
                </div>
                <div class=" col-md-5 col-sm-6">
                    <div class="contact-block">
                        <div class="dart-headingstyle-one dart-mb-20">  <!--Style 1-->
                            <h2 class="dart-heading">Contact US</h2>
                        </div>

                        <div class="contact-form"><!-- contact form -->
                            <form class="row" action="send_email.php" id="contact" name="contact" method="post" >
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your Name" required >
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" name="InputEmail" id="InputEmail" placeholder="Your Email" required >
                                </div>
                                <div class="form-group col-md-12">
                                    <input type="text" class="form-control" name="InputWeb" id="InputWeb" placeholder="Web Site (Optional)" >
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea class="form-control" name="InputMessage" id="InputMessage" rows="4" placeholder="Message" required  ></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button name="submit" type="submit" class="btn normal-btn dart-btn-xs">SEND MESSAGE</button>
                                </div>
                            </form>
                        </div>

                        <hr>

                        <div class=" row contact-info">
                            <div class="col-md-12 col-sm-12">
                                <p class="addre"><i class="fa fa-map-marker"></i>Teku, Kathmandu</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <p class="phone-call"><i class="fa fa-phone"></i> +977-1-4243889</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <p class="mail-id"><i class="fa fa-envelope"></i>sales@tasintech.com</p>
                                <p class="mail-id"><i class="fa fa-envelope"></i>www.tasintech.com</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
