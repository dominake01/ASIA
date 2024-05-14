<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download and View PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }
        h1 {
            color: #4caf50;
            margin-bottom: 20px;
            margin-top: -50px;
        }
        a {
            display: inline-block;
            margin: 10px 0;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #357ABD;
        }
        iframe {
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .container {
            width: 90%;
            max-width: 800px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Download Barangay Clearance</h1>
        <a href="./images/BARANGAY CLEARANCE.pdf" download="BARANGAY CLEARANCE.pdf">Download PDF</a>
        <iframe src="./images/BARANGAY CLEARANCE.pdf" width="100%" height="600px">
            This browser does not support PDFs. Please download the PDF to view it: 
            <a href="./images/BARANGAY CLEARANCE.pdf">Download PDF</a>.
        </iframe>
    </div>
</body>
</html>
