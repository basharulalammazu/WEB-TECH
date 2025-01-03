<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Store</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <img src="assets/id.png">
    <div class="container">
        <!-- Top 3 boxes -->
        <div class="box1">
            <p>Box 1</p>
        </div>
        <div class="box1">
            <p>Box 2</p>
        </div>

        <!-- First Box 3: Display all tokens -->
        <div class="box3">
            <h3>All Tokens</h3>
            <ul>
                <?php
                $tokenFile = "./token.json";
                if (file_exists($tokenFile)) {
                    $jsonData = json_decode(file_get_contents($tokenFile), true);

                    if (isset($jsonData[0]['token'])) 
                    {
                        foreach ($jsonData[0]['token'] as $token) 
                            echo "<li>Token: $token</li>";
                    } 
                    else 
                        echo "<li>No tokens found in the JSON file.</li>";
                    
                } 
                else 
                    echo "<li>JSON file not found.</li>";
                
                ?>
            </ul>
        </div>

        <!-- Second Box 3 -->
        <div class="box3">
        <h3>Already Tokens</h3>
            <ul>
                <?php
                if (file_exists($tokenFile)) {
                    $jsonData = json_decode(file_get_contents($tokenFile), true);

                    if (isset($jsonData[0]['usedToken'])) 
                    {
                        foreach ($jsonData[0]['usedToken'] as $token) 
                            echo "<li>Token: $token</li>";
                    } 
                    else 
                        echo "<li>No tokens found in the JSON file.</li>";
                    
                } 
                else 
                    echo "<li>JSON file not found.</li>";
                
                ?>
            </ul>
        </div>

        <!-- Form Section -->
        <div class="box2">
            <p>Box 4.1</p>
        </div>
        <div class="box2">
            <p>Box 4.2</p>
        </div>
        <div class="box2">
            <p>Box 4.3</p>
        </div>

        <!-- Borrow Book -->
        <div class="box3">
            <div class="form-container">
                <h2>Borrow a Book</h2>
                <form method="POST" action="process.php">
                    <input type="text" placeholder="Student Full Name" name="userName" required>
                    <input type="text" placeholder="Student ID" name="userID" required>
                    <select name="books" id="books" required>
                        <option value="book0">Select a book</option>
                        <option value="Introduction to Algorithms">Introduction to Algorithms</option>
                        <option value="Structure and Interpretation of Computer Programs">Structure and Interpretation of Computer Programs</option>
                        <option value="The C Programming Language">The C Programming Language</option>
                        <option value="Introduction to the Theory of Computation">Introduction to the Theory of Computation</option>
                        <option value="Algorithms">Algorithms</option>
                    </select>
                    <label>Borrow Date</label>
                    <input type="date" placeholder="Borrow Date" name="borrowDate" required>
                    <input type="text" placeholder="Token" name="token" required>
                    <label>Return Date</label>
                    <input type="date" placeholder="Return Date" name="returnDate" required>
                    <input type="text" placeholder="Fees" name="fees" required>

                    <label>Paid: </label>
                    <input type="radio" id="option1" name="paid" value="Paid" required>
                    <label for="paid">Yes</label>
                    <input type="radio" id="option1" name="paid" value="Not Paid" required>
                    <label for="not_paid">NO</label>
                    <br>

                    <input type="submit" name="submit1" value="Submit">
                </form>
            </div>
        </div>

        <!-- Add Book -->
        <div class="box4">
            <div class="form-container">
                <h2>Book Info</h2>
                <form action="process.php" method="post">
                    <input type="text" placeholder="Book Title" name="bookTitle">
                    <input type="text" placeholder="Author Name" name="authorName">
                    <input type="text" placeholder="Number of Book" name="numberOfBook">
                    <input type="text" placeholder="ISBN Number" name="isbnNumber">
                    <input type="submit" name="submit2" value="Submit">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
