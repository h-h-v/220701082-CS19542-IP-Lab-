<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juice Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap" rel="stylesheet">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    </head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
        <img src="images/jp2.png" alt="Fuel Order Logo" id="navbar-logo" data-scrolled-src="images/jp.png">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <span class="close-menu" onclick="closeMenu()">&times;</span>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#feat">
                    <h alt="Features" class="nav-icon">F</h><!-- Image for Features -->
                    <span class="nav-text">eatures</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#pro">
                    <h alt="UI" class="nav-icon">P</h> <!-- Image for UI -->
                    <span class="nav-text">rocess</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#ft">
                    <h alt="Contact" class="nav-icon">C</h> <!-- Image for Contact -->
                    <span class="nav-text">ontact</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="header">
    <video autoplay muted loop>
        <source src="fuel-truck-video.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <h1>FUEL<br>Delivered<br>to Your Doorstep</h1>
    <a href="order.php" class="btn-order d-block ">Order Fuel</a> <!-- Button visible only on mobile -->
    <span class="order-text typewriter">Order Now</span> <!-- New Text with Typewriter Animation -->

</body>
</div>
<br>
<!--SLIDES-->
<div class="scroll_container" id="feat">
    <h1>Why JUICE UP</h1>
    <h2 style="color: black;">Features</h2>
        <div class="sticky_wrap">
          <div class="horizontal_scroll">
            <div class="scroll_contents red">
            <h2 class="left"></h2><br>
            <div class="cl">
            <h2 class="left">Quick Delivery</h2>
            <p class="left">Experience the fastest fuel delivery service in town.</p>
            </div>
            <div class="cl">
            </div>
            </div>
            <div class="scroll_contents yellow">
            <h2 class="left"></h2><br>
            <h2 class="left">Quality Fuel</h2>
            <p class="left">Our fuel is of the highest quality to keep your engines running smoothly.</p>
            </div>
            <div class="scroll_contents green">
            <h2 class="left"></h2><br>
            <h2 class="left">24/7 Support</h2>
            <p class="left">We are here to assist you round the clock with our dedicated support team.</p>
            </div>
            <div class="scroll_contents blue">
            <h2 class="left"></h2><br>
            <div class="cl">
            <p class="left">Quick Delivery</p>
            <p class="left">Quality Fuel</p>
            <p class="left">24/7 Support</p>
            <h2 class="left">Anytime.Anywhere.</h2>
            </div>
            <div class="cl" style="background-color: #37AFE1">
            </div>
              <h2 class="right">Let the engines roar</h2>
            </div>
          </div>
        </div>
      </div>
<!-- Carousel-->
<div class="container-fluid d-none d-md-block" id="pro">
<h1>Our Process</h1>
<h2 style="color: black;font-size: 7em;font-weight: 900;">Simple</h2>
<div class="container mt-1">
    <div class="row image-container no-gutters">
        <!-- First Image -->
        <div class="col-md-0">
            <img class="img-fluid" src="images/1.jpeg" alt="First image">
        </div>
        
        <!-- Second Image -->
        <div class="col-md-0">
            <img class="img-fluid" src="images/2.jpeg" alt="Second image">
        </div>
        
        <!-- Third Image -->
        <div class="col-md-0">
            <img class="img-fluid" src="images/3.jpeg" alt="Third image">
        </div>
        
        <!-- Fourth Image -->
        <div class="col-md-0">
            <img class="img-fluid" src="images/4.jpeg" alt="Fourth image">
        </div>
    </div>
