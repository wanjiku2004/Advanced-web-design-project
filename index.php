<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration System</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { background-color: #f1f5f9; color: #1e293b; padding: 3rem 1rem; display: flex; flex-direction: column; align-items: center; }
        
        .container { background: #ffffff; padding: 2.5rem; border-radius: 12px; width: 100%; max-width: 500px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); margin-bottom: 2.5rem; }
        h2 { margin-bottom: 1.5rem; font-size: 1.5rem; text-align: center; color: #2563eb; }
        
        .form-group { margin-bottom: 1.25rem; }
        label { display: block; margin-bottom: 0.4rem; font-size: 0.9rem; font-weight: 600; color: #475569; }
        input { width: 100%; padding: 0.75rem; border: 1px solid #cbd5e1; border-radius: 8px; font-size: 1rem; outline: none; transition: 0.2s; }
        input:focus { border-color: #2563eb; box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }
        
        .btn-submit { width: 100%; background-color: #2563eb; color: #ffffff; font-size: 1rem; font-weight: 600; padding: 0.85rem; border: none; border-radius: 8px; cursor: pointer; transition: 0.2s; margin-top: 0.5rem; }
        .btn-submit:hover { background-color: #1d4ed8; }
        
        .table-container { background: #ffffff; padding: 2rem; border-radius: 12px; width: 100%; max-width: 800px; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05); }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 0.85rem 1rem; border-bottom: 1px solid #e2e8f0; }
        th { background-color: #f8fafc; color: #64748b; font-weight: 600; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Student Registration Form</h2>
        <form id="studentForm">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="gpa">Current GPA</label>
                <input type="number" id="gpa" step="0.01" min="0" max="4" required>
            </div>
            <button type="submit" class="btn-submit">Register Student</button>
        </form>
    </div>

    <div class="table-container">
        <h2>Database Records</h2>
        <table id="studentTable">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email Address</th>
                    <th>GPA</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $conn = new mysqli("localhost", "root", "", "school_system");
                if (!$conn->connect_error) {
                    $result = $conn->query("SELECT * FROM students ORDER BY student_id DESC");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row['student_id'] . "</td>
                                <td>" . htmlspecialchars($row['first_name'] . " " . $row['last_name']) . "</td>
                                <td>" . htmlspecialchars($row['email']) . "</td>
                                <td>" . number_format($row['gpa'], 2) . "</td>
                              </tr>";
                    }
                    $conn->close();
                }
                ?>
            </tbody>
        </table>
    </div>

    <script>
        document.getElementById('studentForm').addEventListener('submit', function(e) {
            e.preventDefault(); 

            const studentPayload = {
                firstName: document.getElementById('firstName').value,
                lastName: document.getElementById('lastName').value,
                email: document.getElementById('email').value,
                gpa: document.getElementById('gpa').value
            };

            fetch('http://localhost/school-system/add_student.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify(studentPayload)
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    window.location.reload();
                } else {
                    alert("Database Error: " + data.message);
                }
            })
            .catch(error => {
                console.error("Network Link Mismatch:", error);
                alert("Could not connect to the backend server. Open your F12 Network logs.");
            });
        });
    </script>
</body>
</html>
