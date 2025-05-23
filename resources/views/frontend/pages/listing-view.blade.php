@extends('frontend.layouts.master')

@section('contents')
    <!--==========================
            BREADCRUMB PART START
        ===========================-->
    <div id="breadcrumb_part"
        style="
    background: url({{ $listing->thumbnail_image }});
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    ">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 text-center text-white">
                        <h4>{{ $listing->title }}</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item" data-=""><a href="{{ url('/') }}"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> listing details </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
            BREADCRUMB PART END
        ===========================-->


    <!--==========================
            LISTING DETAILS START
        ===========================-->
    <section id="listing_details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="listing_details_text">
                        <div class="listing_det_header">
                            <div class="listing_det_header_img">
                                <img src="{{ asset($listing->user->avatar) }}" alt="logo" class="img-fluid w-100">
                            </div>
                            <div class="listing_det_header_text">
                                <h6>{{ $listing->title }}</h6>
                                <p class="listing-salary fs-4 fw-bold" style="color: var(--colorPrimary);">
                                    Salary: {{ $listing->website ?? 'Not specified' }}
                                  </p>
                                <p class="host_name">Job Added By: <a
                                        href="agent_public_profile.html">{{ $listing->user->name ?? '-' }}</a></p>
                                {{-- <p class="rating">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= intval($listing->reviews_avg_rating))
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                    <b>{{ intval($listing->reviews_avg_rating) }}</b>
                                    <span>({{ count($reviews) }} review)</span>
                                </p> --}}
                                <ul>
                                    @if ($listing->is_verified)
                                        <li><a href="#"><i class="far fa-check"></i> Verified</a></li>
                                    @endif
                                    @if ($listing->is_featured)
                                        <li><a href="#"><i class="far fa-star"></i> Featured</a></li>
                                    @endif
                                    <li><a href="#"><i class="fal fa-heart"></i> Add to Favorite</a></li>
                                    <li><a href="#"><i class="fal fa-eye"></i> {{ $listing->views }}</a></li>
                                    @if ($openStatus == 'open')
                                        <li><a href="javascript:;">Open</a></li>
                                    @elseif ($openStatus == 'close')
                                        <li><a href="javascript:;">Close</a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="listing_det_text">
                            {!! $listing->description !!}
                        </div>
                        <div class="listing_det_Photo">
                            <div class="row">
                                @foreach ($listing->gallery as $image)
                                    <div class="col-xl-3 col-sm-6">
                                        <a class="venobox" data-gall="gallery01" href="{{ asset($image->image) }}">
                                            <img src="{{ asset($image->image) }}" alt="gallery1" class="img-fluid w-100">
                                            <div class="photo_overlay">
                                                <i class="fal fa-plus"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="listing_det_feature">
                            <div class="row">
                                @foreach ($listing->amenities as $amenity)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_feature_single">
                                            <i class="{{ $amenity->amenity->icon }}"></i>
                                            <span>{{ $amenity->amenity->name }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="listing_det_video">
                            <div class="row">
                                @foreach ($listing->videoGallery as $video)
                                    <div class="col-xl-4 col-sm-6">
                                        <div class="listing_det_video_img">
                                            <img src="{{ getYtThumbnail($video->video_url) }}" alt="img"
                                                class="img-fluid w-100">
                                            <a class="venobox" data-autoplay="true" data-vbtype="video"
                                                href="{{ $video->video_url }}">
                                                <i class=" fas fa-play"></i>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        @if ($listing->google_map_embed_code)
                            <div class="listing_det_location">
                                {!! $listing->google_map_embed_code !!}
                            </div>
                        @endif
                        <div class="wsus__listing_review">
                            <h4>Apply Now</h4>
                            <form action="{{ route('submit.application') }}" method="POST" enctype="multipart/form-data" class="input_comment">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="form-group mb-3">
                                            <label for="fullName">Full Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="fullName" name="full_name" required
                                                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="form-group mb-3">
                                            <label for="phone">Contact Number <span class="text-danger">*</span></label>
                                            <input type="tel" class="form-control" id="phone" name="phone" required
                                                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3">
                                            <label for="cv">Upload your CV <span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" id="cv" name="cv"
                                                   accept=".pdf,.png,.jpg,.jpeg" required
                                                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                            <small class="text-muted">Accepted formats: PDF, PNG, JPEG (Max size: 5MB)</small>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="form-group mb-3">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="5"
                                                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <button type="submit" class="read_btn"
                                                style="background-color: #2196F3; border: none; padding: 12px 30px;
                                                       border-radius: 5px; color: white; cursor: pointer;
                                                       transition: all 0.3s ease;">
                                            Submit Application
                                        </button>
                                    </div>
                                </div>
                            </form>
                            {{-- <h4>reviews {{ count($reviews) }}</h4> --}}
                            {{-- @foreach ($reviews as $review)
                                <div class="wsus__single_comment">
                                    <div class="wsus__single_comment_img">
                                        <img src="{{ asset($review->user->avatar) }}" alt="comment"
                                            class="img-fluid w-100">
                                    </div>
                                    <div class="wsus__single_comment_text">
                                        <h5>{{ $review->user->name }}<span>
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($i <= $review->rating)
                                                        <i class="fas fa-star"></i>
                                                    @else
                                                        <i class="far fa-star"></i>
                                                    @endif
                                                @endfor

                                            </span></h5>
                                        <span>{{ date('d-m-Y', strtotime($review->created_at)) }}</span>
                                        <p>{{ $review->review }}</p>
                                    </div>
                                </div>
                            @endforeach --}}

                            {{-- <div>
                                <div id="pagination">
                                    @if ($reviews->hasPages())
                                        {{ $reviews->links() }}
                                    @endif
                                </div>
                            </div>

                            @auth
                                <form action="{{ route('listing-review.store') }}" method="POST" class="input_comment">
                                    @csrf
                                    <h5>add a review</h5>
                                    <div class="row">
                                        <div class="col-xl-12">
                                            <div class="wsus__select_rating">
                                                <i class="fas fa-star"></i>
                                                <select class="select_2" name="rating">
                                                    <option value="">select rating</option>
                                                    <option value="1"> 1 </option>
                                                    <option value="2"> 2 </option>
                                                    <option value="3"> 3 </option>
                                                    <option value="4"> 4 </option>
                                                    <option value="5"> 5 </option>
                                                </select>
                                                <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="blog_single_input">
                                                <textarea cols="3" rows="5" placeholder="Comment" name="review"></textarea>
                                                <button type="submit" class="read_btn">submit review</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endauth --}}
                            {{-- @guest
                                <div class="alert alert-warning">
                                    Please <a href="{{ route('login') }}">login</a> for submit a review.
                                </div>
                            @endguest --}}


                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    <div class="listing_details_sidebar">
                        <div class="row">
                            <div class="col-12">
                                <div class="listing_det_side_address">
                                    {{-- <a href="callto:{{ $listing->phone }}"><i class="fal fa-phone-alt"></i>
                                        {{ $listing->phone }}</a>
                                    <a href="mailto:{{ $listing->email }}"><i class="fal fa-envelope"></i>
                                        {{ $listing->email }}</a>
                                    <p><i class="fal fa-map-marker-alt"></i> {{ $listing->address }}, {{ $listing->location->name }}</p>
                                    @if ($listing->website)
                                    <p><i class="fal fa-globe"></i> <a href="">{{ $listing->website }}</a></p>
                                    @endif
                                    <ul>
                                        @if ($listing->facebook_link)
                                        <li><a href="{{ $listing->facebook_link }}"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if ($listing->x_link)
                                        <li><a href="{{ $listing->x_link }}"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if ($listing->linkedin_link)
                                        <li><a href="{{ $listing->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                        @if ($listing->whatsapp_link)
                                        <li><a href="{{ $listing->whatsapp_link }}"><i class="fab fa-whatsapp"></i></a></li>
                                        @endif
                                    </ul> --}}
                                    @if ($listing->gallery && $listing->gallery->count() > 0)
                                        @foreach ($listing->gallery as $image)
                                            <a class="venobox" data-gall="gallery01" href="{{ asset($image->image) }}">
                                                <img src="{{ asset($image->image) }}"
                                                    alt="gallery{{ $loop->iteration }}" class="img-fluid w-100">
                                                <div class="photo_overlay">
                                                    <i class="fal fa-plus"></i>
                                                </div>
                                            </a>
                                        @endforeach
                                    @else
                                        {{-- Show default listing image if no gallery images --}}
                                        <a class="venobox" data-gall="gallery01" href="{{ asset($listing->image) }}">
                                            <img src="{{ asset($listing->image) }}" alt="listing image"
                                                class="img-fluid w-100">
                                            <div class="photo_overlay">
                                                <i class="fal fa-plus"></i>
                                            </div>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @if (count($listing->schedules) > 0)
                                <div class="col-12">
                                    <div class="listing_det_side_open_hour">
                                        <h5>Opening Hours</h5>
                                        @foreach ($listing->schedules as $schedule)
                                            <p>{{ $schedule->day }} <span>{{ $schedule->start_time }} -
                                                    {{ $schedule->end_time }}</span></p>
                                        @endforeach

                                    </div>
                                </div>
                            @endif

                            {{-- <div class="col-12">
                                <div class="listing_det_side_contact">
                                    <h5>Send a Message</h5>
                                    <button type="submit" class="read_btn" data-bs-toggle="modal"
                                        data-bs-target="#messageModal">Message</button>
                                    <div class="alert alert-success mt-4 text-center d-none message-alert"><a
                                            href="{{ route('user.messages') }}">Click here</a> for go to inbox!</div>
                                </div>
                            </div> --}}

                            <div class="col-12">
                                <div class="listing_det_side_contact">
                                    <h5>Contact on WhatsApp</h5>
                                    <a href="https://wa.me/971506939322" target="_blank" class="read_btn whatsapp-btn"
                                        style="display: inline-block;
                                               text-decoration: none;
                                               background-color: #25D366;
                                               border: none;
                                               color: white;
                                               padding: 12px 24px;
                                               border-radius: 8px;
                                               font-weight: 600;
                                               cursor: pointer;
                                               box-shadow: 0 2px 4px rgba(37, 211, 102, 0.2),
                                                          inset 0 -4px 8px rgba(0, 0, 0, 0.1);
                                               transition: all 0.3s ease;">
                                        <i class="fab fa-whatsapp" style="margin-right: 10px; font-size: 20px;"></i>
                                        WhatsApp Message
                                    </a>
                                    <style>
                                        .whatsapp-btn:hover {
                                            background-color: #128C7E !important;
                                            box-shadow: 0 4px 8px rgba(37, 211, 102, 0.3),
                                                       inset 0 -4px 8px rgba(0, 0, 0, 0.1) !important;
                                            transform: translateY(-1px);
                                        }
                                        .whatsapp-btn:active {
                                            background-color: #075E54 !important;
                                            transform: translateY(1px);
                                            box-shadow: 0 2px 4px rgba(37, 211, 102, 0.2),
                                                       inset 0 4px 8px rgba(0, 0, 0, 0.2) !important;
                                        }
                                    </style>
                                </div>
                            </div>

                            {{-- <div class="col-12">
                                <div class="listing_det_side_contact">
                                    <h5>claim this listing</h5>
                                    <button type="submit" class="read_btn" data-bs-toggle="modal"
                                        data-bs-target="#claimModal">Claim</button>
                                </div>
                            </div> --}}

                            @if (count($smellerListings) > 0)
                                <div class="col-12">
                                    <div class="listing_det_side_list">
                                        <h5>Similar Listing</h5>
                                        @foreach ($smellerListings as $smellerListing)
                                            <a href="{{ route('listing.show', $smellerListing->slug) }}"
                                                class="sidebar_blog_single">
                                                <div class="sidebar_blog_img">
                                                    <img src="{{ asset($smellerListing->image) }}"
                                                        alt="{{ $smellerListing->title }}" class="imgofluid w-100">
                                                </div>
                                                <div class="sidebar_blog_text">
                                                    <h5>{{ truncate($smellerListing->title) }}</h5>
                                                    <p> {{ date('m d Y', strtotime($smellerListing->created_at)) }}</p>
                                                </div>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section id="wsus__map_popup">
        <div class="modal fade" id="claimModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="modal-body listing_det_side_contact" style="box-shadow: none">
                        <h5 class="mb-3">Claim Form</h5>
                        <form action="{{ route('submit-claim') }}" method="POST">
                            @csrf
                            <input type="hidden" name="listing_id" value="{{ $listing->id }}">
                            <input type="text" placeholder="Name*" name="name"
                                value="{{ auth()->user()?->name }}">
                            <input type="email" placeholder="Email*" name="email"
                                value="{{ auth()->user()?->email }}">
                            <textarea cols="3" rows="5" placeholder="Claim*" name="claim"></textarea>
                            <button type="submit" class="">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="wsus__map_popup">
        <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <button type="button" class="btn-close popup_close" data-bs-dismiss="modal" aria-label="Close"><i
                            class="far fa-times"></i></button>
                    <div class="modal-body listing_det_side_contact" style="box-shadow: none">
                        <h5 class="mb-3">Message</h5>
                        <form action="" method="POST" class="message-form">
                            @csrf
                            <input type="hidden" value="{{ $listing->user_id }}" name="receiver_id">
                            <input type="hidden" value="{{ $listing->id }}" name="listing_id">
                            <textarea rows="5" placeholder="Message" name="message"></textarea>
                            <button type="submit" class="send-btn">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--==========================
            LISTING DETAILS END
        ===========================-->
@endsection
{{--
@push('scripts')
    <script>
        $('.message-form').on('submit', function(e) {
            e.preventDefault();
            let formData = $(this).serialize();

            $.ajax({
                method: 'POST',
                url: '{{ route('user.send-message') }}',
                data: formData,
                beforeSend: function() {
                    $('.send-btn').html(`<span class="spinner-border spinner-border-sm text-light" role="status" aria-hidden="true"></span>
                    Sending...`);
                    $('.send-btn').prop('disabled', true);
                },
                success: function(response) {
                    if (response.status === 'success') {
                        toastr.success(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    if (xhr.responseJSON.message) {
                        toastr.error(xhr.responseJSON.message);
                    }
                },
                complete: function() {
                    $('.send-btn').html(`Send`);
                    $('.send-btn').prop('disabled', false);
                    $('.message-form').trigger('reset');
                    $('#messageModal').modal('hide');
                    $('.message-alert').removeClass('d-none');
                }
            })
        })
    </script>
@endpush --}}
@push('scripts')
<script>
    $(document).ready(function() {
        $('form').on('submit', function(e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: $(this).attr('action'),
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('button[type="submit"]').prop('disabled', true).html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Submitting...
                    `);
                },
                success: function(response) {
                    toastr.success('Application submitted successfully!');
                    $('form').trigger('reset');
                },
                error: function(xhr) {
                    toastr.error(xhr.responseJSON.message || 'Something went wrong!');
                },
                complete: function() {
                    $('button[type="submit"]').prop('disabled', false).text('Submit Application');
                }
            });
        });
    });
</script>
@endpush
