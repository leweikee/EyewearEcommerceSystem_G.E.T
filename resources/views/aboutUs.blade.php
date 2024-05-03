<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>G.E.T About Us</title>
        
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="{{ asset('/resources/css/default.css') }}">

    </head>

    <body>
        <div class="sticky-top">
            @auth
                <!-- User is logged in -->
                @include('header_success')
            @else
                <!-- User is not logged in -->
                @include('header')
            @endauth
        </div>

        <img src="{{ asset('resources/images/p5.png') }}" class="img-fluid" alt="About Us" style="Width:100%; height:75vh" >
        <div class="mx-auto" style="width: 75%">
            <div class="text-center m-5">
                <hr> 
                <h1 class="m-4"><b>ABOUT US</b></h1>
                <p class="m-4">
                    Welcome to Gorgeous Eyes Care Enterprise (G.E.T), your exclusive destination for premium imported contact lenses and top-tier eyewear. </br>
                    As the sole online wholesale distributor of renowned eyeglass brand in Malaysia, </br>
                    G.E.T brings you a curated selection that transcends borders, embodying the epitome of style and sophistication. </br>
                    Elevate your gaze with G.E.T, and we redefine eye fashion here.
                 </p>
            </div>

            <div class="mx-auto my-5" style="width: 80%">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="{{ asset('resources/images/p6.png') }}" class="img-thumbnail" alt="Our Story" style="width: auto; height: auto;">
                    </div>
                    <div class="col-md-8 text-left">
                        <h2 class="m-4">Our Story</h2>
                        <p class="m-4">
                            The story of G.E.T is deeply rooted in the personal journey of our founder, Calien Yu. 
                            She suffered from high myopia inherited in the family since childhood.
                            At the age of two, wearing glasses with a prescription of 1700 degress became a part of Calien Yu's daily life.
                            Confronting issues like lazy eye further added to the challenges. </br></br>

                            Calien Yu experienced a childhood distinct from others, as peers and school principal teased and verbally bullied her because of the thickness of the glasses.
                            These experiences left an indelible mark that she carries to this day. 
                            It is Calien Yu's personal journey and the determination to raise awareness that became the driving force behind G.E.T. </br></br>

                            In 2018, G.E.T was born from Calien Yu's desire to share a powerful message - that everyone is fortunate to have a pair of healthy eyes.
                            She implores everyone to cherish this gift and advocates for the importance of eye care.
                            Through Calien Yu's story, G.E.T aims to encourage others to protect and appreciate the invaluable gift of sight.
                        </p>
                    </div>
                </div>
            </div>

            <div class="mx-auto my-5 text-center align-items-center" style="width: 100%">
                <img class="my-3" src="{{ asset('resources/images/p7.png') }}" class="rounded mx-auto d-block" alt="vision&mission" style="width: 50%; height: auto">
                <h2 class="m-3">Our Vision</h2>
                <p class="mb-5">To be the leading provider of transformative eye care products, inspiring confidence and beauty through innovative and premium solutions</p>
                <h2 class="m-3">Our Mission</h2>
                <p class="mb-5">To bring a bright vision by providing the best eyes care products in the world</p>
            </div>

            <hr>

            <div class="text-center m-5 mb-5">
                <h1 class="m-4"><b>G.E.T'S DIFFERENCES</b></h1>
                <p class="m-4">
                Elevating Eye Care with Unmatched Value
                 </p>
            </div>

            <div class="ms-auto my-5 bg-white bg-opacity-25" style="width: 100%" >
                <div class="row m-5 me-0">
                    <div class="col-8 text-left">
                    <h3 class="mt-5">Customer Advantages</h3>
                        <ul class="list-group list-group-flush text-left">
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: 100%">
                                <div class="d-flex align-items-center">    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Affordable Excellence: High-quality eye care accessible to everyone
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: 100%">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Imported Excellence: Genuice products at budget-friendly prices
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: 100%">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Inclusivity: Ensuring diverse access to premium eye care
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between mb-3 p-0" style="background-color: transparent; overflow: hidden; width: 100%">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Authenticity Guarantee: Verified for genuine and trustworthy purchases
                                </div>
                            </li> 
                        </ul>
                    </div>

                    <div class="col-4 text-left m-0 p-0 justify-content-center">
                        <img src="{{ asset('resources/images/p8.png') }}" class="rounded mx-auto d-block" alt="customer advantage" style="width: 100%; height: 100%">
                    </div>
                </div>   
            </div>

            <div class="my-5 bg-white bg-opacity-25" style="width: 100%" >
                <div class="row m-5 ms-0">
                    <div class="col-4 text-left m-0 p-0 justify-content-center">
                        <img src="{{ asset('resources/images/p9.png') }}" class="rounded mx-auto d-block" alt="customer advantage" style="width: 100%; height: 100%">
                    </div>

                    <div class="col-8 text-left ps-5">
                    <h3 class="mt-5">Product Advantages</h3>
                        <ul class="list-group list-group-flush text-left">
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: auto">
                                <div class="d-flex align-items-center">    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Unwavering Commitment: Committed to imported excellence at affordable prices
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: auto">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Imported Products: High-quality products sourced from around the world
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between m-0 p-0" style="background-color: transparent; overflow: hidden; width: auto">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Great Prices: Custom eyeglass frame and premium sunglasses, minimum 50% off regular stores
                                </div>
                            </li>
                            <li class="list-group-item d-flex align-item-center justify-content-between mb-3 p-0" style="background-color: transparent; overflow: hidden; width: auto">
                                <div class="d-flex align-items-center"> 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-hand-thumbs-up-fill" viewBox="0 0 16 16">
                                        <path d="M6.956 1.745C7.021.81 7.908.087 8.864.325l.261.066c.463.116.874.456 1.012.965.22.816.533 2.511.062 4.51a9.84 9.84 0 0 1 .443-.051c.713-.065 1.669-.072 2.516.21.518.173.994.681 1.2 1.273.184.532.16 1.162-.234 1.733.058.119.103.242.138.363.077.27.113.567.113.856 0 .289-.036.586-.113.856-.039.135-.09.273-.16.404.169.387.107.819-.003 1.148a3.163 3.163 0 0 1-.488.901c.054.152.076.312.076.465 0 .305-.089.625-.253.912C13.1 15.522 12.437 16 11.5 16H8c-.605 0-1.07-.081-1.466-.218a4.82 4.82 0 0 1-.97-.484l-.048-.03c-.504-.307-.999-.609-2.068-.722C2.682 14.464 2 13.846 2 13V9c0-.85.685-1.432 1.357-1.615.849-.232 1.574-.787 2.132-1.41.56-.627.914-1.28 1.039-1.639.199-.575.356-1.539.428-2.59z"/>
                                    </svg>
                                    <span class="ms-3">Sole Distributor: Exclusive access to top-tier eyewear brands in Malaysia
                                </div>
                            </li> 
                        </ul>
                    </div>
                </div>        
            </div>

            <div class="mx-auto my-5 text-center" style="width: 100%">
                <div class="m-4">
                    <h5><i>Your Trust, Our Promise</i></h5>
                </div>
                <!--Authenticate Certificate Section-->
            </div>

            <hr>

            <div class="mx-auto my-5 text-center" style="width: 100%">
                <div class="m-4">
                    <h5><i>Thank you for choosing G.E.T for your eye care needs. Join us in the journey to a world of Gorgeous Eyes!</i></h5>
                </div>
            </div>
        </div>
    </body>
</html>