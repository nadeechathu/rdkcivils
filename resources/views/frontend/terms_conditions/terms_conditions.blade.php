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
                            <h1 class="font-40 family-Questrial fw-500 light-black">Terms and Conditions</h1>
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
    <div class="container py-5 f-nunito fs-6">
        <div class="row d-flex justify-content-around">
            <div class="col-lg-12 col-sm-12">

                <h3 class="f-nunito"><b>1. Introduction</b></h3>
                <p class="mt-2 mb-5">These terms and conditions govern your use of our website. By using this website,
                    you accept these
                    terms and conditions in full; if you disagree with these terms and conditions or any part of these
                    terms and conditions, you must not use this website.</p>

                <h3 class="f-nunito"><b>2. Intellectual Property Rights</b></h3>
                <p class="mt-2 mb-2">2.1 Unless otherwise stated, we or our licensors own the intellectual property
                    rights in the website and material on the website. Subject to the license below, all these
                    intellectual property rights are reserved.</p>
                <p class="mt-2 mb-5">2.2 You may view, download for caching purposes only, and print pages from the
                    website for your own personal use, subject to the restrictions set out below and elsewhere in these
                    terms and conditions.</p>

                <h3 class="f-nunito"><b>3. Restrictions</b></h3>
                <p class="mt-2 mb-2">You must not.</p>
                <p class="mt-2 mb-2">- Republish material from this website (including republication on another
                    website).</p>
                <p class="mt-2 mb-2">- Sell, rent, or sub-license material from the website.</p>
                <p class="mt-2 mb-2">- Show any material from the website in public.</p>
                <p class="mt-2 mb-2">- Reproduce, duplicate, copy, or otherwise exploit material on our website for a
                    commercial purpose.</p>
                <p class="mt-2 mb-5">- Edit or otherwise modify any material on the website.</p>

                <h3 class="f-nunito"><b>4. Limitations of Liability</b></h3>
                <p class="mt-2 mb-2">4.1 We will not be liable to you (whether under the law of contract, the law of
                    torts, or otherwise) in relation to the contents of, or use of, or otherwise in connection with,
                    this website:</p>
                <p class="mt-2 mb-2 ms-3">- To the extent that the website is provided free-of-charge, for any direct
                    loss.
                </p>
                <p class="mt-2 mb-2 ms-3">- For any indirect, special, or consequential loss.</p>
                <p class="mt-2 mb-2 ms-3">- Show any material from the website in public.</p>
                <p class="mt-2 mb-2 ms-3">- For any business losses, loss of revenue, income, profits, or anticipated
                    savings, loss of contracts, or business relationships, loss of reputation or goodwill, or loss or
                    corruption of information or data.</p>
                <p class="mt-2 mb-5">4.2 These limitations of liability apply even if we have been expressly advised of
                    the potential loss.</p>

                <h3 class="f-nunito"><b>5. Variation</b></h3>
                <p class="mt-2 mb-5">We may revise these terms and conditions from time to time. Revised terms and
                    conditions will apply to the use of this website from the date of the publication of the revised
                    terms and conditions on this website. Please check this page regularly to ensure you are familiar
                    with the current version.</p>

                <h3 class="f-nunito"><b>6. Entire Agreement</b></h3>
                <p class="mt-2 mb-5">These terms and conditions, together with our privacy policy, constitute the entire
                    agreement between you and us regarding your use of this website.</p>
            </div>
        </div>
    </div>
</div>


@endsection