<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Collect-It</title>
    @vite('resources/css/app.css')
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    @include('common.header')

    <div class="carousel w-full carousel-center content-center">
        <div id="item1" class="carousel-item w-full">
            <div class="card bg-cyan-800 shadow-xl m-10 glass">
                <figure class="px-10 pt-10">
                    <div class="carousel carousel-center rounded-box">
                        <div class="carousel-item">
                            <img src="../storage/gundambg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/hotwheelsbg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/funkobg.png" alt="Pizza" />
                        </div> 
                    </div>
                </figure>
                <div class="card-body items-center text-center">
                    <h1 class="card-title text-4xl text-white">Welcome to Collect-It</h1>
                    <p class=" text-white">
                        Collect-IT is an innovative e-commerce platform dedicated to serving the vibrant community of toy collectors worldwide. With a deep understanding of the passion and enthusiasm that drives collectors, we have emerged as a response to the evolving needs of this niche market. Our platform provides a comprehensive online space where collectors can explore, connect, and acquire their favorite collectibles with ease. By harnessing the power of technology, we aim to revolutionize the toy collecting experience, making it more accessible, engaging, and enjoyable for enthusiasts of all levels.
                    </p>
                    <div class="card-actions"> 
                    </div>
                </div>
            </div>
        </div> 
        <div id="item2" class="carousel-item w-full text-center content-center">
            <div class="card bg-cyan-800 shadow-xl m-10 glass">
                <figure class="px-10 pt-10">
                    <div class="carousel carousel-center rounded-box">
                        <div class="carousel-item">
                            <img src="../storage/gundambg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/hotwheelsbg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/funkobg.png" alt="Pizza" />
                        </div> 
                    </div>
                </figure>
                <div class="card-body items-center text-center">
                    <h1 class="card-title text-4xl text-white">Vision</h1>
                    <p class=" text-white">
                    Our vision at Collect-IT is to become the premier destination for toy collectors, offering a diverse selection of collectible items and fostering a thriving community of enthusiasts. We envision a future where collectors can seamlessly browse and purchase their favorite items, connect with like-minded individuals, and immerse themselves in the world of toy collecting like never before. Through continuous innovation and a commitment to customer satisfaction, we aspire to redefine the online shopping experience for collectors worldwide.
                    </p>
                    <div class="card-actions">
                    </div>
                </div>
            </div>
        </div> 
        <div id="item3" class="carousel-item w-full">
            <div class="card bg-cyan-800 shadow-xl m-10 glass">
                <figure class="px-10 pt-10">
                    <div class="carousel carousel-center rounded-box">
                        <div class="carousel-item">
                            <img src="../storage/gundambg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/hotwheelsbg.png" alt="Pizza" />
                        </div> 
                        <div class="carousel-item">
                            <img src="../storage/funkobg.png" alt="Pizza" />
                        </div> 
                    </div>
                </figure>
                <div class="card-body items-center text-center">
                    <h1 class="card-title text-4xl text-white">Mission</h1>
                    <p class=" text-white">
                    At Collect-IT, our mission is to create a user-friendly and secure online platform that caters to the unique needs and preferences of toy collectors. We are dedicated to providing a wide selection of high-quality collectibles, ranging from iconic figures to limited edition models, to satisfy the diverse tastes of our customers. Through effective collaboration with stakeholders, including customers, administrators, web developers, and database administrators, we strive to deliver a seamless shopping experience that exceeds expectations. By prioritizing performance, security, and usability, we aim to empower collectors to pursue their passion and build meaningful connections within the community.
                    </p>
                    <div class="card-actions">
                    </div>
                </div>
            </div>
        </div> 
    </div> 

    <div class="flex justify-center w-full py-2 gap-2">
        <a href="#item1" class="btn btn-s">About Us</a> 
        <a href="#item2" class="btn btn-s">Vision</a> 
        <a href="#item3" class="btn btn-s">Mission</a> 
    </div>

    @include('common.footer')
</body>
</html>