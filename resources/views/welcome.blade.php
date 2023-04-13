<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Saint Charles Academy</title>
        <!-- Favicon-->
        <link rel="shortcut icon" type="image/x-icon" href="{{ url("../images/sca_logo.png") }}" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
            @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    </head>
    <body class="d-flex flex-column h-100" id="home">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-danger bg-danger">
                <div class="container px-5">
                    <a class="navbar-brand text-white" href="index.html">Saint Charles Academy</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="#aboutUs">About</a></li>
                            {{-- <li class="nav-item"><a class="nav-link" href="#vision">Vision & Mission</a></li> --}}
                            <li class="nav-item"><a class="nav-link" href="#location">Location</a></li>
                            {{-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownBlog" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownBlog">
                                    <li><a class="dropdown-item" href="blog-home.html">Blog Home</a></li>
                                    <li><a class="dropdown-item" href="blog-post.html">Blog Post</a></li>
                                </ul>
                            </li> --}}
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="py-5" style="background-image: '{{ URL::asset('images/sca_background.jpeg') }}';">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-dark mb-2">Saint Charles Academy Tutorial Page</h1>
                                <p class="lead fw-normal text-dark-50 mb-4">A Saint Charles Academy Tutorial Page provides step-by-step instructions, visual aids, and examples that can help learners acquire new knowledge or skills and master complex concepts.</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-danger btn-lg px-4 me-sm-3" href="{{ URL::asset('/auth') }}">Join Us</a>
                                    <a class="btn btn-danger btn-lg px-4" href="#aboutUs">Learn More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="{{ URL::asset('images/educational.jpeg') }}" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <div class="service-item text-center pt-3">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-graduation-cap text-primary mb-4"></i>
                                    <img class="rounded-circle me-3" style="width:120px; height: 120px; margin-bottom: 10px;"src="https://media.istockphoto.com/id/1092432244/photo/multi-ethnic-preschool-teacher-and-students-in-classroom.jpg?s=612x612&w=0&k=20&c=6LmjzzPNzpi1KfHt0hoH8eJXMk0XzVUezX9at6gg8w4=" alt="..." />
                                    <h5 class="mb-3">Skilled Instructors</h5>
                                    <p>Skilled instructors are essential for delivering high-quality education and training to students.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <div class="service-item text-center pt-3">
                                <div class="p-4">
                                    <img class="rounded-circle me-3" style="width:120px; height: 120px; margin-bottom: 10px;"src="https://d1cjvcgxj35ond.cloudfront.net/cms/thumbnails/00/502x335/images/virtual%20programs/Image-Only-girl-on-computer-2.jpeg" alt="..." />
                                    <h5 class="mb-3">Online Classes</h5>
                                    <p>Online classes provide a convenient and flexible way for students to learn and access educational resources from anywhere with an internet connection.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
                            <div class="service-item text-center pt-3">
                                <div class="p-4">
                                    <img class="rounded-circle me-3" style="width:120px; height: 100px; margin-bottom: 10px;"src="https://img.freepik.com/premium-vector/happy-cute-little-kids-boy-girl-make-paper-craft-with-teacher_97632-1975.jpg?w=2000" alt="..." />                                    
                                    <h5 class="mb-3">Home Projects</h5>
                                    <p>Home projects can be a fun and rewarding way to improve your living space, learn new skills, and express your creativity.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp;">
                            <div class="service-item text-center pt-3">
                                <div class="p-4">
                                    <img class="rounded-circle me-3" style="width:120px; height: 100px; margin-bottom: 10px;"src="https://media.npr.org/assets/img/2017/10/19/gettyimages-636177590_slide-284b8184b0626cdef895ac8cdb9cd858f88ca422.jpg" alt="..." />
                                    <h5 class="mb-3">Book Library</h5>
                                    <p>Book library is a treasure trove of literature, offering a vast collection of books on various subjects, genres, and authors, waiting to be explored and discovered by avid readers.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                        <!-- Blog preview section-->
                        {{-- <section class="py-5">
                            <div class="container px-5 my-5" id="vision">
                                <div class="row gx-5 justify-content-center">
                                    <div class="col-lg-8 col-xl-6">
                                        <div class="text-center">
                                            <h2 class="fw-bolder">Saint Charles Academy </h2>
                                            <p class="lead fw-normal text-muted mb-5">Vision , Mission </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gx-5">
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="https://dummyimage.com/600x350/adb5bd/495057" alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-danger bg-gradient rounded-pill mb-2">Vision</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Saint Charles Academy Vision</h5></a>
                                                <p class="card-text mb-0">To be a Model Catholic community where each person finds fulfilment of his god given talents in working together for Christ through Holistic Catholic education and formation</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 mb-5">
                                        <div class="card h-100 shadow border-0">
                                            <img class="card-img-top" src="https://dummyimage.com/600x350/6c757d/343a40" alt="..." />
                                            <div class="card-body p-4">
                                                <div class="badge bg-danger bg-gradient rounded-pill mb-2">Mission</div>
                                                <a class="text-decoration-none link-dark stretched-link" href="#!"><h5 class="card-title mb-3">Saint Charles Academy Mission</h5></a>
                                                <p class="card-text mb-0">The school works for the formation of the whole man through Christian Catholic education which promotes harmonious development of the students spiritual, moral, intellectual, emotional, social and physical faculties</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Call to action-->
                            </div>
                        </section> --}}
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5">
                        <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s" style="min-height: 400px; visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp;">
                            <div class="position-relative h-100">
                                <img class="img-fluid position-absolute w-100 h-100" src="{{ URL::asset('images/sca_background.jpg') }}" alt="" style="object-fit: cover;">
                            </div>
                        </div>
                        <div id="aboutUs"class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp;">
                            <h6 class="section-title text-start text-primary pe-3">About Us</h6>
                            <h1 class="mb-4">Welcome to St. Charles Academy (SCA)</h1>
                            <p class="mb-4">St. Charles Academy (SCA) is a private Catholic academic institution located in San Carlos, Pangasinan. It was founded in 1969. The school provides a quality Christian education to promote the spiritual, moral, intellectual, and physical development of the students. 

                                SCA implements a K-12 basic education program that offers preschool, grade school, junior and senior high school under the order mandated by the Department of Education (DepEd). It has GAS, ABM strand, HUMSS strand and STEM strand under the Academic track as well as Technical Vocational Livelihood (TVL) track which equips the students with technical skills.</p>
                            {{-- <div class="row gy-2 gx-4 mb-4">
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Skilled Instructors</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>Online Classes</p>
                                </div>
                                <div class="col-sm-6">
                                    <p class="mb-0"><i class="fa fa-arrow-right text-primary me-2"></i>International Certificate</p>
                                </div>
                            </div> --}}
                            <a class="btn btn-primary py-3 px-5 mt-2" href="">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Testimonial section-->
            <div class="py-5 bg-light">
                <div class="container px-5 my-5">
                    <div class="row gx-5 justify-content-center">
                        <div class="col-lg-10 col-xl-7">
                            <div class="text-center">
                                <div class="fs-4 mb-4 fst-italic">"Charles rose to the ranks of the Church because of his familial ties. However, he did not use such ties to lord it over people. For him, it was an opportunity to serve God's people. His motto, Humilitas (Humility), was preached not just by his words but by the life he lived.
                                    Known as the loving reformer, Charles Borromeo cared about people and wanted them to know that the Church of God cared about them, too. His changes and reforms in the way the Church was organized, changed the way that the Church listened to the people—all of them, not just the rich and powerful."</div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="rounded-circle me-3" style="width:100px; heigh: 100px;"src="https://www.gaudiumpress.ca/wp-content/uploads/2021/11/San_Carlo_Borromeo-aspect-ratio-394-290.jpg" alt="..." />
                                    <div class="fw-bold">
                                        Saint Charles Borromeo
                                        {{-- <span class="fw-bold text-primary mx-1">/</span>
                                        CEO, Pomodoro --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p>Location:</p>
                                <div id="location" class="mapouter"><div class="gmap_canvas"><iframe class="gmap_iframe" width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=2048&amp;height=575&amp;hl=en&amp;q=Saint Charles Academy&amp;t=h&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a href="https://pdflist.com/" alt="pdf">Pdf</a></div><style>.mapouter{position:relative;text-align:right;width:100%;height:575px;}.gmap_canvas {overflow:hidden;background:none!important;width:100%;height:575px;}.gmap_iframe {height:575px!important;}</style></div>
                </div>
            </div>
        </main>
        <!-- Footer-->
        <footer class="bg-dark py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="small m-0 text-white">Copyright &copy; Saint Charles Academy Tutorial Page 2023</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#home">Home</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#about">About</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#location">Location</a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
