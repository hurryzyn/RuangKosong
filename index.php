  <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Homepage</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="ruangk.png" alt="Logo" width="50" height="50">
        </div>
        <nav>
            <ul>
                <li><a href="#">Find a Space</a></li>
                <li><a href="#">Lease a Space</a></li>
            </ul>
        </nav>
        <div class="logout">
            <a href="#">Logout</a>
        </div>
    </header>

    <div class="form-container">
        <form action="#" method="GET" class="search-form">
            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" id="location" name="location" placeholder="Enter location">
            </div>
            <div class="form-group">
                <label for="building">Building:</label>
                <input type="text" id="building" name="building" placeholder="Enter building">
            </div>
            <button type="submit" class="btn btn-primary">Search</button>
            <p class="jargon">Find Space - Find all locations in Jakarta</p>
        </form>
    </div>
    
    <div class="location-recommendation">
        <h2>Location Recommendation</h2>
        <div class="grid-container">
            <div class="grid-item">
                <img src="image1.jpeg" alt="Image 1">
                <div class="overlay">
                    <p>Start from:</p>
                    <p class="price">Rp 100.000,-</p>
                </div>
                <div class="place-name">
                    <p>Kemang</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="image2.jpeg" alt="Image 2">
                <div class="overlay">
                    <p>Start from:</p>
                    <p class="price">Rp 100.000,-</p>
                </div>
                <div class="place-name">
                    <p>Kuningan</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="image3.jpeg" alt="Image 3">
                <div class="overlay">
                    <p>Start from:</p>
                    <p class="price">Rp 100.000,-</p>
                </div>
                <div class="place-name">
                    <p>SCBD</p>
                </div>
            </div>
            <div class="grid-item">
                <img src="image4.jpeg" alt="Image 4">
                <div class="overlay">
                    <p>Start from:</p>
                    <p class="price">Rp 100.000,-</p>
                </div>
                <div class="place-name">
                    <p>Serpong</p>
                </div>
            </div>
        </div>
    </div>

    <footer class="site-footer">
        <div class="footer-left">
            <p>Contact</p>
            <p>08123456789</p>
            <p>ruangkosong@gmail.com</p>
            <p>jakarta selatan, kebayoran</p>
        </div>
        <div class="footer-right">
            <div class="social-media">
                <a href="#"><img src="twitter.png" alt="Twitter"></a>
                <a href="#"><img src="fb.png" alt="Facebook"></a>
                <a href="#"><img src="ig.png" alt="Instagram"></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>Copyright &copy; 2024, Ruangkosong.</p>
        </div>
    </footer>
    

</body>
</html>