@extends('frontend.app')

@section('title','About Us')

@push('style')

@endpush

@section('content')
    <!-- ====================== Banner start hare ====================== -->
    <section class="banner--wrapper">
        <div class="container">
            <div class="about--us--banner--inner">

                <div class="content--wrapper">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $cms[6]->title ?? "A Supportive Platform for Success" }}</a>
                    </div>
                    <div class="content--first--text">
                        <h2>{{ $cms[6]->sub_title ?? "About Us" }} </h2>
                        <p>{!! $cms[6]->description ?? "Welcome to your ultimate partner in achieving excellence in Nurse Practitioner (NP)
                            training. We understand the journey to becoming a proficient NP is both exciting and
                            challenging, and we’re here to make that journey smoother, more enriching, and immensely
                            rewarding. With our comprehensive preceptorship programs, you’ll gain the real-world
                            experience you need to thrive in today’s dynamic healthcare environment." !!}</p>
                    </div>
                    <div class="content--last--btn">
                        <a href="{{ route('student.form') }}">{{ $cms[6]->button_text ?? "Student Intake Form" }}</a>
                    </div>
                </div>

                <div class="banner--down--frame--two">
                    <div class="banner--down--frame--img">
                        <img src="{{asset('frontend/images/banner--frame.png')}}" alt="not found">
                    </div>
                    <div class="banner--down--frame--text aboutPage">
                        <h4>3K+</h4>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ====================== Banner End hare ====================== -->

    <!-- ====================== our mission start hare ====================== -->
    <section class="readyToStart--wrapper">
        <div class="container">
            <div class="readyToStart--main">
                <div class="readyToStart--left">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $cms[7]->title ?? "Exceptional Preceptorship for NPs" }}</a>
                    </div>
                    <div class="readyToStart--left--content--aboutPage">
                        {{-- <h5>
                            {!! $cms[7]->title ?? 'Our<span>Mission</span>' !!}
                        </h5> --}}
                        <h5>Our <span>Mission</span></h5>
                        <p>{!! $cms[7]->description ?? "Our mission at Preceptor GURU is to provide Nurse Practitioner students with unparalleled
                            preceptorship opportunities that elevate clinical skills, knowledge, and professional
                            growth. We are dedicated to creating a supportive and stimulating environment where you
                            can excel and become the healthcare leader you aspire to be." !!}</p>

                        <a href="{{ route('conatct-us') }}">{{$cms[7]->button_text ?? "Contact Us"}}</a>
                    </div>
                </div>
                <div class="readyToStart--right aboutAdjust">
                    <img src="{{ asset('frontend/images/readyTostart.png') }}" alt="not found">
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== our mission end hare ====================== -->


    <!-- ====================== Our Vision start hare ====================== -->
    <section class="readyToStart--wrapper aboutAdjust">
        <div class="container">
            <div class="readyToStart--main ourVision">
                <div class="readyToStart--left">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $cms[8]->title ?? "Exceptional Preceptorship for NPs" }}</a>
                    </div>
                    <div class="readyToStart--left--content--aboutPage">
                        <h5>Our<span> Vision</span></h5>
                        <p>{!! $cms[8]->description ?? "We envision a future where every Nurse Practitioner is empowered with the experience and
                            confidence to deliver outstanding patient care. Our goal is to contribute to the
                            development of skilled, compassionate NPs who are ready to make a meaningful impact in
                            their communities and beyond." !!}</p>

                        <a href="{{ route('conatct-us') }}">{{$cms[8]->button_text ?? "Contact Us"}}</a>

                    </div>
                </div>
                <div class="readyToStart--right">
                    <img src="{{ asset('frontend/images/readyTostart.png') }}" alt="not found">
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== Our Vision end hare ====================== -->

    <!-- ====================== value start hare ====================== -->
    <section class="our--value--wrapper aboutAdjust">
        <div class="container">
            <div class="our--value--main">
                <div class="content--first--btn">
                    <a href="javascript:void(0)">{{ $cms[1]->title ?? 'Preceptor Matchmaking Made Easy' }}</a>
                </div>

                <div class="our--value--main--content">
                    {{-- <h5>{!! $cms[1]->sub_title ?? 'Our <span>Values</span>' !!}</h5> --}}
                    <h5 style="text-align: center">Our <span>Values</span></h5>
                    <p>{!! $cms[1]->description ??
                        'Choosing Preceptor GURU as your platform for finding a preceptor for your clinical rotations offers numerous benefits that can help set you up for success in your Nurse Practitioner program.' !!}</p>
                    <h6 style="text-align: center !important">Here are some of the reasons why Preceptor Guru is the right
                        choice for you</h6>

                </div>
            </div>

            <div class="our--value--main--wrapper">
                @if ($ourValues->isEmpty())

                <div class="our--value--item">
                    <h6>Excellence</h6>
                    <p>We are committed to the highest standards in clinical education and professional development.
                    </p>
                </div>
                <div class="our--value--item">
                    <h6>Compassion</h6>
                    <p>We foster a caring and empathetic approach to patient care.</p>
                </div>
                <div class="our--value--item">
                    <h6>Collaboration</h6>
                    <p>We are committed to the highest standards in clinical education and professional development.
                    </p>
                </div>
                <div class="our--value--item">
                    <h6>Innovation</h6>
                    <p>We are committed to the highest standards in clinical education and professional development.
                    </p>
                </div>
                <div class="our--value--item">
                    <h6>Integrity</h6>
                    <p>We are committed to the highest standards in clinical education and professional development.
                    </p>
                </div>
            @else
                @foreach ($ourValues as $value)
                    <div class="our--value--item">
                        <h6>{{ $value->title ?? '' }}</h6>
                        <p>{!! $value->description ?? '' !!}</p>
                    </div>
                @endforeach

            @endif
            </div>

        </div>
    </section>
    <!-- ====================== value End hare ====================== -->

    <!-- ====================== why Chose start hare ====================== -->
    <section class="why--chose--us--wrapper">
        <div class="container">
            <div class="why--chose--us--inner--about">
                <div class="why--chose--us--main">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $cms[2]->title ?? 'Expert Preceptor Network' }}</a>
                    </div>
                    <div class="why--chose--us--heading">
                        <div class="why--chose--us--text">
                            {{-- <h4>
                                {!! $cms[2]->title ?? 'Why Choose<span>Us</span>' !!}
                            </h4> --}}
                            <h4>Why Choose <span> Us</span></h4>


                            <p>{!! $cms[2]->description ??
                                'Choosing Preceptor GURU means choosing a pathway to success. We understand the unique
                                                                                                                                                                                                                                                                                            challenges and demands of NP training, and we’re here to provide the guidance,
                                                                                                                                                                                                                                                                                            support, and resources you need to excel. Our comprehensive preceptorship programs
                                                                                                                                                                                                                                                                                            are crafted to help you transition smoothly from student to skilled practitioner,
                                                                                                                                                                                                                                                                                            ensuring you are well-prepared for a rewarding career in healthcare.' !!}</p>
                        </div>
                    </div>
                    <div class="why--chose--us--btn">
                        <a href="{{ route('conatct-us') }}">{{ $cms[2]->button_text ?? 'Contact Us' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== why Chose end hare ====================== -->

    <!-- ====================== our mission start hare ====================== -->
    <section class="readyToStart--wrapper">
        <div class="container">
            <div class="readyToStart--main aboutAdjust">
                <div class="readyToStart--left">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{$cms[9]->title ?? "Finding Your Ideal Preceptor"}}</a>
                    </div>
                    <div class="readyToStart--left--content--aboutPage">
                        <h5>What Sets<span> Us Apart</span></h5>

                       <h6>{!! $cms[9]->description ?? " <h6>Comprehensive Database of Preceptors: <span>Imagine having access to an extensive
                                    network of experienced preceptors across diverse clinical settings. Our database
                                    includes top-tier professionals in primary care, specialty clinics, hospitals, and
                                    community health centers, ensuring you find the perfect match for your educational
                                    needs</span></h6>

                        <h6>Time-Saving Solutions: <span> Your time is precious. Our streamlined platform allows you
                                    to quickly and efficiently find and connect with preceptors, eliminating the hassle
                                    and saving you valuable time.</span></h6>

                        <h6>User-Friendly Platform: <span>Our intuitive and easy-to-navigate platform is designed
                                    with you in mind. From searching for preceptors to scheduling and managing your
                                    clinical experiences, we make the process smooth and stress-free.</span></h6>

                        <h6>Ongoing Support: <span>We are with you every step of the way. Our dedicated support team
                                    is always available to assist you, providing guidance, resources, and encouragement
                                    to ensure your success.</span></h6>" !!}</h6>


                        <a href="{{ route('conatct-us') }}">{{ $cms[9]->button_text ?? "Contact Us" }}</a>
                    </div>
                </div>
                <div class="readyToStart--right AdjustImg">
                    <img src="{{asset('frontend/images/readyTostart.png')}}" alt="not found">
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== our mission end hare ====================== -->

    <!-- ====================== Success start hare ====================== -->
    <section class="why--chose--us--wrapper">
        <div class="container">
            <div class="why--chose--us--inner--third">
                <div class="why--chose--us--main">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $cms[5]->title ?? 'Expert Preceptor Network' }}</a>
                    </div>
                    <div class="why--chose--us--heading">
                        <div class="why--chose--us--text">
                            <h4>Your Path to NP Success <span>Starts Here</span></h4>


                            <p>{!! $cms[5]->description ?? "Discover a seamless and enriching journey with Preceptor Guru's Nurse Practitioner
                                Preceptorship Program. Our intuitive platform connects you with top-tier preceptors,
                                ensuring you gain the hands-on experience and mentorship you need to excel. From
                                submitting your information to securing your preceptor slot and receiving university
                                approval, we handle the details so you can focus on what matters most—your education
                                and career. Join us today and take the first step towards a thriving future in
                                healthcare, supported every step of the way by a dedicated team and an extensive
                                network of experienced professionals. Your NP success story begins here!" !!}</p>
                        </div>
                    </div>
                    <div class="why--chose--us--btn">
                        <a href="{{ route('conatct-us') }}">{{ $cms[5]->button_text ?? 'Contact Us' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== Success end hare ====================== -->

    <!-- ====================== FAQ start hare ====================== -->
    <section class="faq--wrapper--three">
        <div class="container">
            <div class="faq--main">
                <div class="faq--heading">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">Preceptor Matchmaking Made Easy</a>
                    </div>
                    <div class="gateWay--header--text">
                        <h4>Frequently Asked <span>Questions</span></h4>
                    </div>
                </div>

                <div class="faq--accourdion--main">
                    <div class="accordion" id="accordionExample">

                        @if($faqs->isEmpty())
                        <div class="accordion-item">

                            <h2 class="accordion-header" id="headingOne">

                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">

                                    <div class="accordion--text">
                                        <h5>How long does it take for Preceptor GURU to process and review my
                                            rotation request and profile?</h5>
                                    </div>

                                </button>
                            </h2>

                            <div id="collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>The review process usually takes 2-3 business days. Our team carefully reviews your rotation request and profile to ensure all information is complete and accurate, aiming to match you with the best possible preceptor.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">

                            <h2 class="accordion-header" id="headingTwo">

                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <div class="accordion--text">
                                        <h5>What steps can I take to avoid delays in preceptor approval?</h5>
                                    </div>
                                </button>

                            </h2>

                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>To prevent delays, make sure your profile is fully completed with all required information, including your academic background, clinical interests, and specific preferences or requirements. Also, promptly submit any additional documentation requested by our team or your university.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <div class="accordion--text">
                                        <h5>How long does it take to finalize the paperwork?</h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Once your preceptor is matched and the arrangement is approved, the paperwork completion process typically takes 7-10 business days. This includes finalizing all necessary documentation and agreements between you, your preceptor, and your university.</p>
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="false"
                                    aria-controls="collapseFour">
                                    <div class="accordion--text">
                                        <h5>What documents will I receive once the paperwork is completed?</h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Upon completion, you will receive a comprehensive preceptorship agreement package. This includes your preceptorship schedule, contact information for your preceptor, and any additional instructions or guidelines from your university.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false"
                                    aria-controls="collapseFive">
                                    <div class="accordion--text">
                                        <h5>What if my university does not approve the preceptor?</h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>If your university does not approve the preceptor, we will work with you to find an alternative preceptor who meets your university's requirements. We aim to resolve such issues promptly to avoid any disruption to your clinical training schedule.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false"
                                    aria-controls="collapseSix">
                                    <div class="accordion--text">
                                        <h5>Who provides the contact information for my preceptor/site for scheduling?</h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Once your preceptorship is confirmed and all paperwork is completed, our team will provide you with the contact information for your preceptor and the clinical site. This will allow you to coordinate and schedule your rotation directly with your preceptor.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false"
                                    aria-controls="collapseSeven">
                                    <div class="accordion--text">
                                        <h5>Can I submit a review for my preceptor after completing my rotation?
                                        </h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>Yes, we highly encourage you to submit a review for your preceptor once your rotation has ended. Your feedback is invaluable in helping us maintain high-quality preceptorship experiences and assist future students in making informed decisions.</p>
                                </div>
                            </div>
                        </div>

                        @else

                        @foreach ($faqs as $faq)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading{{ $faq->id }}">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $faq->id }}" aria-expanded="false"
                                    aria-controls="collapse{{ $faq->id }}">
                                    <div class="accordion--text">
                                        <h5>{!! $faq->question ??
                                            "How long does it take for Preceptor GURU to process and review my
                                                                                                                                                                                                                                                                                                                                                                                                                                                    rotation request and profile?" !!}</h5>
                                    </div>
                                </button>
                            </h2>
                            <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading{{ $faq->id }}"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <p>{!! $faq->answer ??
                                        "" !!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endif

                    </div>
                </div>

                <div class="faq--btn">
                    <a href="{{ route('faq.page') }}">See More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== FAQ start hare ====================== -->
@endsection


@push('script')
    <script>
        document?.addEventListener("DOMContentLoaded", function() {
            var items = document.querySelectorAll('.our--value--item');
            if (items.length > 0 && (items.length % 2) === 1) {
                var lastItem = items[items.length - 1];
                lastItem.classList.add('last-child-odd');
            }
        });
    </script>
@endpush
