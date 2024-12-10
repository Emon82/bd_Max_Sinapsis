@extends('frontend.app')

@section('title','Become A Preceptor')

@section('content')
       <!-- ====================== Banner start hare ====================== -->
       <section class="banner--wrapper">
        <div class="container">
            <div class="student--banner--inner">

                <div class="content--wrapper">
                    <div class="faq--first--text">
                        <h2>Become a Preceptor </h2>
                        <h6>Nurse practitioner students need your help!</h6>
                        <a href="{{ route('student.form') }}">Provider Form</a>
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

       <!-- ====================== What you will get start hare ====================== -->
       <section class="what--will--get--wrapper">
        <div class="container">
            <div class="what--will--get--content--wrapper">
                <div class="content--first--btn">
                    <a href="javascript:void(0)">Preceptor Matchmaking Made Easy</a>
                </div>

                <div class="what--will--get--content">
                    <h5>What You’ll Get as a <span>Preceptor</span></h5>
                    <p>Join Preceptor GURU as a preceptor and unlock a host of exclusive benefits that will enrich
                        your professional journey and provide you with immense satisfaction. <span> Here’s what you
                            can expect as a valued preceptor in our Nurse Practitioner preceptorship program</span>
                    </p>
                </div>
            </div>

            <div class="what--will--get--content--item--wrapper">

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[2]->title ?? 'Professional Fulfilment' }}</h3>
                        <p>
                            {{ $studentCms[2]->description ?? ' Shape the future of healthcare by mentoring the next generation of Nurse Practitioners.
                            Experience the profound satisfaction of knowing that your expertise and guidance are
                            directly contributing to the development of skilled and compassionate healthcare
                            providers.' }}
                           </p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem2.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[3]->title ?? 'Competitive Compensation' }}</h3>
                        <p>{{ $studentCms[3]->description ?? 'Your time and expertise are invaluable, and we ensure they are rewarded accordingly. Enjoy competitive compensation that acknowledges and appreciates your dedication to mentoring and education.' }}</p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem3.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[4]->title ?? 'Enhanced Leadership Skills' }}</h3>
                        <p>{{ $studentCms[4]->description ?? 'Hone your leadership and teaching skills through practical experience. Precepting offers a unique opportunity to develop and refine your abilities in communication, mentorship, and clinical education, setting you apart as a leader in your profession.' }}</p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem4.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[5]->title ?? 'Networking Opportunities' }}</h3>
                        <p>{{ $studentCms[5]->description ?? 'Expand your professional network by connecting with a community of like-minded healthcare professionals. Engage with students, fellow preceptors, and academic institutions, opening doors to new opportunities and collaborations.' }}</p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[6]->title ?? 'Recognition and Appreciation' }}</h3>
                        <p>{{ $studentCms[6]->description ?? 'Be celebrated for your contributions to the nursing profession. We hold our preceptors in the highest regard and ensure you receive the recognition and appreciation you deserve for your vital role in shaping future NPs.' }}</p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem2.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[7]->title ?? 'Comprehensive Support and Resources' }}</h3>
                        <p>{{ $studentCms[7]->description ?? 'We are committed to your success as a preceptor. Access a wealth of resources and ongoing support from Preceptor GURU, including training, tools, and assistance, ensuring you are well-equipped and confident in your role.' }}</p>
                    </div>
                </div>

                <div class="what--will--get--content--item">
                    <div class="what--will--get--content--img">
                        <img src="{{asset('frontend/images/whatYouGetItem3.png')}}" alt="not found">
                    </div>
                    <div class="what--will--get--texts">
                        <h3>{{ $studentCms[8]->title ?? 'Flexible Commitment' }}</h3>
                        <p>{{ $studentCms[8]->description ?? 'Enjoy the flexibility to choose preceptorship opportunities that align with your schedule and preferences. We work with you to find the right match for your availability and clinical expertise, ensuring a balanced and rewarding experience.' }}</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- ====================== What you will get start hare ====================== -->


    <!-- ====================== Ready to start hare ====================== -->
    <section class="readyToStart--wrapper">
        <div class="container">
            <div class="readyToStart--main">
                <div class="readyToStart--left">
                    <div class="content--first--btn">
                        <a href="javascript:void(0)">{{ $studentCms[9]->title ?? 'Finding Your Ideal Preceptor' }}</a>
                    </div>
                    <div class="readyToStart--left--content">
                        <h4>{{ $studentCms[9]->title ?? 'Join Preceptor GURU & experience the rewards of shaping the future of nursing.' }} </h4>
                        <p>{!! $studentCms[9]->description ?? 'Your expertise and dedication are crucial to the growth and success of our Nurse
                            Practitioner students. Become a part of our mission to elevate healthcare through
                            exceptional education and mentorship, and enjoy a fulfilling and enriching professional
                            journey.' !!}</p>

                        <a href="{{ route('conatct-us') }}">Contact Us</a>
                    </div>
                </div>
                <div class="readyToStart--right">
                    <img src="{{asset('frontend/images/readyTostart.png')}}" alt="not found">
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== Ready to end hare ====================== -->


    <!-- ====================== student form start hare ====================== -->
    <section class="becomeA--preceptor--wrapper">
        <div class="container">
            <div class="becomeA--preceptor--main">
                <div class="becomeA--preceptor--left">
                    <div class="readyToStart--left">
                        <div class="content--first--btn">
                            <a href="javascript:void(0)">Let us help you!</a>
                        </div>
                        <div class="readyToStart--left--content--become">
                            <h5>Become a Preceptor <span>Today!</span></h5>

                                <p>If you're interested to become a preceptor, start by applying here, filling up the
                                    form, and attaching your resume.</p>
                            <a href="{{ $studentCms[1]->link_url ? $studentCms[1]->link_url : 'https://docs.google.com/forms/d/e/1FAIpQLSd7OIWEgHdMOthhiucqbOqN712Y24sOj-vT05jZ8i6ZHjWGSA/viewform?usp=sf_link' }}"
                                target="_blank">Proceed to the form</a>
                        </div>
                    </div>
                </div>
                <div class="becomeA--preceptor--right">
                    <a href="{{ $studentCms[1]->link_url ? $studentCms[1]->link_url : 'https://docs.google.com/forms/d/e/1FAIpQLSd7OIWEgHdMOthhiucqbOqN712Y24sOj-vT05jZ8i6ZHjWGSA/viewform?usp=sf_link' }}"
                        target="_blank">
                        <div class="form--div">
                            <img src="{{asset('frontend/images/form--image.png')}}" alt="not found">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== student form start hare ====================== -->

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

                <div class="faq--btn">
                    <a href="{{ route('faq.page') }}">See More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== FAQ start hare ====================== -->
@endsection
