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
                            <h1 class="font-40 family-Questrial fw-500 light-black">FAQs</h1>
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
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingOne">
                            <button class="accordion-button faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true"
                                aria-controls="faqOne">
                                What do you offer?
                            </button>
                        </h2>
                        <div id="faqOne" class="accordion-collapse collapse show" aria-labelledby="faqFeadingOne"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>We offer a comprehensive service that encompasses architectural outline drawings,
                                    detailed construction drawings, planning permission applications, structural
                                    calculations, and building control applications. By combining these services into
                                    one
                                    package, we can reduce the consultancy fee by up to 40%. Traditionally, clients
                                    would
                                    have to pay for an architect twice and a structural engineer separately, following
                                    the
                                    conventional architect and engineer route.</p>
                                <p>However, with our all-inclusive consultancy package, clients can save significantly
                                    on
                                    costs. Furthermore, we take great pride in our company's reputation and strive to
                                    maintain a high level of customer satisfaction.</p>
                                <p>We are proud to inform you that we have never received a negative review from any of
                                    our
                                    previous customers. We understand the importance of client feedback, and to further
                                    assure you of our capabilities, we invite you to visit the following link to read
                                    the
                                    reviews and testimonials provided by our satisfied clients: <a
                                        href="https://www.localsurveyorsdirect.co.uk/directory-of-members/rdk-civil-engineeringlimited]"
                                        target="_blanck" class="text-dark">
                                        [https://www.localsurveyorsdirect.co.uk/directory-of-members/rdk-civil-engineeringlimited]</a>
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingTwo">
                            <button class="accordion-button collapsed faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false"
                                aria-controls="faqTwo">
                                How does site analysis play a role in architectural and structural engineering?
                            </button>
                        </h2>
                        <div id="faqTwo" class="accordion-collapse collapse" aria-labelledby="faqFeadingTwo"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Site analysis is a crucial component in both architecture and structural engineering.
                                    Architectural site analysis involves assessing the site's natural environment,
                                    climate, topography, and surroundings to understand how these factors can influence
                                    the design of the building under the planning rules and regulations. It helps
                                    architects to plan and position various building elements with consideration of
                                    sunlight exposure, wind patterns, and views. In structural engineering, site
                                    analysis is essential to evaluate the soil conditions, water table levels, and other
                                    geotechnical factors that can impact the design and construction of the building's
                                    foundation.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingSeven">
                            <button class="accordion-button collapsed faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqSeven" aria-expanded="false"
                                aria-controls="faqSeven">
                                How can you as a structural engineer ensure the safety and stability of a building?
                            </button>
                        </h2>
                        <div id="faqSeven" class="accordion-collapse collapse" aria-labelledby="faqFeadingSeven"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Structural engineers employ various techniques to ensure the safety and stability of
                                    a building. They conduct rigorous structural analyses, considering factors such as
                                    dead loads (weight of permanent building materials), live loads (weight of occupants
                                    and moveable objects), wind loads, seismic loads, and other potential forces. By
                                    applying fundamental engineering principles, Structural engineers design structural
                                    systems capable of resisting these loads, ensuring proper distribution and transfer
                                    of forces to the building's foundation. Additionally, Structural engineers perform
                                    periodic inspections and assessments to monitor the building's condition and
                                    recommend necessary repairs or renovations.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingEight">
                            <button class="accordion-button collapsed faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqEight" aria-expanded="false"
                                aria-controls="faqEight">
                                What role do civil engineers play in sustainable building design?
                            </button>
                        </h2>
                        <div id="faqEight" class="accordion-collapse collapse" aria-labelledby="faqFeadingEight"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Civil engineers play a significant role in promoting sustainable building design and
                                    construction practices. They integrate environmentally-friendly strategies,
                                    energy-efficient systems, and sustainable materials into their designs. Civil
                                    engineers also consider factors such as water conservation, waste management, and
                                    reducing carbon emissions. By implementing sustainable practices, civil engineers
                                    contribute to the overall goal of reducing the environmental impact of buildings
                                    while also enhancing occupant comfort, health, and productivity.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingFour">
                            <button class="accordion-button collapsed faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false"
                                aria-controls="faqFour">
                                Do you provide advice on small scale projects?
                            </button>
                        </h2>
                        <div id="faqFour" class="accordion-collapse collapse" aria-labelledby="faqFeadingFour"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Yes, we are well versed in various construction projects, including small-scale ones.
                                    I am more than happy to offer advice and guidance on any small construction project
                                    you may have. Whether it's regarding design, materials, construction methods, or any
                                    other aspect, we can provide valuable insights to ensure the successful completion
                                    of your project.</p>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faqFeadingFive">
                            <button class="accordion-button collapsed faq-btn fs-4 text-dark fw-bold" type="button"
                                data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false"
                                aria-controls="faqFive">
                                Is hiring an architect a good investment?
                            </button>
                        </h2>
                        <div id="faqFive" class="accordion-collapse collapse" aria-labelledby="faqFeadingFive"
                            data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="mb-2">Hiring an architect for civil architecture projects is generally considered
                                    worthwhile for various reasons:</p>
                                <p class="mb-2">1. Expertise and knowledge: Architects are trained professionals who possess
                                    extensive knowledge and experience in designing and constructing buildings. They
                                    have a strong understanding of construction codes, regulations, and engineering
                                    principles, ensuring your project is safe and complies with all legal requirements.
                                </p>
                                <p class="mb-2">2. Creative design solutions: Architects have a unique ability to envision and create
                                    aesthetically pleasing and functional spaces. They can understand your requirements,
                                    interpret your ideas, and transform them into innovative design concepts that
                                    optimize space utilization
                                    and enhance the overall appeal of the project.</p>
                                <p class="mb-2">3. Cost-effective planning: Architects are skilled at considering the long-term costs
                                    and benefits of a project. By incorporating energy-efficient design strategies and
                                    sustainable materials, they can help reduce operating costs and improve the overall
                                    value of the construction.</p>
                                <p class="mb-2">4. Collaboration with other professionals: Architects work closely with other
                                    professionals involved in the construction process, such as engineers, contractors,
                                    and interior designers. They coordinate with these experts to ensure a smooth
                                    workflow and integration of various elements in the project, thereby minimizing
                                    conflicts and errors.</p>
                                <p class="mb-2">5. Avoiding costly mistakes: Hiring an architect can help you avoid construction
                                    mistakes that could prove expensive or time-consuming to rectify. Their attention to
                                    detail, thorough planning, and understanding of construction processes can minimize
                                    the likelihood of errors occurring during the project.</p>
                                <p class="mb-2">Ultimately, the decision to hire an architect for civil architecture projects depends
                                    on the complexity and scale of the project, as well as your personal preferences and
                                    budget. However, their expertise, design skills, and ability to streamline the
                                    construction process make them valuable assets in achieving your desired outcomes.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection