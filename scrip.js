// DOM Element Selectors
const modal = document.getElementById('studentModal');
const addStudentBtn = document.getElementById('addStudentBtn');
const closeBtn = document.querySelector('.close-btn');
const studentForm = document.getElementById('studentForm');
const studentTableBody = document.querySelector('#studentTable tbody');
const totalStudentsCount = document.getElementById('totalStudentsCount');

// Open Modal Window
addStudentBtn.addEventListener('click', () => {
    modal.style.display = 'flex';
});

// Close Modal Window (Clicking the 'X')
closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
});

// Close Modal Window (Clicking outside the form area)
window.addEventListener('click', (e) => {
    if (e.target === modal) {
        modal.style.display = 'none';
    }
});

// Handle Form Submission
studentForm.addEventListener('submit', (e) => {
    e.preventDefault(); // Prevent page reload
    
    // Extract input field values
    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const email = document.getElementById('email').value;
    const gpa = parseFloat(document.getElementById('gpa').value).toFixed(2);
    
    // Auto-generate today's date format (YYYY-MM-DD)
    const today = new Date().toISOString().split('T')[0];
    
    // Create a new data row
    const newRow = document.createElement('tr');
    newRow.innerHTML = `
    <td>${firstName} ${lastName}</td>
    <td>${email}</td>
    <td>${today}</td>
    <td>${gpa}</td>
    `;
    
    // Append new row to existing table layout
    studentTableBody.appendChild(newRow);
    
    // Update Counter Widget UI
    let currentCount = parseInt(totalStudentsCount.textContent);
    totalStudentsCount.textContent = currentCount + 1;
    
    // Reset Form Input Fields & Dismiss View
    studentForm.reset();
    modal.style.display = 'none';
});
