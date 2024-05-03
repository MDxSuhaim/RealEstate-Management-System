<?php
    // Check if this is the landing page, if not redirect to landing page
    if ($_SERVER['REQUEST_URI'] === '/ims/') {
        header('Location: /IMS/home.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        /* CSS styles here */
        /* Global Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff; /* Dark space background */
            color: #0b2546; /* Dark text color */
            margin: 0;
            padding: 0;
        }

        /* Navigation Bar */
        .navbar {
            background-color: #ffffff; /* Deep space black */
            padding: 0.5rem;
            margin-bottom: -1.5%;
        }

        .navbar ul {
            list-style: none;
            display: flex;
            justify-content: space-around;
            font-weight: bold;
        }

        .navbar ul a {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            text-decoration: none;
            color: #0b2546; /* Dark text color */
            display: flex;
            font-size: 16px;
            margin-top: 25px;
        }

        .navbar a:hover {
            color: #f0c600; /* Hyperspace blue */
        }

        .navbar a[href="login.php"]{
            color: #f0c600;
        }

        /* Add hover color for the admin link */
        .navbar a[href="login.php"]:hover {
    color: #ff0000;
}

        /* Hero Section */
        .hero {
            text-align: center;
            padding: 5rem 0;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            opacity: 0.8;
        }

        /* Button Styles */
        .overlay-content button {
            background-color: #f0c600; /* Hyperspace blue */
            color: #0b2546;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: 16px;
            transition: background-color 0.3s;
            cursor: pointer;
        }
        
        .overlay-content button:hover {
            background-color: #0b2546;
            color: #fff;
        }

        /* Image with Overlay */
        .image-overlay {
            position: relative;
            text-align: center;
            color: #fff;
        }

        .image-overlay h2 {
            color: #0b2546; /* Dark text color */
            font-size: 60px;
            white-space: nowrap; /* Prevent wrapping */
        }

        .image-overlay p {
            color: #0b2546; /* Dark text color */
            font-size: 22px;
            white-space: nowrap; /* Prevent wrapping */
            font-weight: bold;
        }

        .image-overlay img {
            width: 100%;
            height: auto;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.561); /* Black overlay with 50% opacity */
        }

        .overlay-content {
            position: absolute;
            top: 50%;
            left: 0; /* Align to the left */
            right: 0; /* Align to the right */
            transform: translateY(-50%);
        }

        /* Introduction Section */
        .introduction {
            text-align: center;
            padding: 4rem 0;
            margin-top: -3.5%;
        }

        .inline-tags h1,
        .inline-tags h2 {
            display: inline; /* or display: inline-block; */
            margin: 0; /* Optionally, remove default margins */
        }

        .inline-tags h1 {
            font-size: 40px;
            color: #f0c600; /* Hyperspace blue */
        }

        .introduction h2 {
            font-size: 2rem;
            margin-bottom: 1rem;
            color: #0b2546; /* Dark text color */
        }

        .introduction p {
            font-size: 23px;
            font-weight: 500;
            color: #0b2546; /* Dark text color */
            line-height: 1.6;
            width: fit-content;
            padding: 20px;
            padding-bottom: -20%;
        }

        .divider {
            margin-top: -6%;
        }

        /* Services Section */
        .services {
            text-align: center;
            background-color: #f7f7f7;
            padding: 4rem 0;
            margin-top: 2%;
        }

        .sertitle {
            text-align: center;
            color: #0b2546; /* Dark text color */
            font-size: 2rem;
            margin-top: -4%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .service-card {
            background-color: #ffffff;
            color: #0b2546; /* Dark text color */
            border-radius: 10px;
            padding: 1rem;
            margin: 1rem;
            display: inline-block;
            width: calc(33.3333% - 2rem);
        }

        .service-card h3 {
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .service-card p {
            font-size: 1rem;
        }

        /* Inquiry Section */
        .inquiry {
            text-align: center;
            padding: 4rem 0;
        }

        .inquiry h2 {
            text-align: center;
            color: #0b2546; /* Dark text color */
            font-size: 2rem;
            margin-top: 0%;
            margin-bottom: -2%;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .inquiry p{
            font-size: 23px;
            font-weight: 500;
            color: #0b2546; /* Dark text color */
            line-height: 1.6;
            width: fit-content;
            padding: 40px;
            padding-bottom: -20%;
            margin-bottom:40px;
        }

        .inquiry-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: -35px;
            margin-bottom: 20px;
        }

        .inquiry-buttons button {
            background-color: #f0c600; /* Hyperspace blue */
            color: #fff;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            font-size: large;
            text-transform: uppercase;
            transition: background-color 0.3s;
            cursor: pointer;
        }

        .inquiry-buttons button:hover {
            background-color: #0b2546;
        }

        
        .contact-container {
            max-width: 600px;
            color:#f7f7f7;
            margin: 50px auto;
            margin-bottom: -25px;
            margin-top:-25px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color:#0b2546;
        }
        .contact-container h2 {
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(255, 255, 255, 0.5);
        }
        .contact-container p {
            margin-bottom: 20px;
        }
        .contact-details p {
            margin-bottom: 10px;
        }
        .contact-details strong {
            margin-right: 5px;
        }
    
        /* Footer */
        footer {
            background-color:#0b2546;
            padding: 1rem 0;
            text-align: center;
        }

        footer p {
            margin: 0;
            color: #fff; /* White text color */
        }

        /* Chat Box */
        .chat-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #f0c600; /* Hyperspace blue */
            color: #0b2546; /* Dark text color */
            width: 60px;
            height: 60px;
            border-radius: 50%;
            text-align: center;
            line-height: 60px;
            cursor: pointer;
            z-index: 9999;
        }

        .chat-box {
            display: none;
            position: fixed;
            bottom: 100px;
            right: 30px;
            width: 300px;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
            z-index: 9998;
        }

        .chat-header {
            background-color: #f0c600; /* Hyperspace blue */
            color: #0b2546; /* Dark text color */
            padding: 10px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            cursor: pointer;
        }

        .chat-content {
            padding: 20px;
            max-height: 300px;
            overflow-y: auto;
        }

        .chat-options {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .chat-options li {
            margin-bottom: 10px;
        }

        .chat-options li a {
            display: block;
            padding: 10px;
            background-color: #f0c600; /* Hyperspace blue */
            color: #0b2546; /* Dark text color */
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .chat-options li a:hover {
            background-color: #0b2546; /* Dark text color */
            color: #fff; /* White text color */
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presidency Real Estate</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar">
        <ul>
            <li><img src="\img\Logo2.png" height="70px" width="120px"></li>
            <li><a href="#">CUSTOMER FORM</a></li>
            <li><a href="#">OWNER FORM</a></li>
            <!-- Apply hover color to the admin link -->
            <li><a href="login.php" >ADMIN</a></li>
        </ul>
    </nav>

    <!-- Image with Overlay -->
    <div class="image-overlay">
        <img src="\img\back.png" alt="Background Image">
        <div class="overlay">
            <div class="overlay-content">
                <h2>UNLOCK SIMPLIFIED SOLUTIONS <br>FOR ALL YOUR REAL ESTATE NEEDS.</h2>
                <p>Embark on a journey with us from search to paperwork. 
                    We connect you with the right match to suit your <br> specifications 
                    with cutting-edge technology and convenient processes.
                     Trust our rigorous research and rest <br>assured!</p>
                       
        <button onclick="document.getElementById('inquiry').scrollIntoView();">Inquiry Section</button>
            </div>
        </div>
    </div>

    <!-- Introduction Section -->
    <section class="introduction">
        <div class="inline-tags">
            <h1>[ </h1>
            <h2>  WE MAKE REAL ESTATE A BREEZE  </h2>
            <h1> ]</h1>
        </div>
        <p>Our goal is to provide you with the best possible experience in buying, selling,
             or renting property. We understand that navigating the real estate market 
             can be overwhelming, but with our expertise and comprehensive services, 
             we’re here to make it easy <br> and stress-free for you.<br>
        We offer a wide range of properties to meet your 
            unique needs and preferences, including residential, 
            commercial, and investment properties. Whether you’re a 
            first-time homebuyer, a seasoned investor, or a landlord, our team 
            of experienced professionals is dedicated to helping you find the right
             property and achieve your real estate goals.<br>
        We strive to offer you the highest level of customer service 
            and satisfaction, and we’re always here to answer any questions and provide
            support throughout the entire process. So, take a look around and let 
            us help you find the property of your dreams today!</p>
        <!-- Button directing to the inquiry section -->
    </section>
    <section class="divider">
    <img src="\img\divider.png" width="fit-content" ></img>
    </section>
    <!-- Services Section -->
    <section class="services">
        <section class="sertitle">
            <center>
            <h1>SERVICES</h1>
        </center>
        </section>
        <div class="service-card">
            <img src="\img\buildingicon.png" width="52px">
            <h3>Rent</h3>
            <p>We provide flexible and affordable rental solutions for all your needs.</p>
        </div>
        <div class="service-card">
            <img src="\img\key.png" width="52px">
            <h3>Sell</h3>
            <p>Sell your home quickly and easily with our professional real estate services..</p>
        </div>
        <div class="service-card">
            <img src="\img\money.png" width="52px">
            <h3>Buy</h3>
            <p>We provide comprehensive services to help you find and purchase the perfect home for your needs.</p>
        </div>
    </section>

    
    <!-- Inquiry Section -->
    <section id="inquiry" class="inquiry">
        <h2>BECOME A VALUED MEMBER OF OUR CLIENTELE !</h2>
        <p>Our services accommodate both those in search of properties for purchase 
            or rental and individuals interested in listing their properties for sale. 
            This will enable us to better understand your requirements and provide tailored assistance.
            <br><br> We're committed to assisting buyers, renters, and property sellers alike. 
            Simply choose the relevant option and complete the form to receive personalized support.
        </p>
        <div class="inquiry-buttons">
            <button onclick="window.location.href='#'">Customer Requirements/Inquiry Form</button>
            <button onclick="window.location.href='#'">Owner Property Listing</button>
        </div>
    </section>
   

<section class="contact-container">
    <h2>CONTACT US</h2>
    <p>Feel free to reach out to us via phone or email!</p>
    <div class="contact-details">
        <u>
        <p><strong>Phone:</u></strong> +91 1234567890</p>
        <p><u><strong>Email:</u></strong> info@presidencyrealestate.com</p>
    </section>

    <!-- Footer -->
    <footer>
        <p>© 2024 Presidency Real Estates. All rights reserved.</p>
    </footer>


    <!-- Chat Icon -->
    <div class="chat-icon" onclick="toggleChatBox()">Chat</div>

    <!-- Chat Box -->
    <div class="chat-box" id="chatBox">
        <div class="chat-header" onclick="toggleChatBox()">Close</div>
        <div class="chat-content">
            <ul class="chat-options">
                <li><a href="https://chat.openai.com/c/2dd322ad-48f8-44b0-a6e6-4f2696bb2d17">Option 1</a></li>
                <li><a href="#">Option 2</a></li>
                <li><a href="#">Option 3</a></li>
                <!-- Add more options as needed -->
            </ul>
        </div>
    </div>
    <script>
        function toggleChatBox() {
            var chatBox = document.getElementById("chatBox");
            chatBox.style.display = (chatBox.style.display === "none" || chatBox.style.display === "") ? "block" : "none";
        }
    </script>


</body>
</html>