</div>
</div>
<style>
        .image-container {
            display: flex;
            justify-content: space-between;
            gap: 0px;
        }
        .image-container img {
            width: 100%;
            height: auto;
        }
        .col-md-2 img {
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
</div>
<!-- Testimonial Section -->
<h2 style="text-align:center;">Testimonial Section</h2>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    /* Testimonial Wrapper */
    .testimonial-wrapper {
        display: flex;
        justify-content: center; /* Aligns all testimonials in the center */
        gap: 20px; /* Adds space between each testimonial */
        margin: 50px auto;
        max-width: 90%; /* Ensures the container fits the page width */
    }

    /* Testimonial Container */
    .testimonial-container {
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 30%;
    }

    /* Profile Image */
    .testimonial-img {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        margin: 0 auto;
        object-fit: cover;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        display: block;
    }

    /* Name */
    .testimonial-name {
        font-size: 1.2em;
        font-weight: bold;
        margin: 10px 0;
    }

    /* Rating Stars */
    .testimonial-stars {
        color: gold;
        margin: 5px 0;
    }

    /* Testimonial Text */
    .testimonial-text {
        color: #666;
        font-size: 0.9em;
        line-height: 1.5;
        margin-top: 10px;
    }

    /* Responsive - Stack testimonials on smaller screens */
    @media screen and (max-width: 768px) {
        .testimonial-wrapper {
            flex-direction: column; /* Stacks testimonials vertically */
        }
        .testimonial-container {
            width: 100%; /* Full width for mobile */
            margin-bottom: 20px; /* Adds space between stacked testimonials */
        }
    }
</style>

<!-- Testimonial Section Wrapper -->
<div class="testimonial-wrapper">
    <!-- Testimonial 1 -->
    <div class="testimonial-container">
        <img src="https://imgs.search.brave.com/7O4DywKh6ZbND1SiJw0rl5tOcTRDl1vsz5QHQE_cJN4/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly91cGxv/YWQud2lraW1lZGlh/Lm9yZy93aWtpcGVk/aWEvY29tbW9ucy9k/L2RkL1N0ZXZlX0pv/YnNfYW5kX01hY2lu/dG9zaF9jb21wdXRl/cixfSmFudWFyeV8x/OTg0LF9ieV9CZXJu/YXJkX0dvdGZyeWRf/LV9lZGl0ZWQuanBn" alt="Profile" class="testimonial-img">
        <div class="testimonial-name">Good Job!</div>
        <div class="testimonial-stars">★★★★☆</div>
        <div class="testimonial-text">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla facilisi. Vestibulum ante ipsum primis in faucibus.
        </div>
    </div>

    <!-- Testimonial 2 -->
    <div class="testimonial-container">
        <img src="https://imgs.search.brave.com/kP8tD2r-8-RXeL1ymhiUJCce5LxjvHUPSvSUbEBJJ_0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pLnBp/bmltZy5jb20vb3Jp/Z2luYWxzLzAyLzY5/L2I1LzAyNjliNWQ5/NzE5ZDk5NmJmOTlk/NzZjNjIxZDY1MjZk/LmpwZw" alt="Profile" class="testimonial-img">
        <div class="testimonial-name">Amazing Work!</div>
        <div class="testimonial-stars">★★★★★</div>
        <div class="testimonial-text">
            Aliquam erat volutpat. Aenean ultricies orci at mi malesuada condimentum. Suspendisse euismod.
        </div>
    </div>

    <!-- Testimonial 3 -->
    <div class="testimonial-container">
        <img src="https://imgs.search.brave.com/FehqnB9xUD9l168X6ZhP0MKoAUIjpoOS3jpWMam5x2k/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dC1jYWNoZS5zcHlz/Y2FwZS5jb20vNWMw/ZTk4ODk4OTg3OTZl/ZjMwZTlkNzU2LzYy/YTMxOTEzZDYyMjk0/YTY5OTgyNzI1NF93/b3pzbWlsZS5qcGc" alt="Profile" class="testimonial-img">
        <div class="testimonial-name">Great Service!</div>
        <div class="testimonial-stars">★★★★☆</div>
        <div class="testimonial-text">
            Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
        </div>
    </div>
</div>
<!-- FOOTER -->
    <footer id="ft">
  <div class="footer-container">
    <div class="footer-left">
      <address>
        <p>1600</p>
        <p>Amphitheatre Parkway</p>
        <p>Palo Alto</p>
        <p>CA 94303</p>
      </address>
      <ul class="social-links">
        <li><a href="#">Twitter / X</a></li>
        <li><a href="#">Instagram</a></li>
        <li><a href="#">LinkedIn</a></li>
        <li><a href="https://wa.me/7358666952?text=Hello, I need assistance!">WhatsApp</a></li>
      </ul>
      <div class="contact-info">
        <p>General enquiries: <a href="mailto:220701082@rajalakshmi.edu.in">220701082@rajalakshmi.edu.in</a></p>
        <p>New business: <a href="mailto:hariharaviswanathan@gmail.com">hariharaviswanathan@gmail.com</a></p>
      </div>
    </div>

    <div class="footer-right">
      <form action="#" method="post" class="newsletter-form">
        <label for="email">Subscribe to our newsletter</label>
        <div class="newsletter-input">
          <input type="email" id="email" name="email" placeholder="Your email" required>
          <button type="submit">&#8594;</button>
        </div>
      </form>
    </div>
  </div>

  <div class="footer-bottom">
    <p>&copy;2024 JUICE UP</p>
    <p>R&D: <a href="https://ju.co">j.u.co</a></p>
    <p>Built by h-h-v <span>&#128293;</span></p>
  </div>
</footer>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js">

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>

//Handle resizing to update item width
window.addEventListener('resize', () => {
  itemWidth = window.innerWidth; // Update item width on resize
});
// Scroll event to trigger navbar changes
window.addEventListener('scroll', function () {
    var navbar = document.querySelector('.navbar');
    var logo = document.getElementById('navbar-logo');
    var originalSrc = 'images/jp2.png'; // Original logo source
    var scrolledSrc = logo.getAttribute('data-scrolled-src'); // New logo source

    if (window.scrollY > 100) {
        navbar.classList.add('sticky');
        logo.classList.add('scrolled'); // Add scrolled class to logo
        logo.src = scrolledSrc; // Change to the new logo
    } else {
        navbar.classList.remove('sticky');
        logo.classList.remove('scrolled'); // Remove scrolled class from logo
        logo.src = originalSrc; // Change back to the original logo
    }
});

function closeMenu() {
    document.getElementById('navbarNav').classList.remove('show');
}
</script>
<div class="cursor" id="custom-cursor"></div>
</body>
<script>

const stickySections = [...document.querySelectorAll('.sticky_wrap')]

window.addEventListener('scroll', (e) => {
  for(let i = 0; i < stickySections.length; i++){
    transform(stickySections[i])
  }
})

function transform(section) {

  const offsetTop = section.parentElement.offsetTop;

  const scrollSection = section.querySelector('.horizontal_scroll')

  let percentage = ((window.scrollY - offsetTop) / window.innerHeight) * 100;

  percentage = percentage < 0 ? 0 : percentage > 300 ? 300 : percentage;

  scrollSection.style.transform = `translate3d(${-(percentage)}vw, 0, 0)`
}
</script>
</html>