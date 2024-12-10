@extends('frontend.app')

@section('title','FAQ')

@section('content')
     <!-- ====================== Banner start hare ====================== -->
     <section class="banner--wrapper">
        <div class="container">
            <div class="faq--banner--inner">

                <div class="content--wrapper">
                    <div class="faq--first--text">
                        <h2>FAQs </h2>
                        <p>Frequently Asked Questions</p>
                    </div>

                </div>

                <div class="banner--down--frame--two">
                    <div class="banner--down--frame--img">
                        <img src="{{asset('frontend/images/banner--frame.png')}}" alt="not found">
                    </div>
                    <div class="banner--down--frame--text">
                        <h4>3K+</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== Banner End hare ====================== -->

    <!-- ====================== Success start hare ====================== -->
    <section class="why--chose--us--wrapper">
        <div class="container">
            <div class="why--chose--us--inner--third faqPage">
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
    <section class="faq--wrapper--three faqPage">
        <div class="container">
            <div class="faq--main faqPage">
                <div class="faq--heading">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">Preceptor Matchmaking Made Easy</a>
                    </div>
                    <div class="gateWay--header--text">
                        <h4>Frequently Asked<span>Questions</span></h4>
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

                {{-- <div class="faq--btn">
                    <a href="faq.html">See More</a>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- ====================== FAQ start hare ====================== -->
@endsection
