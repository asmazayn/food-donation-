<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recipients</title>
    <link rel="stylesheet" href="css/recep.css">
    <style>
        /* Ensure table styles are consistent with home.css */
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 40px 0;
            font-size: 16px;
            text-align: left;
        }
        th, td {
            padding: 12px 15px;
            border: 1px solid #000;
        }
        th {
            background: color #9DC183;
        }
        tr:hover {
            background-color:#77DD77;
        }
        /* Styles for organization lists */
        .organization-list {
            padding: 20px;
        }
        .organization {
            margin: 20px 0;
        }
        .organization h2 {
            font-size: 24px;
            color: #E3C6A5;
            text-align: center;
        }
        .organization ul {
            list-style: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }
        .organization ul li {
            margin: 10px 0;
            font-size: 18px;
        }
        /* Center content */
        main {
            text-align: center;
            padding: 20px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">
            <img src="pictures/logo.jpg" alt="Logo">
            <span>Food Donation</span>
        </div>
        <nav>
            <ul>
                <li><a href="home.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="donate.html">Donate</a></li>
                <li><a href="recipients.php">Recipients</a></li>
            </ul>
        </nav>
    </header>
    <div class="main-content-container">
    <!-- Left side images -->
    <div class="side-images">
        <img src="pictures\r3.jpg" alt="Image 1">
        <img src="pictures\suryahelp.webp" alt="Image 2">
    </div>

    <!-- Main content (The centered text and tables) -->
    <div class="main-content">
        <!-- Your existing content, like the tables and text, goes here -->
        <h2>Available Donations</h2>
        <!-- PHP and table code remains the same -->
        <?php
        // Database connection parameters
        $servername = "localhost:3310";
        $username = "root";
        $password = "";
        $dbname = "FoodDonationdb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch donations from database
        $sql = "SELECT name, contact, food_type, servings, address, landmark, donation_date, donation_time FROM donations ORDER BY donation_date DESC, donation_time DESC";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>Name</th>
                        <th>Contact</th>
                        <th>Food Type</th>
                        <th>Servings</th>
                        <th>Address</th>
                        <th>Landmark</th>
                        <th>Date</th>
                        <th>Time</th>
                    </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . htmlspecialchars($row['name']) . "</td>
                        <td>" . htmlspecialchars($row['contact']) . "</td>
                        <td>" . htmlspecialchars($row['food_type']) . "</td>
                        <td>" . htmlspecialchars($row['servings']) . "</td>
                        <td>" . htmlspecialchars($row['address']) . "</td>
                        <td>" . htmlspecialchars($row['landmark']) . "</td>
                        <td>" . htmlspecialchars($row['donation_date']) . "</td>
                        <td>" . htmlspecialchars($row['donation_time']) . "</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No donations available at the moment.</p>";
        }

        // Close connection
        $conn->close();
        ?>
    </div>

    <!-- Right side images -->
    <div class="side-images">
        <img src="pictures\r1.jpg" alt="Image 3">
        <img src="pictures\r2.jpg" alt="Image 4">
    </div>
</div>
        <h1>Our Recipients</h1>
        <p>We are proud to have partnered with the following organizations to help those in need:</p>

        <section class="organization-list">
            <div class="organization">
                <h2>Big NGOs</h2>
                <ul>
                    <li><b>Sankalp Foundation:</b> Focuses on education, health, and women’s empowerment.</li>
                    <li><b>Sathya Sai Seva Organisation:</b> Provides healthcare, education, and disaster relief.</li>
                    <li><b>Helping Hand Foundation:</b> Engages in various social welfare activities including health and education.</li>
                </ul>
            </div>

            <div class="organization">
                <h2>Old Age Homes</h2>
                <ul>
                    <li><b>Old Age Home Visakhapatnam:</b> Provides shelter and care for the elderly.</li>
                    <li><b>Manasa Old Age Home:</b> Offers comprehensive support and care for seniors.</li>
                    <li><b>Elderly Care Home:</b> Specializes in healthcare and companionship for the elderly.</li>
                </ul>
            </div>

            <div class="organization">
                <h2>Orphanages</h2>
                <ul>
                    <li><b>Ramakrishna Mission Home:</b> Provides shelter, education, and care for orphans.</li>
                    <li><b>Ankuram Children's Home:</b> Focuses on holistic development for children in need.</li>
                    <li><b>New Hope Foundation:</b> Offers education, healthcare, and nurturing for orphans.</li>
                </ul>
            </div>

            <div class="organization">
                <h2>Other Organizations</h2>
                <ul>
                    <li><b>Vizag Food Bank:</b> Provides food to underprivileged communities.</li>
                    <li><b>AP Food Relief Society:</b> Engages in food distribution during emergencies.</li>
                    <li><b>Smile Foundation:</b> Runs programs focused on education, healthcare, and livelihood.</li>
                </ul>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Food Donation. All rights reserved.</p>
    </footer>
</body>
</html>