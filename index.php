<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pamela & George's Wedding</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" defer></script>
    <style>
        /* General Styles */
        body {
            font-family: 'Playfair Display', serif;
            margin: 0;
            background-color: #f4f4f4;
            overflow: hidden;
        }
        header {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        .logo {
            font-size: 24px;
            font-weight: bold;
            text-decoration: none;
            color: #333;
        }
        ul {
            list-style: none;
            display: flex;
            gap: 15px;
            margin: 0;
            padding: 0;
        }
        ul li a {
            text-decoration: none;
            color: #333;
            font-size: 18px;
            transition: color 0.3s ease;
        }
        ul li a:hover {
            color: #007BFF;
        }

        /* Container and Sections */
        .container {
            display: flex;
            width: 500%;
            height: 100vh;
            transition: transform 0.5s ease-in-out;
        }
        section {
            flex: 1;
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-size: cover;
            background-position: center;
        }
        section div {
            text-align: center;
            color: #fff;
        }
        h1 {
            font-size: 48px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.8);
        }
        p {
            font-size: 18px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.6);
        }
        form input, form select, form button {
            margin: 10px 0;
            padding: 10px;
            font-size: 16px;
            width: 80%;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        form button {
            background-color: #007BFF;
            color: white;
            border: none;
            cursor: pointer;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <a class="logo" href="/">Pamela & George's Wedding</a>
        <ul>
            <li><a href="#" onclick="scrollToSection(0)">Home</a></li>
            <li><a href="#" onclick="scrollToSection(1)">Invitation</a></li>
            <li><a href="#" onclick="scrollToSection(2)">Location</a></li>
            <li><a href="#" onclick="scrollToSection(3)">Gift Registry</a></li>
            <li><a href="#" onclick="scrollToSection(4)">RSVP</a></li>
        </ul>
    </header>

    <div class="container" id="content">
        <!-- Home Section -->
        <section style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-bride-and-groom-looking-at-each-other-picture-image_2656806.jpg');">
            <div>
                <h1>Pamela & George</h1>
                <p>Saturday, June 17, 2024</p>
                <p>Join us for a day of love, laughter, and celebration!</p>
            </div>
        </section>

        <!-- Invitation Section -->
        <section style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-wedding-invitation-background-picture-image_2656805.jpg');">
            <div>
                <h1>Invitation</h1>
                <p>We are thrilled to share the news of our upcoming wedding and would be honored if you could join us.</p>
                <p>Date: Saturday, June 17, 2024</p>
                <p>Time: 2:00 pm</p>
                <p>Location: St. Mary's Church, 123 Main Street, City, State</p>
            </div>
        </section>

        <!-- Location Section -->
        <section style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-wedding-venue-background-picture-image_2656804.jpg');">
            <div>
                <h1>Location</h1>
                <p>St. Mary's Church</p>
                <p>123 Main Street, City, State</p>
                <p><a href="https://www.google.com/maps/place/St.+Mary's+Church" target="_blank" style="color: #FFD700;">Google Maps</a></p>
            </div>
        </section>

        <!-- Gift Registry Section -->
        <section style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-wedding-gift-background-picture-image_2656803.jpg');">
            <div>
                <h1>Gift Registry</h1>
                <p>Amazon Wishlist: <a href="https://www.amazon.com/wishlist/your-wishlist/ref=wl_share" target="_blank" style="color: #FFD700;">Link</a></p>
                <p>Target Registry: <a href="https://www.target.com/gift-registry/gift-lists/1234567890" target="_blank" style="color: #FFD700;">Link</a></p>
            </div>
        </section>

        <!-- RSVP Section -->
        <section style="background-image: url('https://png.pngtree.com/background/20230519/original/pngtree-bride-and-groom-looking-at-each-other-picture-image_2656806.jpg');">
            <div>
                <h1>RSVP</h1>
                <p>Kindly RSVP by May 31, 2024.</p>
                <form method="POST" action="">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <select name="attending" required>
                        <option value="yes">Yes</option>
                        <option value="no">No</option>
                    </select>
                    <input type="text" name="side" placeholder="Bride or Groom's side" required>
                    <button type="submit" name="submit">RSVP</button>
                </form>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "weddingdb";

                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

                    $name = $conn->real_escape_string($_POST['name']);
                    $attending = $conn->real_escape_string($_POST['attending']);
                    $side = $conn->real_escape_string($_POST['side']);

                    $sql = "INSERT INTO `attending people` (name, attending, `attending side`) VALUES ('$name', '$attending', '$side')";
                    if ($conn->query($sql) === TRUE) {
                        echo "<p>Thank you for your RSVP!</p>";
                        $to = "hrodolph815@gmail.com";
                        $subject = "New RSVP";
                        $message = "Name: $name\nAttending: $attending\nSide: $side";
                        mail($to, $subject, $message);
                    } else {
                        echo "<p>Error: " . $conn->error . "</p>";
                    }
                    $conn->close();
                }
                ?>
            </div>
        </section>
    </div>

    <script>
        const container = document.getElementById('content');
        function scrollToSection(index) {
            container.style.transform = `translateX(-${index * 100}vw)`;
        }
    </script>
</body>
</html>
