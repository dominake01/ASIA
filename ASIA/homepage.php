<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barangay System Home</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
     body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
}

header {
    background-color: #2E7D32; /* Dark green */
    padding: 20px;
    text-align: center;
    color: white;
    height: 250px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

header img {
    height: 120px;
}

header h1 {
    font-size: 40px;
    margin-top: 10px;
}

.container {
    display: flex;
    justify-content: space-around;
    align-items: center;
    flex-wrap: wrap;
    padding: 20px;
    background-color: #f4f4f4;
    margin-top: -20px;
}

.section {
    position: relative;
    width: 200px;
    background-color: #fafafa; /* Light gray */
    border-radius: 10px;
    border: 2px solid #2E7D32; /* Dark green */
    margin: 10px;
    padding: 20px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    margin-top: 100px;
    color: #2E7D32; /* Dark green */
}

.section:hover {
    transform: translateY(-5px);
}

.section img {
    height: 90px;
}

.section h2 {
    margin-top: 10px;
    margin-bottom: 15px;
    font-size: 1.2em;
}

.section ul {
    list-style-type: none;
    padding: 0;
}

.section ul li {
    margin-bottom: 10px;
}

.section ul li a {
    text-decoration: none;
    color: #f4f4f4; /* Dark green */
    background-color: #2E7D32;
    padding: 10px 20px;
    border-radius: 5px;
    transition: background-color 0.3s ease;
    display: block;
}

.section ul li a:hover {
    color: #2E7D32;
    background-color: #fafafa;
}

.tooltip {
    visibility: hidden;
    width: 120px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 5px 0;
    position: absolute;
    z-index: 1;
    bottom: 100%;
    left: 50%;
    margin-left: -60px;
    opacity: 0;
    transition: opacity 0.3s;
}

.tooltip::after {
    content: "";
    position: absolute;
    top: 100%;
    left: 50%;
    margin-left: -5px;
    border-width: 5px;
    border-style: solid;
    border-color: #333 transparent transparent transparent;
}

.section:hover .tooltip {
    visibility: visible;
    opacity: 1;
}

footer {
    background-color: #2E7D32; /* Dark green */
    color: white;
    padding: 20px;
    text-align: center;
    width: 100%;
    position: fixed;
    bottom: 0;
    left: 0;
    height: 50px;
}

    </style>
</head>
<body background="">
<header>
    
    <img src="./images/logo.png">
    <h1>Welcome to Barangay System</h1>
</header>

<div class="container">
    <div class="section">
        <img src="./images/pips.png" style="height: 90px">
        <h2>Barangay Officials</h2>
        <ul>
            <li><a href="barangay_officials.php">Enter</a></li>
        </ul>
        <span class="tooltip">View information about Barangay Officials</span>
    </div>

    <div class="section">
        <img src="./images/res.png" style="height: 90px">
        <h2>Barangay Records</h2>
        <ul>
            <li><a href="resident_records.php">Enter</a></li>
        </ul>
        <span class="tooltip">View information about Resident Records</span>
    </div>

    <div class="section">
        <img src="./images/re.png" style="height: 90px">
        <h2>Barangay Documents</h2>
        <ul>
            <li><a href="barangay_documents.php">Enter</a></li>
        </ul>
        <span class="tooltip">Documents for Residents (Brgy. Clearance, Brgy. Certificate, Indigency)</span>
    </div>

    <div class="section">
        <img src="./images/scholarship.png" style="height: 90px">
        <h2>Scholarship System</h2>
        <ul>
            <li><a href="scholarship_system.php">Enter</a></li>
        </ul>
        <span class="tooltip">Hover over me!</span>
    </div>
</div>

<footer>
    &copy; 2024 Cabangisan, Pamintuan, Panganiban
</footer>
</body>
</html>
