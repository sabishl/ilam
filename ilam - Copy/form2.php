<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $education = $_POST['education'];
    $experience = $_POST['experience'];
    $message = $_POST['message'];

    // Recipient email address
    $to = "953621104301@ritrjpm.ac.in";  // Change this to your email address

    // Subject of the email
    $subject = "Tutor Application Form Submission";

    // Construct the message body
    $body = "Name: $name\n";
    $body .= "Phone: $phone\n";
    $body .= "Email: $email\n";
    $body .= "Subject for coaching: $education\n";
    $body .= "Experience: $experience\n";
    $body .= "Message: $message\n";

    // Email headers
    $headers = "From: no-reply@yourdomain.com" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "<script>alert('Your application has been sent successfully!'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Error sending email. Please try again.'); window.location.href = 'index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor Application Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom CSS for animations and effects */
        .header {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            text-align: center;
            padding: 3rem 1rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            animation: fadeInDown 1s ease-in-out;
        }
        .header h2 {
            font-size: 1.5rem;
            margin-top: 0.5rem;
            animation: fadeInUp 1s ease-in-out;
        }
        .form-container {
            max-width: 600px;
            margin: 2rem auto;
            padding: 2rem;
            background: white;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            animation: fadeIn 1s ease-in-out;
        }
        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #333;
        }
        .form-container input,
        .form-container select,
        .form-container textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-container input:focus,
        .form-container select:focus,
        .form-container textarea:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
            outline: none;
        }
        .form-container button {
            background: linear-gradient(135deg, #4CAF50, #45a049);
            color: white;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
            font-weight: bold;
            transition: background 0.3s ease, transform 0.3s ease;
        }
        .form-container button:hover {
            background: linear-gradient(135deg, #45a049, #4CAF50);
            transform: translateY(-2px);
        }
        .form-container button:active {
            transform: translateY(0);
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header Section -->
    <header class="header">
        <h1>I NEED A TUTOR</h1>
        <h2>Application Form</h2>
    </header>

    <!-- Body Section -->
    <div class="form-container">
        <form method="POST" action="">

            <!-- Name -->
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" placeholder="Enter your name" required>

            <!-- Phone Number -->
            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required>

            <!-- Email -->
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" required>

            <!-- Education -->
            <label for="education">Which Subject:</label>
            <input type="text" id="education" name="education" placeholder="Enter your subject for coaching" required>

            <!-- Experience Dropdown -->
            <label for="experience">Experience:</label>
            <select id="experience" name="experience" required>
                <option value="0 years">0 years</option>
                <option value="1 year">1 year</option>
                <option value="2 years">2 years</option>
                <option value="more than 2 years">More than 2 years</option>
            </select>

            <!-- Message -->
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter any additional details"></textarea>

            <!-- Submit Button -->
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
