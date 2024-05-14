<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay Documents</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
            background-color: #81c784;
        }
        header {
            background-color: #4caf50;
            padding: 20px;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        header img {
            height: 60px;
        }
        header h1 {
            font-size: 24px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            text-align: center;
           margin-bottom: -20px;
        }
        .document {
            background-color: #fff;
            border-radius: 8px;
            border: 2px solid #4caf50; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 10px;
            padding: 30px;
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .document:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .document img {
            height: 50px;
            margin-bottom: 20px;
        }
        .document h2 {
            color: #4caf50;
            margin-top: 0;
        }
        .document p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
        .document a {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #fff;
            background-color: #4caf50;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
            background-color: #007bff;
        }
        .document a:hover {
            background-color: #0056b3;
        }
        .back-button {
            display: inline-block;
            background-color: red;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            text-align: center;
            text-decoration: none;
            margin: 20px auto;
            width: 100px;
        }
        .back-button:hover {
            background-color: darkred;
        }
        footer {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
    <header>
        <img src="./images/logo.png" alt="Logo">
        <h1>Barangay Documents</h1>
    </header>
    
    <div class="container">
        <div class="document">
            <img src="./images/pdf.png" alt="PDF Icon">
            <h2>Barangay Clearance</h2>
            <p>A business permit is a document issued by the barangay to authorize an individual or entity to conduct business within its jurisdiction. It ensures compliance with local regulations and is often required for legal operation.</p>
            <a href="certof_clearance.php">Download Barangay Clearance Form</a>
        </div>
        <div class="document">
            <img src="./images/pdf.png" alt="PDF Icon">
            <h2>Certificate of Residency</h2>
            <p>A barangay certificate certifies residency in the barangay for various purposes such as employment, school admission, etc.</p>
            <a href="certof_residency.php">Download Certificate of Residency Form</a>
        </div>
        <div class="document">
            <img src="./images/pdf.png" alt="PDF Icon">
            <h2>Business Permit</h2>
            <p>A barangay business permit is a document issued by the barangay to authorize an individual or entity to operate a business within its jurisdiction. It ensures compliance with local regulations and is often required for legal operation.</p>
            <a href="certof_business.php">Download Business Permit Form</a>
        </div>
    </div>
    <div style="text-align: center;">
        <a class="back-button" href="homepage.php">Back</a>
    </div>
</body>
<footer>
    &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</html>
