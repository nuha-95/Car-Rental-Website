<?php
require_once("DBconnect.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sortOption = $_POST['sort'];
    
    // Modify this query according to the selected option for sorting
    if ($sortOption === "priceAsc") {
        $sql = "SELECT * FROM car_info ORDER BY CAST(price AS DECIMAL(10, 2)) ASC";
    } elseif ($sortOption === "priceDesc") {
        $sql = "SELECT * FROM car_info ORDER BY CAST(price AS DECIMAL(10, 2)) DESC";
    } elseif ($sortOption === "availability") {
        $sql = "SELECT * FROM car_info ORDER BY availability DESC";
    }

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {
            // Display the sorted car services
            // You can format and display car details here
        }
    } else {
        // No cars found or error handling
    }
}
?>

<form id="sortForm">
        <label for="sort">Sort by:</label>
        <select id="sort" name="sort">
            <option value="priceAsc">Price: Low to High</option>
            <option value="priceDesc">Price: High to Low</option>
            <option value="availability">Availability</option>
        </select>
        <input type="submit" value="Sort" />
    </form>

    <section class="services" id="bookings">
        <!-- Your booking information -->

        <!-- Car services container -->
        <div class="services-container" id="carServices">
            <!-- Car services content -->
        </div>
    </section>

    <!-- JavaScript to handle form submission and sorting -->
    <script>
        document.getElementById('sortForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(this);

            fetch('sort_cars.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                document.getElementById('carServices').innerHTML = data;
            })
            .catch(error => console.error('Error:', error));
        });
    </script>
