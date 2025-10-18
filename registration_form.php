<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e2f;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background-color: #2c2c3e;
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #000;
            width: 350px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            display: block;
            margin-top: 10px;
        }
        input, select, textarea, button {
            width: 100%;
            margin-top: 5px;
            padding: 8px;
            border-radius: 5px;
            border: none;
        }
        button {
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
        .output {
            background-color: #2c2c3e;
            padding: 20px;
            border-radius: 10px;
            width: 400px;
            text-align: center;
            box-shadow: 0 0 10px #000;
        }
    </style>
</head>
<body>

<?php
// --- Function to sanitize user input ---
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// --- Check if form is submitted ---
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form inputs
    $firstname = sanitize_input($_POST["firstname"]);
    $age = sanitize_input($_POST["age"]);
    $gender = sanitize_input($_POST["gender"]);
    $quote = sanitize_input($_POST["quote"]);

    // --- Validate all fields ---
    if (empty($firstname) || empty($age) || empty($gender) || empty($quote)) {
        echo "<div class='output'><p>⚠️ All fields are required. Please fill in everything.</p></div>";
    } else {
        // --- Display formatted output ---
        echo "<div class='output'>";
        echo "<p>You are <strong>$firstname</strong>, a <strong>$age</strong>-year-old <strong>$gender</strong>.<br>";
        echo "Your motto in life is: <em>\"$quote\"</em>.</p>";
        echo "</div>";
    }
} else {
    // --- Display the form ---
?>
    <form method="POST" action="">
        <h2>Registration Form</h2>
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>

        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
        </select>

        <label for="quote">Quote in Life:</label>
        <textarea name="quote" id="quote" rows="3" required></textarea>

        <button type="submit">Submit</button>
    </form>
<?php
}
?>

</body>
</html>
