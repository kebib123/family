
<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6 ">

                <div class="footer_title">
                    <div class="heading">
                        <h3>Follow Us</h3>
                    </div>
                </div>



                <div class="footer_list">
                    <ul>
                        <li class="footer_list--item1 d-flex align-items-center social_icons">
                            <a href="{{$med->last()->facebook}}" uk-icon="facebook" class="facebook"></a>
                            <a href="{{$med->last()->google}}" uk-icon="google-plus" class="google-plus"></a>
                            <a href="{{$med->last()->twitter}}" uk-icon="twitter" class="twitter"></a>
                            <a href="{{$med->last()->instagram}}" uk-icon="instagram" class="instagram"></a>
                        </li>

                        <li class="footer_list--item1">{{$contact->last()->phone}}</li>
                        <li class="footer_list--item1"> {{$contact->last()->address}}</li>
                        <li class="footer_list--item1"> {{$contact->last()->website}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 ">
                <div class="footer_title">
                    <div class="heading">
                        <h3>Quick Links</h3>
                    </div>
                </div>
                <div class="footer_list">
                    <ul>
                        <li class="footer_list--item"><a href="{{route('contact')}}">contact us</a></li>
                        <li class="footer_list--item"><a href="{{route('about')}}">about us</a></li>
                        <li class="footer_list--item"><a href="{{route('faq')}}">faq</a></li>
                    </ul>
                </div>
            </div>
            <div class=" col-md-6 col-sm-12">
                <div class="footer_title">
                    <div class="heading">
                        <h3>Stay Connected</h3>
                    </div>
                </div>
                <div class="footer_list ">
                    <form action="{{route('show-subscriber')}}" class="d-flex pb-3 mb-3" method="post">
                        @csrf
                        <input type="email" name="email" class="uk-input">
                        <button class="checkout uk-button" type="submit">Join</button>
                    </form>
                </div>
                <div class="footer_title">
                    <div class="heading">
                        <h3>About Us</h3>
                    </div>
                </div>
                <div class="footer_list">
                {!! \Illuminate\Support\Str::words($about->last()->about,'40') !!}

                </div>
            </div>
        </div>
    </div>
</footer>
<footer id="mini-footer">
    <p>Powered by <a href="" style="color: #d3232a"> Next Nepal</a></p>
</footer>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<!-- UIkit JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/js/uikit.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/uikit/3.0.0-rc.16/js/uikit-icons.min.js"></script>

<script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
<!-- Owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<!-- metis menu -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/metisMenu/2.7.8/metisMenu.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- custom scroll -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script src="{{url('js/app.min.js')}}"></script>
<script src="{{url('js/custom.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(\Illuminate\Support\Facades\Session::has('success'))
    toastr.success("{{\Illuminate\Support\Facades\Session::get('success')}}");
    @endif
    @if(\Illuminate\Support\Facades\Session::has('error'))
    toastr.error("{{\Illuminate\Support\Facades\Session::get('error')}}");
    @endif

</script>

</body>
</html>