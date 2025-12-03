@extends('frontend.layouts.master')

@section('page-title')
    {{ $settings->site_name }} | Contact
@endsection

@section('content')
    <!--============================BREADCRUMB START==============================-->
    <section id="wsus__breadcrumb">
        <div class="wsus_breadcrumb_overlay">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h4>contact us</h4>
                        <ul>
                            <li><a href="{{ route('home') }}">home</a></li>
                            <li><a href="javascript:;">contact us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================BREADCRUMB END==============================-->


    <!--============================CONTACT PAGE START==============================-->
    <section id="wsus__contact">
        <div class="container">
            <div class="wsus__contact_area">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="row">
                            @if ($settings->contact_email)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="fal fa-envelope"></i>
                                        <h5>mail address</h5>
                                        <a href="mailto:{{ $settings->contact_email }}">{{ $settings->contact_email }}</a>
                                        <span><i class="fal fa-envelope"></i></span>
                                    </div>
                                </div>
                            @endif
                            @if ($settings->contact_phone)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="far fa-phone-alt"></i>
                                        <h5>phone number</h5>
                                        <a href="macallto:{{ $settings->contact_phone }}">{{ $settings->contact_phone }}</a>
                                        <span><i class="far fa-phone-alt"></i></span>
                                    </div>
                                </div>
                            @endif
                            @if ($settings->contact_address)
                                <div class="col-xl-12">
                                    <div class="wsus__contact_single">
                                        <i class="fal fa-map-marker-alt"></i>
                                        <h5>contact address</h5>
                                        <a href="javascript:;">{{ $settings->contact_address }}</a>
                                        <span><i class="fal fa-map-marker-alt"></i></span>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-8">
                        <div class="wsus__contact_question">
                            <h5>Send Us a Message</h5>
                            <form id="contact-form">
                                <div class="row g-4">
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" name="name" placeholder="Your Name" class="mb-0">
                                        </div>
                                        <div class="text-danger name"></div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="email" name="email" placeholder="Email" class="mb-0">
                                        </div>
                                        <div class="text-danger email"></div>
                                    </div>

                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <input type="text" name="subject" placeholder="Subject" class="mb-0">
                                        </div>
                                        <div class="text-danger subject"></div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="wsus__con_form_single">
                                            <textarea name="message" cols="3" rows="5" placeholder="Message" class="mb-0"></textarea>
                                        </div>
                                        <div class="text-danger message"></div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" id="form-submit" class="common_btn">send now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if ($settings->map)
                        <div class="col-xl-12">
                            <div class="wsus__con_map">
                                <iframe src="{{ $settings->map }}" width="1600" height="450" style="border:0;"
                                    allowfullscreen="100" loading="lazy"></iframe>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!--============================CONTACT PAGE END==============================-->
@endsection

@push('js-link')
    <script>
        $(document).ready(function() {
            $('#contact-form').on('submit', function(e) {
                e.preventDefault();
                let data = $(this).serialize();

                // Clear previous errors
                $('.text-danger').text('');
                $('input, textarea').removeClass('border border-danger');

                $.ajax({
                    method: 'POST',
                    url: "{{ route('handle-contact-form') }}",
                    data: data,
                    beforeSend: function() {
                        $('#form-submit').text('sending...');
                        $('#form-submit').attr('disabled', true);
                    },
                    success: function(data) {
                        if (data.status === 'success') {
                            toastr.success(data.message);
                            $('#contact-form')[0].reset();
                            $('#form-submit').text('Send Now');
                            $('#form-submit').attr('disabled', false);
                        }
                    },
                    error: function(xhr, status, error) {
                        // Check if errors exist
                        if (xhr.responseJSON && xhr.responseJSON.errors) {
                            let errors = xhr.responseJSON.errors;
                            // Name error
                            if (errors.name && errors.name[0]) {
                                $("input[name='name']").addClass('border border-danger');
                                $('.name').text(errors.name[0]);
                            }
                            // Email error
                            if (errors.email && errors.email[0]) {
                                $("input[name='email']").addClass('border border-danger');
                                $('.email').text(errors.email[0]);
                            }
                            // Subject error
                            if (errors.subject && errors.subject[0]) {
                                $("input[name='subject']").addClass('border border-danger');
                                $('.subject').text(errors.subject[0]);
                            }
                            // Message error
                            if (errors.message && errors.message[0]) {
                                $("textarea[name='message']").addClass('border border-danger');
                                $('.message').text(errors.message[0]);
                            }
                        }
                        // If no validation errors but general error
                        else if (xhr.responseJSON && xhr.responseJSON.message) {
                            toastr.error(xhr.responseJSON.message);
                        }
                        // Unknown error
                        else {
                            toastr.error('Something Went Wrong. Please Try Again Later.');
                        }
                        $('#form-submit').text('Send Now');
                        $('#form-submit').attr('disabled', false);
                    },
                })
            })
        })
    </script>
@endpush
