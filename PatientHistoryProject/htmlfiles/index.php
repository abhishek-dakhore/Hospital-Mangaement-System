<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>Patient Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
            overflow-x: hidden;
        }
        header {
            background-color: #2c3e50;
            color: white;
            padding: 1.5rem 0;
            text-align: center;
        }
        nav {
            display: flex;
            justify-content: center;
            background-color: #34495e;
            padding: 0.5rem 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            margin: 0 1rem;
            font-size: 1.1rem;
        }
        nav a:hover {
            text-decoration: underline;
        }
        .hero {
            text-align: center;
            padding: 3rem 1rem;
            background: linear-gradient(to right, #1abc9c, #16a085);
            color: white;
            animation: fadeIn 2s;
        }
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }
        .hero p {
            font-size: 1.2rem;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .container {
            padding: 2rem;
            text-align: center;
        }
        .cards {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            flex-wrap: wrap;
        }
        .card {
            background-color: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .card h3 {
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }
        .card p {
            color: #555;
            margin-bottom: 1rem;
        }
        .card a {
            display: inline-block;
            padding: 0.5rem 1rem;
            background-color: #2c3e50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .card a:hover {
            background-color: #1abc9c;
        }
        footer {
            text-align: center;
            background-color: #2c3e50;
            color: white;
            padding: 1rem 0;
            margin-top: 2rem;
        }
       
    </style>
</head>
<body>
    <header>
        <h1>Patient Management System</h1>
    </header>
    <nav>
        <a href="#home">Home</a>
        <a href="doctorvalidatelogin.php">Doctor Login</a>
        <a href="receptionValidate.php">Reception Login</a>
        <a href="adminvalidate.php">Admin Login</a>
        <a href="registercomplaint.php">Suggestion</a>
        <a href="about.php">About</a>
    </nav>
    <div class="hero">
        <h1>Welcome to the Patient History System</h1>
        <p>Effortlessly manage patient details, access records, and streamline hospital administration.</p>
    </div>
    <div class="container">
        <h2>Our Features</h2>
        <div class="cards">
            <div class="card">
                <h3>View Patient Status</h3>
                <p>Enter Patient Id to retrieve Patinet status & details.</p>
                <a href="patienttemp.php">Scan to view patient</a>
            </div>
            <div class="card">
                <h3>Hospital Details</h3>
                <p>Manage hospital records, doctors, and system settings.</p>
                <a href="hospitaldashborad.php">View</a>
            </div>
            <div class="card">
                <h3>Downaload ArogyaPatra</h3>
                <p>It is a unique Patient Id Card for Medical Activity Tracker</p>
                <a href="cardlogin.php">Admin Login</a>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; 2025 Patient Management System by Pavan Dabhade & Abhishek Dakhore. All rights reserved.</p>
    </footer>
</body>
</html>
