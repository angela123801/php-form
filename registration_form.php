<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Registration Form</title>

    <style>
        /* This section designs the overall look of the webpage */
        /* This PHP program creates a simple registration form that asks for the user’s name, age, gender, and life quote.
When the user submits the form, the program cleans (sanitizes) the inputs to prevent errors or malicious code.
If all fields are filled, it displays the user’s details in a styled box. If any field is empty, it shows a warning message instead.

The code also includes CSS for styling, making the page clean and visually appealing. 
It demonstrates basic PHP form handling and validation — a common foundation for web applications. */
        body {
            font-family: Arial, sans-serif;
            background-color: #1e1e2f; /* Dark background color */
            color: #ffffff; /* White text for contrast */
            display: flex; /* Centers content horizontally */
            justify-content: center;
            align-items: center;
            height: 100vh; /* Makes content fill the screen height */
        }

        /* Styling for the form box */
        form {
            background-color: #2c2c3e; /* Slightly lighter box color */
            padding: 20px 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px #000; /* Adds shadow around the box */
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

        /* Design for all input elements */
        input, select, textarea, button {
            width: 100%;
            margin-top: 5px;
            padding: 8px;
            border-radius: 5px;
            border: none;
        }

        /* Style for the submit button */
        button {
            margin-top: 15px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049; /* Slight color change when hovered */
        }

        /* Design for the output or result box */
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
// This function removes unnecessary spaces, slashes, and converts special characters
// to prevent harmful code (like HTML tags) from being executed.
function sanitize_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// This checks if the form was submitted using the POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the values from the form and clean them using the function above
    $firstname = sanitize_input($_POST["firstname"]);
    $age = sanitize_input($_POST["age"]);
    $gender = sanitize_input($_POST["gender"]);
    $quote = sanitize_input($_POST["quote"]);

    // This condition checks if any of the fields are left empty
    if (empty($firstname) || empty($age) || empty($gender) || empty($quote)) {
        // If any input is missing, display a warning message
        echo "<div class='output'><p>⚠️ All fields are required. Please fill in everything.</p></div>";
    } else {
        // If all inputs are complete, display the user's details neatly
        echo "<div class='output'>";
        echo "<p>You are <strong>$firstname</strong>, a <strong>$age</strong>-year-old <strong>$gender</strong>.<br>";
        echo "Your motto in life is: <em>\"$quote\"</em>.</p>";
        echo "</div>";
    }

} else {
    // If the form hasn't been submitted yet, this section displays the input form
?>
    <!-- This is the HTML form that asks for user details -->
    <form method="POST" action="">
        <h2>Registration Form</h2>

        <!-- Input field for the user's name -->
        <label for="firstname">First Name:</label>
        <input type="text" name="firstname" id="firstname" required>

        <!-- Input field for the user's age -->
        <label for="age">Age:</label>
        <input type="number" name="age" id="age" required>

        <!-- Dropdown list for selecting gender -->
        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="">--Select--</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Prefer not to say">Prefer not to say</option>
        </select>

        <!-- Text area for the user to type their quote or motto in life -->
        <label for="quote">Quote in Life:</label>
        <textarea name="quote" id="quote" rows="3" required></textarea>

        <!-- Button to submit the form -->
        <button type="submit">Submit</button>
    </form>

<?php
}
?>

</body>
</html>
