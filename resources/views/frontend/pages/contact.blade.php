@extends('frontend.layouts.app')

@section('title', 'Contact')

@section('js')
    <script src="https://www.google.com/recaptcha/api.js"></script>


@endsection

@section('content')

    <div class="container-xxl py-5">
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Contact For Any Query</h1>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4">
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-map-marker-alt text-primary"></i>
                                </div>
                                <span>{{ setting('site.location') }}</span>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.3s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-envelope-open text-primary"></i>
                                </div>
                                <a href="mailto:{{ setting('site.email') }}"><span>{{ setting('site.email') }}</span></a>
                            </div>
                        </div>
                        <div class="col-md-4 wow fadeIn" data-wow-delay="0.5s">
                            <div class="d-flex align-items-center bg-light rounded p-4">
                                <div class="bg-white border rounded d-flex flex-shrink-0 align-items-center justify-content-center me-3"
                                    style="width: 45px; height: 45px;">
                                    <i class="fa fa-phone-alt text-primary"></i>
                                </div>
                                <span>{{ setting('site.phone_no') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <iframe class="position-relative rounded w-100 h-100"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3532.9239891225047!2d85.3065273751183!3d27.688744076193093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb190cc1c6018f%3A0x1e5e52d4c6db97e7!2skrizmatic%20digital%20solution!5e0!3m2!1sen!2snp!4v1752389147467!5m2!1sen!2snp"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-md-6">
                    <div class="wow fadeInUp" data-wow-delay="0.5s">
                        <form action="{{ route('contact.mail') }}" method="POST" id="demo-form">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" name="name" class="form-control" id="name"
                                            placeholder="Your Name" value="{{ old('name') }}" required minlength="4"
                                            maxlength="30" />
                                        <small id="nameError" style="color:red;">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                        <label for="name">Your Name</label>
                                    </div>
                                    {{-- @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror --}}
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="email" name="email" class="form-control" id="email"
                                            placeholder="Your Email" value="{{ old('email') }}" required />
                                        <small id="emailError" style="color:red;">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                        <label for="email">Your Email</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <input type="text" name="subject" class="form-control" id="subject"
                                            placeholder="Subject" value="{{ old('subject') }}" required />
                                        <small id="subjectError" style="color:red;">
                                            @error('subject')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                        <label for="subject">Subject</label>
                                    </div>

                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="message" placeholder="Leave a message here" id="message" style="height: 150px"
                                            required>{{ old('message') }}</textarea>
                                        <small id="messageError" style="color:red;">
                                            @error('message')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                        <label for="message">Message</label>

                                    </div>
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }} </span>
                                    @endif

                                    {{-- <input type="hidden" name="g-recaptcha-response" id="g-recaptcha-response" value="{{env('GOOGLE_RECAPTCHA_KEY')}}"/> --}}



                                    <div class="col-12">
                                        {{-- <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button> --}}
                                        <button class=" btn btn-primary w-100 py-3 g-recaptcha" type="submit"
                                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}" data-callback='onSubmit'
                                            data-action='submit'>Submit</button>
                                    </div>

                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function onSubmit(token) {
            document.getElementById("demo-form").submit();
        }



        // Get inputs and error elements
        const nameInput = document.getElementById('name');
        const emailInput = document.getElementById('email');
        const subjectInput = document.getElementById('subject');
        const messageInput = document.getElementById('message');

        const nameError = document.getElementById('nameError');
        const emailError = document.getElementById('emailError');
        const subjectError = document.getElementById('subjectError');
        const messageError = document.getElementById('messageError');

        // Validation functions
        function validateName() {
            const value = nameInput.value.trim();
            if (value.length < 4) {
                nameError.textContent = 'Name must be at least 4 characters.';
                return false;
            } else if (value.length > 30) {
                nameError.textContent = 'Name cannot exceed 30 characters.';
                return false;
            }
            nameError.textContent = '';
            return true;
        }

        function validateEmail() {
            const value = emailInput.value.trim();
            const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
            if (!pattern.test(value)) {
                emailError.textContent = 'Enter a valid email address';
                return false;
            }
            emailError.textContent = '';
            return true;
        }

        function validateSubject() {
            const value = subjectInput.value.trim();
            if (value.length < 4) {
                subjectError.textContent = 'Subject must be at least 4 characters';
                return false;
            }
            subjectError.textContent = '';
            return true;
        }

        function validateMessage() {
            const value = messageInput.value.trim();
            if (value === '') {
                messageError.textContent = 'Message is required';
                return false;
            }
            messageError.textContent = '';
            return true;
        }

        // Attach real-time validation
        nameInput.addEventListener('input', validateName);
        emailInput.addEventListener('input', validateEmail);
        subjectInput.addEventListener('input', validateSubject);
        messageInput.addEventListener('input', validateMessage);

        // Form submission validation
        document.getElementById('demo-form').addEventListener('submit', function(e) {
            const isNameValid = validateName();
            const isEmailValid = validateEmail();
            const isSubjectValid = validateSubject();
            const isMessageValid = validateMessage();

            if (!isNameValid || !isEmailValid || !isSubjectValid || !isMessageValid) {
                e.preventDefault();
            }
        });
    </script>



@endsection
