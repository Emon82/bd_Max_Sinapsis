<nav>
    <div class="navbar--wrapper">
        <div class="container">

            <div class="navbar--main">
                <div class="navbar--logo--manu">
                    <div class="navbar--menu">
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('available-preceptors') }}">Available preceptors</a>
                            </li>
                            <li>
                                <a href="{{ route('conatct-us') }}">Contact Us</a>
                            </li>
                        </ul>
                    </div>


                    <div class="navbar--logo">
                        <div class="nav--logo--img">
                            <a href="">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="not found">
                            </a>

                        </div>
                    </div>
                </div>


                <div class="navbar--btn">
                    <a href="{{ route('become-preceptor') }}">Become A Preceptor</a>
                </div>

                  <!-- new line added -->
                  <div class="harmburg--icon">
                    <div class="hamburg--svg">
                        <img src="{{ asset('frontend/images/harmburgerIcon.svg') }}" alt="not found">
                    </div>
                </div>
                <!-- new line added -->
            </div>
        </div>
          <!-- phone nav added strat-->
          <div class="phone--navbar">
            <div class="navbar--menu--btn--wrapper--phone">

                <div class="navbar--menu--logo--wrapper--phone">
                    <div class="navbar--menu--logo">
                        <a href="index.html">
                            <div class="navbar--menu--img">
                                <img src="{{ asset('frontend/images/logo.png') }}" alt="not found">
                            </div>
                        </a>
                    </div>

                    <div class="navbar--menu--phone">
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('about') }}">About</a>
                            </li>
                            <li>
                                <a href="{{ route('available-preceptors') }}">Available preceptors</a>
                            </li>
                            <li>
                                <a href="{{ route('conatct-us') }}">Contact Us</a>
                            </li>
                        </ul>

                    </div>
                </div>

                <div class="navbar--menu--btn">
                    <a href="{{ route('become-preceptor') }}">Become A Preceptor</a>
                </div>
            </div>
        </div>
        <!-- phone nav added end-->
    </div>
</nav>
