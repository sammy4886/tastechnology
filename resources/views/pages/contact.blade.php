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
                    <div class="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d387145.8662688941!2d-74.2581880279189!3d40.70531105474914!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sin!4v1476860298090" height="580" ></iframe>
                    </div>
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
                                <p class="addre"><i class="fa fa-map-marker"></i>10, Lorem Ipsum, Dummy Road, NY 487954, USA</p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <p class="phone-call"><i class="fa fa-phone"></i> <a href="tel:+10484579845">+12 345 789 1234</a></p>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <p class="mail-id"><i class="fa fa-envelope"></i>info@divineart.com</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
