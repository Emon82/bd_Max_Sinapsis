@extends('frontend.app')

@section('title','Student Preceptor Form')

@section('content')
       <!-- ====================== Banner start hare ====================== -->
       <section class="banner--wrapper">
        <div class="container">
            <div class="student--banner--inner">

                <div class="content--wrapper">
                    <div class="faq--first--text">
                        <h2>Student preceptor Form </h2>
                        <a href="javascript:void(0)">Student Intake Form</a>
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


    <!-- ====================== let us help You start hare ====================== -->
    <section class="let--us--help--you--wrapper">
        <div class="container">
            <div class="let--us--help--you--main">
                <div class="let--us--help--you--content">
                    <h3>Let us<span> Help You!</span></h3>

                    <p>Let us assist you in finding the perfect preceptor to meet your needs. Please ensure that you
                        provide all necessary information when filling out the intake form to help us better
                        understand your requirements. We aim to respond within 5 to 7 business days or as soon as we
                        have the answers you require. Remember to upload your CV along with your form.</p>
                </div>
                <div class="let--us--help--you--inner">
                    <div class="contract--us--right--wrapper">

                        <div class="contract--us--right--item">

                            <div class="contract--us--right--item--svg">
                                <div class="contract--us--right--item--svg--picture">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M10.144 3.22943C10.1631 3.15805 10.1961 3.09112 10.241 3.03248C10.286 2.97384 10.3421 2.92464 10.4061 2.88768C10.4701 2.85072 10.5407 2.82673 10.614 2.81709C10.6872 2.80744 10.7617 2.81233 10.8331 2.83146C11.8758 3.10354 12.8272 3.64867 13.5893 4.41071C14.3513 5.17275 14.8964 6.12415 15.1685 7.16693C15.1877 7.23831 15.1925 7.31276 15.1829 7.38602C15.1733 7.45929 15.1493 7.52993 15.1123 7.59392C15.0753 7.65791 15.0261 7.71399 14.9675 7.75896C14.9089 7.80393 14.8419 7.8369 14.7706 7.856C14.723 7.86848 14.6741 7.87486 14.625 7.87498C14.5011 7.87498 14.3806 7.83403 14.2823 7.7585C14.184 7.68298 14.1134 7.5771 14.0815 7.45732C13.8596 6.60607 13.4147 5.82938 12.7926 5.20734C12.1706 4.58529 11.3939 4.14039 10.5427 3.9185C10.4712 3.89948 10.4042 3.86656 10.3455 3.82162C10.2868 3.77669 10.2375 3.72062 10.2005 3.65662C10.1634 3.59262 10.1394 3.52195 10.1297 3.44865C10.12 3.37535 10.1249 3.30086 10.144 3.22943ZM9.98016 6.1685C10.9498 6.42725 11.5727 7.05021 11.8315 8.01982C11.8634 8.1396 11.934 8.24548 12.0323 8.321C12.1306 8.39653 12.2511 8.43748 12.375 8.43748C12.4241 8.43736 12.473 8.43098 12.5206 8.4185C12.5919 8.3994 12.6589 8.36643 12.7175 8.32146C12.7761 8.27649 12.8253 8.22041 12.8623 8.15642C12.8993 8.09243 12.9233 8.02179 12.9329 7.94852C12.9425 7.87526 12.9377 7.80081 12.9185 7.72943C12.5585 6.38225 11.6177 5.44146 10.2706 5.08146C10.1264 5.04296 9.97286 5.06329 9.8437 5.13799C9.71454 5.21269 9.62035 5.33564 9.58184 5.47978C9.54333 5.62393 9.56367 5.77748 9.63836 5.90664C9.71306 6.03579 9.83601 6.12999 9.98016 6.1685ZM15.7416 12.8728C15.6162 13.8255 15.1483 14.7001 14.4253 15.3331C13.7022 15.9661 12.7735 16.3142 11.8125 16.3125C6.22969 16.3125 1.68751 11.7703 1.68751 6.18748C1.68578 5.22651 2.03393 4.29778 2.66691 3.57473C3.2999 2.85169 4.17444 2.38379 5.12719 2.25842C5.36812 2.229 5.6121 2.27829 5.82272 2.39893C6.03333 2.51957 6.19928 2.70509 6.29579 2.92779L7.78079 6.24303V6.25146C7.85468 6.42194 7.88519 6.60806 7.86961 6.79321C7.85403 6.97835 7.79283 7.15675 7.69149 7.31248C7.67883 7.33146 7.66547 7.34904 7.65141 7.36662L6.18751 9.10193C6.71415 10.1721 7.83352 11.2816 8.91774 11.8097L10.6291 10.3535C10.646 10.3394 10.6636 10.3262 10.6819 10.3141C10.8375 10.2103 11.0165 10.147 11.2027 10.1298C11.389 10.1126 11.5766 10.1421 11.7485 10.2157L11.7577 10.2199L15.0701 11.7042C15.2932 11.8004 15.4792 11.9662 15.6002 12.1768C15.7212 12.3875 15.7708 12.6316 15.7416 12.8728ZM14.625 12.7322C14.625 12.7322 14.6201 12.7322 14.6173 12.7322L11.3126 11.2521L9.60047 12.7083C9.58387 12.7223 9.5665 12.7355 9.54844 12.7476C9.38655 12.8556 9.19941 12.9198 9.00531 12.9339C8.81121 12.9479 8.61678 12.9114 8.44102 12.8278C7.12407 12.1915 5.81133 10.8886 5.1743 9.58568C5.08995 9.41121 5.0521 9.2179 5.06441 9.02449C5.07673 8.83109 5.13881 8.64414 5.24462 8.48178C5.25654 8.46271 5.26994 8.44461 5.28469 8.42764L6.75001 6.69021L5.27344 3.38553C5.27317 3.38272 5.27317 3.37989 5.27344 3.37709C4.59159 3.46603 3.96555 3.80049 3.51255 4.31781C3.05955 4.83514 2.81066 5.49985 2.81251 6.18748C2.81511 8.57363 3.76416 10.8613 5.45142 12.5486C7.13869 14.2358 9.42636 15.1849 11.8125 15.1875C12.4997 15.1898 13.1642 14.9418 13.6819 14.4898C14.1995 14.0378 14.5348 13.4127 14.625 12.7315V12.7322Z"
                                            fill="#141414" />
                                    </svg>
                                </div>
                            </div>
                            <div class="contract--us--right--item--content">
                                <h6>call or Text us</h6>
                                <h5>{{ $studentCms[0]->title ?? '(310) 736-0907' }}</h5>
                            </div>
                        </div>
                        <div class="contract--us--right--item">

                            <div class="contract--us--right--item--svg">
                                <div class="contract--us--right--item--svg--picture">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M10.144 3.22943C10.1631 3.15805 10.1961 3.09112 10.241 3.03248C10.286 2.97384 10.3421 2.92464 10.4061 2.88768C10.4701 2.85072 10.5407 2.82673 10.614 2.81709C10.6872 2.80744 10.7617 2.81233 10.8331 2.83146C11.8758 3.10354 12.8272 3.64867 13.5893 4.41071C14.3513 5.17275 14.8964 6.12415 15.1685 7.16693C15.1877 7.23831 15.1925 7.31276 15.1829 7.38602C15.1733 7.45929 15.1493 7.52993 15.1123 7.59392C15.0753 7.65791 15.0261 7.71399 14.9675 7.75896C14.9089 7.80393 14.8419 7.8369 14.7706 7.856C14.723 7.86848 14.6741 7.87486 14.625 7.87498C14.5011 7.87498 14.3806 7.83403 14.2823 7.7585C14.184 7.68298 14.1134 7.5771 14.0815 7.45732C13.8596 6.60607 13.4147 5.82938 12.7926 5.20734C12.1706 4.58529 11.3939 4.14039 10.5427 3.9185C10.4712 3.89948 10.4042 3.86656 10.3455 3.82162C10.2868 3.77669 10.2375 3.72062 10.2005 3.65662C10.1634 3.59262 10.1394 3.52195 10.1297 3.44865C10.12 3.37535 10.1249 3.30086 10.144 3.22943ZM9.98016 6.1685C10.9498 6.42725 11.5727 7.05021 11.8315 8.01982C11.8634 8.1396 11.934 8.24548 12.0323 8.321C12.1306 8.39653 12.2511 8.43748 12.375 8.43748C12.4241 8.43736 12.473 8.43098 12.5206 8.4185C12.5919 8.3994 12.6589 8.36643 12.7175 8.32146C12.7761 8.27649 12.8253 8.22041 12.8623 8.15642C12.8993 8.09243 12.9233 8.02179 12.9329 7.94852C12.9425 7.87526 12.9377 7.80081 12.9185 7.72943C12.5585 6.38225 11.6177 5.44146 10.2706 5.08146C10.1264 5.04296 9.97286 5.06329 9.8437 5.13799C9.71454 5.21269 9.62035 5.33564 9.58184 5.47978C9.54333 5.62393 9.56367 5.77748 9.63836 5.90664C9.71306 6.03579 9.83601 6.12999 9.98016 6.1685ZM15.7416 12.8728C15.6162 13.8255 15.1483 14.7001 14.4253 15.3331C13.7022 15.9661 12.7735 16.3142 11.8125 16.3125C6.22969 16.3125 1.68751 11.7703 1.68751 6.18748C1.68578 5.22651 2.03393 4.29778 2.66691 3.57473C3.2999 2.85169 4.17444 2.38379 5.12719 2.25842C5.36812 2.229 5.6121 2.27829 5.82272 2.39893C6.03333 2.51957 6.19928 2.70509 6.29579 2.92779L7.78079 6.24303V6.25146C7.85468 6.42194 7.88519 6.60806 7.86961 6.79321C7.85403 6.97835 7.79283 7.15675 7.69149 7.31248C7.67883 7.33146 7.66547 7.34904 7.65141 7.36662L6.18751 9.10193C6.71415 10.1721 7.83352 11.2816 8.91774 11.8097L10.6291 10.3535C10.646 10.3394 10.6636 10.3262 10.6819 10.3141C10.8375 10.2103 11.0165 10.147 11.2027 10.1298C11.389 10.1126 11.5766 10.1421 11.7485 10.2157L11.7577 10.2199L15.0701 11.7042C15.2932 11.8004 15.4792 11.9662 15.6002 12.1768C15.7212 12.3875 15.7708 12.6316 15.7416 12.8728ZM14.625 12.7322C14.625 12.7322 14.6201 12.7322 14.6173 12.7322L11.3126 11.2521L9.60047 12.7083C9.58387 12.7223 9.5665 12.7355 9.54844 12.7476C9.38655 12.8556 9.19941 12.9198 9.00531 12.9339C8.81121 12.9479 8.61678 12.9114 8.44102 12.8278C7.12407 12.1915 5.81133 10.8886 5.1743 9.58568C5.08995 9.41121 5.0521 9.2179 5.06441 9.02449C5.07673 8.83109 5.13881 8.64414 5.24462 8.48178C5.25654 8.46271 5.26994 8.44461 5.28469 8.42764L6.75001 6.69021L5.27344 3.38553C5.27317 3.38272 5.27317 3.37989 5.27344 3.37709C4.59159 3.46603 3.96555 3.80049 3.51255 4.31781C3.05955 4.83514 2.81066 5.49985 2.81251 6.18748C2.81511 8.57363 3.76416 10.8613 5.45142 12.5486C7.13869 14.2358 9.42636 15.1849 11.8125 15.1875C12.4997 15.1898 13.1642 14.9418 13.6819 14.4898C14.1995 14.0378 14.5348 13.4127 14.625 12.7315V12.7322Z"
                                            fill="#141414" />
                                    </svg>
                                </div>
                            </div>
                            <div class="contract--us--right--item--content">
                                <h6>call or Text us</h6>
                                <h5>
                                    <h5>{{ $studentCms[0]->sub_title ?? '(310) 736-0907' }}</h5></h5>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== let us help You start hare ====================== -->

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
                            <h5>Student Intake <span>Form</span></h5>

                            <p>This information will help us find the perfect placement for you. Click here to
                                navigate to the Google Form.</p>
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
                        <a href="#">{{ $cms[5]->button_text ?? 'Contact Us' }}</a>
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
                    <a href="faq.html">See More</a>
                </div>
            </div>
        </div>
    </section>
    <!-- ====================== FAQ start hare ====================== -->
@endsection
