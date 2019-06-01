@extends('frontend.master.master')
@section('content')


    <!-- The whole page content goes here -->



    <!--  category -->
    <section class="contact_us py-5">
    <div class="container">
        <div class="row box-shadow s">
            <div class="col-md-6">
                <div class="heading">
                    <h2>Direct Contact Us</h2>
                </div>
                <div class="contact_us-ul">
                    <ul>
                        <li>Phone: {{$contact->last()->phone}}</li>
                        <li> Toll Free: {{$contact->last()->toll}}</li>
                        <li>Email: {{$contact->last()->email}}</li>
                    </ul>
                </div>
                <div class="contact_us-map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.0627808309896!2d85.3438733143841!3d27.68445443310604!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bfe9772bed%3A0x7e9a6bc711b74c0b!2sNext+Nepal!5e0!3m2!1sen!2snp!4v1551083422604"
                            width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>
            <div class="col-md-6  ">
                <div class="form_container ">
                    <div class="row">
                        <div class="col-sm-12 mb">
                            <div class="heading ">
                                <h2>Contact Form</h2>
                            </div>
                            <p>
                                Please send your message below. We will get back to you at the earliest!
                            </p>
                        </div>
                    </div>

                    <form role="form" method="post" action="{{route('show-contact')}}" >
                     @csrf
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="message">
                                    Message:</label>
                                <textarea class="form-control" type="textarea" id="message" name="message"
                                          maxlength="6000"
                                          rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name">
                                    Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required="">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="email">
                                    Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required="">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="uk-button view-cart">Send →</button>
                            </div>
                        </div>

                    </form>
                    <div id="success_message" style="width:100%; height:100%; display:none; ">
                        <h3>Posted your message successfully!</h3>
                    </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; ">
                        <h3>Error</h3>
                        Sorry there was an error sending your form.

                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
    <!-- footer -->

@endsection
