<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Available Books - Library Management System</title>
    <style>
        /* Add CSS styles for book listings */
        .book-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .book {
            margin: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 250px;
        }
        .book img {
            max-width: 100%;
            height: auto;
        }
        .cart {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Available Books</h1>
    <div class="book-list">
        <?php
        include 'connection.php';

        // Query to fetch book data
        $query = "SELECT * FROM bookadd";
        $result = $connect->query($query);

        // Check if there are rows in the result
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<div class='book'>
                        <h3>{$row['bookName']}</h3>
                        <p>Author: {$row['AuthorName']}</p>
                        
                        <select class='select-book'>
                            <option value=''>Select</option>
                            <option value='{$row['bookName']}|{$row['AuthorName']}'>Add to Cart</option>
                        </select>
                      </div>";
            }
        } else {
            echo "<p>No books available</p>";
        }

        // Close the database connection
        $connect->close();
        ?>
    </div>

    <!-- Cart -->
    <div class="cart">
        <h2>Shopping Cart</h2>
        <ul id="cart-list"></ul>
        <button id="buy-now-button">Buy Now</button>
    </div>

    <script>
        // JavaScript to handle book selection, cart, and Buy Now button
        const selectElements = document.querySelectorAll('.select-book');
        const cartList = document.getElementById('cart-list');
        const buyNowButton = document.getElementById('buy-now-button');
        let selectedBookLinks = {}; // Store selected book links

        selectElements.forEach((select) => {
            select.addEventListener('change', (event) => {
                const selectedOption = event.target.value;
                if (selectedOption) {
                    // Add the selected book to the cart with its link
                    const cartItem = document.createElement('li');
                    const selectedBookLink = getBookLink(selectedOption); // Function to get book link
                    cartItem.textContent = selectedOption;

                    // Add a "Delete" button for each book in the cart
                    const deleteButton = document.createElement('button');
                    deleteButton.textContent = 'Delete';
                    deleteButton.addEventListener('click', () => {
                        cartList.removeChild(cartItem);
                        delete selectedBookLinks[selectedOption];
                    });

                    // Append the delete button to the cart item
                    cartItem.appendChild(deleteButton);
                    cartList.appendChild(cartItem);

                    // Store the selected book link
                    selectedBookLinks[selectedOption] = selectedBookLink;

                    select.selectedIndex = 0; // Reset the select option
                }
            });
        });

        buyNowButton.addEventListener('click', () => {
            // Redirect to the payment page with the stored link
            const selectedBooks = Object.keys(selectedBookLinks);
            if (selectedBooks.length > 0) {
                const selectedBookLink = selectedBookLinks[selectedBooks[0]];
                window.location.href = selectedBookLink;
            } else {
                // Handle the case where no books are selected
                alert('Please add books to the cart before clicking "Buy Now".');
            }
        });

        // Function to get book link based on book name and author
        function getBookLink(selectedOption) {
            // Extract book name and author from the selected option
            const [bookName, authorName] = selectedOption.split('|');

            // Define specific links for each book and author combination
            const links = {
                'IT ENDS WITH US|COLLEEN HOVER': 'https://www.newslink.com/',
                'HARRY POTTER|J .K ROULING': 'https://www.ndtv.com/topic/link',
                'CINDRELLA|J .K ROULING': 'https://www.linkedin.com/company/news-link',
                // Add more links as needed
            };

            // Return the link for the specific book and author combination, or a default link
            return links[selectedOption] || 'https://default-link.com';
        }
    </script>
</body>
</html>
