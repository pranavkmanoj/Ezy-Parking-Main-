<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="css/main.css" rel="stylesheet">
    <link rel="icon" href="images/favicon.png">
</head>

<body data-bs-spy="scroll" data-bs-target="#navbarExample">
<nav id="navbarExample" class="navbar navbar-expand-lg navbar-light fixed-top" aria-label="Main navigation">
    <div class="container">
        <a class="navbar-brand logo-text" href="index.php">Ezy-Parking</a>
        
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ms-auto navbar-nav-scroll justify-content-center flex-grow-1 pe-3">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#features">Services</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#FAQ'S">FAQ'S</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php#foot">Contact</a>
                </li>
            </ul>

            <div class="d-flex">
                <a class="btn btn-outline-primary me-2" href="users/login.php">User Login</a>
                <a class="btn btn-outline-primary" href="admin/index.php">Admin Login</a>
            </div>
        </div>
    </div>
</nav>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/img/Carousel1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Digital Transformation</h5>
                    <p>Customized Software Solutions for Car Parking.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/Carousel2.jpg" class="d-block w-100" alt="..." >
                <div class="carousel-caption d-none d-md-block">
                    <h5>Step Into World of AI</h5>
                    <p>Unlock Infinite Potential with AI.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="assets/img/Carousel3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Good Reliability</h5>
                    <p>Our Software Solutions are Reliable.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>  

   


    
    <div class="container py-5" id="features">
        <div class="row">
            <!-- Card 1 -->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card text-center border-0 shadow rounded-0 p-5" style="max-width: 22rem;">
                    <div class="icon mb-3">
                        <i class="bi bi-person-arms-up" style="font-size: 3rem;"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Consultancy Services</h4>
                        <p class="card-text">We provide comprehensive consultancy services for developing and optimizing parking systems, ensuring they meet your specific requirements. Our solutions focus on enhancing efficiency, reducing congestion, and improving user experience.</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 2 -->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card text-center border-0 shadow rounded-0 p-5" style="max-width: 22rem;">
                    <div class="icon mb-3">
                        <i class="bi bi-gear-wide" style="font-size: 3rem;"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Product and Technology Services</h4>
                        <p class="card-text">Our product and technology services for parking systems offer advanced solutions that integrate real-time data analytics, automated payment processing, and smart sensor technology to optimize parking space management. We provide seamless installation, maintenance, and support to ensure efficient operations and enhance the user experience.</p>
                    </div>
                </div>
            </div>
            
            <!-- Card 3 -->
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="card text-center border-0 shadow rounded-0 p-5" style="max-width: 22rem;">
                    <div class="icon mb-3">
                        <i class="bi bi-tools" style="font-size: 3rem;"></i>
                    </div>
                    <div class="card-body">
                        <h4 class="card-title fw-bold">Management of Car Park Operation</h4>
                        <p class="card-text">We expertly manage car park operations by implementing cutting-edge technology for real-time monitoring, automated ticketing, and efficient space allocation. Our comprehensive service ensures smooth day-to-day functionality, minimizes downtime, and enhances overall customer satisfaction.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Questions -->
    <div class="accordion-1" id="FAQ'S">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">FAQ'S</h2>
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="accordion" id="accordionExample">

                        <!-- Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">What is a parking management system?</button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">A parking management system is a solution to help you manage your car park. 
                                    Such systems often include features such as payment processing, monitoring & enforcement, access control and reporting.Parkable’s parking management system offers 
                                    a comprehensive set of features including automated booking & allocation, problem resolution, visitor parking, tandem and EV charging management to simplify and 
                                    streamline parking management for organisations of all shapes and sizes.
                                </div>
                            </div>
                        </div>
                        <!-- end of accordion-item -->

                        <!-- Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Why is a car park management system important?</button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">A car park management system plays a vital role in streamlining parking operations, enhancing security, improving experience, 
                                    increasing revenue, and providing valuable data for better decision-making. It reduces operational complexities while improving the experience for parkers, 
                                    and ensures efficient utilisation of parking spaces, benefiting both management and the individuals using the parking facilities.</div>
                            </div>
                        </div>
                        <!-- end of accordion-item -->

                        <!-- Accordion Item -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">How does an automated parking management system work?</button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">An automated parking management system uses technology to optimise parking and the management of car parks. Parking management 
                                    systems such as Parkable combine technology with smart algorithms to automate parking management while maximising occupancy, reducing carbon footprint 
                                    and improving the overall experience for parkers.</div>
                            </div>
                        </div>
                        <!-- end of accordion-item -->

                    </div>
                    <!-- end of accordion -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of accordion-1 -->
    <!-- end of questions -->

    <!-- Footer -->
    <div class="footer" id="foot">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer-col first">
                        <h6>About Website</h6>
                        <p class="p-small">Ezy-Parking is a complete parking management system that applies smart
                            solutions for short time rental of empty spaces.</p>
                    </div>
                    <!-- end of footer-col -->
                    <div class="footer-col second">
                        <h6>Links</h6>
                        <ul class="list-unstyled li-space-lg p-small">
                            <li>Important: <a href="terms.html">Terms & Conditions</a></li>
                            <li><a href="privacy.html">Privacy Policy</a></li>
                            <li>Menu: <a href="index.php">Home</a></li>
                            <li> <a href="#features">Services</a></li>
                            <li><a href="detail.html">Details</a></li>
                        </ul>
                    </div>
                    <!-- end of footer-col -->
                    <div class="footer-col third">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-pinterest-p fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-instagram fa-stack-1x"></i>
                            </a>
                        </span>
                        <p class="p-small">Quam posuerei pellent esque vam <a
                                href="mailto:contact@site.com"><strong>contact@site.com</strong></a></p>
                    </div>
                    <!-- end of footer-col -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of footer -->
    <!-- end of footer -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © <a href="#your-link">Ezy-Parking</a></p>
                </div>
                <!-- end of col -->
            </div>
            <!-- enf of row -->
        </div>
        <!-- end of container -->
    </div>
    <!-- end of copyright -->
    <!-- end of copyright -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
