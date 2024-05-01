@extends('frontend.layouts.app')
@section('content')
<!-- banner -->

<!-- header banner -->
<div class="container-fluid slider-section">

    <div class="row">
        <div class="col-12 px-0">
            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('/images/header-banner-about_us.png') }}" class="d-block w-100"
                            alt="Services Header Banner">
                        <div class="carousel-caption header-banner">
                            <h1 class="font-40 family-Questrial fw-500 light-black">Our Story</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- / header banner -->

<!-- breifing -->
<div class="container-fluid">
    <div class="container">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-8 col-sm-12">
                <p class="f-nunito about-p p-lg-5 p-md-3 p-sm-3 fs-18 clr-br">RDK Civil Engineering Limited was
                    founded with the
                    purpose of being the most dependable and trustworthy
                    engineering firm in the UK, managed by a team of certified civil engineers.
                    Our staff approaches each customer with a new perspective, developing customized and inventive
                    solutions
                    to satisfy their specific requirements.
                </p>

            </div>
        </div>
    </div>
</div>

<!-- vision mission -->


<div class="container-fluid">
    <div class="container">
        <div class="row text-center">
            <h2 class="f-nunito fs-30 fw-700 py-5 reason clr-br">Reason For Being</h2>
        </div>
    </div>
</div>

<div class="container-fluid vision">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-6 col-md-12 col-sm-12 px-2 bd">
                <h2 class="vision-h fs-40 f-questrial fw-500">Vision</h2>
                <p class="vision-p f-questrial fs-20">At RDK Civil Engineering Company, our vision is to be a leading
                    provider of innovative and sustainable engineering solutions, driving positive change in
                    infrastructure development and shaping a better future for communities worldwide. </p>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12 px-2">
                <h2 class="mission-h fs-40 f-questrial fw-500">Mission</h2>
                <p class="mission-p f-questrial fs-20 px-2">The mission of RDK Civil Engineering Company is to deliver
                    exceptional engineering services with integrity, expertise, and innovation, creating sustainable and
                    resilient infrastructure that improves lives and enhances the environment.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- directors message -->
<div class="container-fluid team">
    <div class="container">
        <div class="row py-5 d-flex align-items-center">
            <div class="col-lg-3 col-sm-6 pb-sm-3 director text-center">
                <img src="{{ asset('images/contact/director.png') }}" class="w-100 rounded-3 mx-sm-auto" alt="">
            </div>
            <div class="col-lg-9 col-sm-12 director-message-column">
                <h2 class="f-nunito fs-30 fw-700 director-h clr-br m-0 mb-lg-3 mb-sm-3 mb-0">A Word From The Directors</h2>
                <p class="director-msg f-nunito fs-16 fw-600 pb-2">Welcome to RDK Civil Engineering Limited, a leading
                    engineering consultancy in the UK with 19 years’ experience. As the Managing Director, I am proud to
                    lead a team of highly skilled and qualified architects and structural engineers who are committed to
                    delivering exceptional services to our clients
                </p>
                <p class="director-msg f-nunito fs-16 fw-600 pb-2">At RDK Civil Engineering Limited, we understand that
                    each client has unique requirements. That's why we take a fresh approach to every project, ensuring
                    that our solutions are tailored to meet their specific needs. Whether it's obtaining planning
                    permissions, providing architectural services, offering structural engineering expertise, or
                    ensuring compliance with building control regulations, we are here to assist you every step of the
                    way.
                </p>

                <p class="director-msg f-nunito fs-16 fw-600 pb-2">Our goal is to become the most dependable and
                    trustworthy engineering consultancy in the industry. We achieve this through our unwavering
                    commitment to quality, professionalism, and innovation. With our wealth of experience and technical
                    expertise, we strive to exceed our clients' expectations and deliver projects of the highest
                    standards.
                </p>

                <p class="director-msg f-nunito fs-16 fw-600 pb-2">I invite you to explore our website and learn more
                    about the comprehensive range of services we offer. From concept to completion, RDK Civil
                    Engineering Limited is your trusted partner in turning your vision into reality. Feel free to
                    contact us to discuss your project requirements, and our team will be delighted to assist you.
                </p>

                <p class="director-msg f-nunito fs-16 fw-600 pb-2">Thank you for considering RDK Civil Engineering
                    Limited as your engineering consultancy of choice. We look forward to working with you and
                    delivering outstanding results
                </p>
                <div class="row mt-3 ps-lg-3">
                    <div class="col-lg-10 col-md-12 director-info-card py-2 rounded-3">
                        <p class=" f-nunito fs-4 fw-700 ps-2 p-1">
                            Ranga Kalupahana <span class="font-4 fw-500">- CEng MICE, B.Sc. Eng. (Hons)</span><br>
                            <span class=" fs-5 fw-400">
                                Managing Director
                            </span>
                        </p>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="row d-flex justify-content-around">
            <div class="col-lg-8 col-md-10">
                <div class="end-bar text-center">
                    <img src="{{ asset('images/contact/end-bar.png') }}" class="w-50 py-5 my-2" alt="">
    </div>
