<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Company</h5>
                {!! menu('footer', 'footer-custom') !!}
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                {!! menu('quick-links', 'footer-custom') !!}
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Contact</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>{{ setting('site.location') }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ setting('site.phone_no') }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i><a
                        href="mailto:{{ setting('site.email') }}">{{ setting('site.email') }}</a></p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href="{{ setting('site.x') }}"><i
                            class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ setting('site.facebook') }}"><i
                            class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ setting('site.youtube') }}"><i
                            class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href="{{ setting('site.linkedin') }}"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="{{ route('home.page') }}">Job Entry</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="">dimond💚</a>
                </div>

            </div>
        </div>
    </div>
</div>