</div>
</div> --}}
</div>
</div>

<!-- team -->
<div id="meet_them"></div>
<div class="container-fluid pb-5">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="f-nunito fs-30 fw-700 py-5 reason clr-br">Meet Our Team</h2>
            </div>
        </div>

        <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team01.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Sasith Mahawaduge</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Schemes Delivery Manager</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng (Hons), M.Sc.(Con.PM),
                                AMIE(SL)</b> </p>
                        <p class="fs-6 f-nunito description-text">A professional engineer with 4 years’ experience.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team02.png') }}" class="w-75" alt="Asanka Anuradha">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Asanka Anuradha</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Schemes Design Manager</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng(Hons),Meng(Struct.Eng
                                Design),CEng,MIE(SL),GMICE</b> </p>
                        <p class="fs-6 f-nunito description-text">A professional structural engineer with 21 years’
                            experience.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team03.png') }}" class="w-75" alt="Udayanga Alwis">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Udayanga Alwis</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Senior Structural Engineer</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng(Hons), PG Dip. in Struct. Eng,
                                CEng, MIE(SL), GMICE(UK)</b> </p>
                        <p class="fs-6 f-nunito description-text">An execute structural engineer with 18+ years’
                            experience.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/nandana.png') }}" class="w-75" alt="Udayanga Alwis">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Nandana Premachandrasiri</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Senior Structural Engineer</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng(Hons), CEng.
                            MIE(SL)</b> </p>
                        <p class="fs-6 f-nunito description-text">MSSE Accredited Member of Green Building Council with 18+ years’ experience.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team04.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Susanka
                            Mathangaweera</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Senior Structural Engineer</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng(Hons), PG Dip. in Struct. Eng,
                                CEng, MIE(SL), GIStructE(UK)</b> </p>
                        <p class="fs-6 f-nunito description-text">A professional structural engineer with 18 years’
                            experience</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>




            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team06.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Asanaka Laknatha</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Structural Engineer</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Sc Eng, MSc. Eng (Structural), CEng,
                                MIE(SL), MIE(SL)</b> </p>
                        <p class="fs-6 f-nunito description-text">A qualified structural engineer with 18+ years’
                            experience and Managing Director of NEXTEC engineering PVT LTD.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team07.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Chinthaka
                            Wijayawickrama</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Senior Architect</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B.Arch(Hons), AIA(SL), RIBA(UK)</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">A professional senior architect in our company with 5+
                            years’ experience.</p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team08.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Suranshika
                            Rathnayake</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Senior Architect</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>B. Sc(BE), M.Sc(Arch.), AIA(SL)</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">A talented architecture with 13+ years’ experience.
                        </p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team09.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Himasha
                            Gunathilaka</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Architect</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>BA Int.Archt</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">A qualified architect in our company with 1+ year
                            experience.
                        </p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team10.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Janith Isanka</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Project Coordinator</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>BTec</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">A talented software engineer in our company.
                        </p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team11.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Manoj Ranaweera</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Draughtsman</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>NCED</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">A professional draughtsman with 7+ years’ experience.
                        </p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12 mb-4">
                <div class="team-shadow rounded-3 py-4">
                    <img src="{{ asset('images/contact/team12.png') }}" class="w-75" alt="Sasith Mahawaduge">
                    <div class="card-body pb-0">
                        <h5 class=" f-nunito fs-5 fw-800 mb-2 name-text">Kavindi Manodya</h5>
                        <p class="f-nunito mb-2 fs-6"><b>Software Engineer</b></p>
                        <p class="f-nunito fs-6 pt-1 mb-2 experience-content"><b>BSE(Hons)</b>
                        </p>
                        <p class="fs-6 f-nunito description-text">An execute software engineer in our company.
                        </p>
                        <!-- <div class="rounded-social-buttons pt-2 pe-lg-0">
                            <a class="social-button facebook hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-facebook-f"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin"></i></a>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <a class="social-button linkedin hvr-wobble-bottom" href="#" target="_blank"><i
                                    class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                        </div> -->
                    </div>
                </div>
            </div>

        </div>


        {{-- <div class="row justify-content-center text-center">
            <div class="col-lg-3 col-sm-6 col-6 rounded-3">
                <img src="{{ asset('images/contact/asanka.jpg') }}" class="w-100 rounded-3 border border-dark"
        alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Asanka Anuradha</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Schemes Design Manager</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Sc Eng(Hons), MEng (Struct. Eng
                Design), CEng, MIE(SL), GMICE</p>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/udayanga.png') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Udayanga Alwis</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Senior Structural Engineer</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Sc Eng(Hons), PG Dip. in Struct.
                Eng, CEng, MIE(SL), GMICE(UK) </p>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/susanka.jpg') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Susanka Mathangaweera</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Senior Structural Engineer</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Sc Eng(Hons), PG Dip. in Struct.
                Eng, CEng, MIE(SL), GIStructE(UK) </p>
        </div>
    </div>
</div>
<div class="row justify-content-center text-center pt-3">
    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/hemantha.jpg') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Hemantha Ariyasena</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Structural Engineer</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Sc Eng(Hons), PG Dip. in Struct </p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/laknath.jpg') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Asanka Laknatha </h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Structural Engineer</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Sc Eng, MSc. Eng (Structural), CEng,
                MIE(SL), MIE(SL) </p>
        </div>
    </div>
    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/chinthaka.jpg') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Chinthaka Wijayawickrama</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Senior Architect</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B.Arch(Hons), AIA(SL), RIBA(UK)</p>
        </div>
    </div>

    <div class="col-lg-3 col-sm-6 col-6">
        <img src="{{ asset('images/contact/suranshika.jpg') }}" class="w-100 rounded-3 border border-dark"
            alt="Sasith Mahawaduge">
        <div class="card-body">
            <h5 class="card-title f-nunito fs-16 fw-800">Suranshika Rathnayake</h5>
            <p class="card-text f-nunito fs-14 fw-bolder">Senior Architect</p>
            <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">B. Sc(BE), M.Sc(Arch.), AIA(SL) </p>
        </div>
    </div>

    <div class="row text-center pt-3">
        <div class="col-lg-3 col-sm-6 col-6">
            <img src="{{ asset('images/contact/himasha.jpg') }}" class="w-100 rounded-3 border border-dark"
                alt="Sasith Mahawaduge">
            <div class="card-body">
                <h5 class="card-title f-nunito fs-16 fw-800">Himasha Gunathilaka</h5>
                <p class="card-text f-nunito fs-14 fw-bolder">Architect</p>
                <p class="card-text f-nunito fs-12 fw-bolder pt-1 text-black">BA Int.Archt. </p>

            </div>
        </div>
    </div>
</div> --}}
</div>
</div>



<!-- partners -->
<div class="container-fluid pb-4">
    <div class="container">

        <div class="row text-center">
            <div class="col-12">
                <h2 class="f-nunito fs-30 fw-700 py-5 reason clr-br">Our Partners</h2>
            </div>



            <div class="row justify-content-center">
                <div class="col-lg-3 col-sm-6 col-6">
                    <a href="http://csec.lk/" class="hvr-grow" target="_blank">
                        <img src="{{ asset('images/contact/csec.png') }}" class="partner-img" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-6">
                    <a href="https://www.nextecengineering.com/" class="hvr-grow" target="_blank">
                        <img src="{{ asset('images/contact/nextec.jpg') }}" class="partner-img" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-6">
                    <a href="https://www.uro.lk/index.html" class="hvr-grow" target="_blank">
                        <img src="{{ asset('images/contact/uro.png') }}" class="partner-img" alt="">
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6 col-6">
                    <a href="https://npconsultants.info/" class="hvr-grow" target="_blank">
                        <img src="{{ asset('images/contact/np.jpg') }}" class="partner-img" alt="">
                    </a>
                </div>
            </div>

        </div>
    </div>




</div>
@endsection
