// Fonction pour récupérer les informations actuelles de l'utilisateur
async function getUserData() {
    const response = await fetch('/get-user-data', {
        method: 'GET',
        headers: {
            'Content-Type': 'application/json'
        }
    });

    const data = await response.json();
    if (data.success) {
        // Remplir le formulaire avec les données récupérées
        document.getElementById('firstName').value = data.user.firstName;
        document.getElementById('lastName').value = data.user.lastName;
        document.getElementById('dob').value = data.user.dob;
        document.getElementById('address').value = data.user.address;
        document.getElementById('phone').value = data.user.phone;
        document.getElementById('email').value = data.user.email;
    } else {
        alert('Impossible de récupérer les données de l\'utilisateur.');
    }
}

// Charger les données actuelles lors du chargement de la page
window.onload = function() {
    getUserData();
};

// Fonction pour vérifier l'unicité de l'email
async function checkEmailUniqueness(email) {
    const response = await fetch('/check-email', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email })
    });
    const data = await response.json();
    return data.isUnique;
}

// Fonction pour gérer la soumission du formulaire de mise à jour
document.getElementById('updateForm').addEventListener('submit', async (event) => {
    event.preventDefault();

    const email = document.getElementById('email').value;
    
    // Vérification de l'unicité de l'email
    const isEmailUnique = await checkEmailUniqueness(email);

    if (!isEmailUnique) {
        alert("L'email est déjà utilisé. Veuillez en choisir un autre.");
        return;
    }

    const formData = new FormData(event.target);

    const data = {
        firstName: formData.get('firstName'),
        lastName: formData.get('lastName'),
        dob: formData.get('dob'),
        address: formData.get('address'),
        phone: formData.get('phone'),
        email: formData.get('email')
    };

    // Envoi des données pour mise à jour
    const response = await fetch('/update-user', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    });

    const result = await response.json();

    if (result.success) {
        alert('Informations mises à jour avec succès!');
    } else {
        alert('Une erreur est survenue. Veuillez réessayer.');
    }
});

// Fonction pour supprimer le compte
document.getElementById('deleteAccount').addEventListener('click', async () => {
    if (confirm('Êtes-vous sûr de vouloir supprimer votre compte et toutes les données associées ?')) {
        const response = await fetch('/delete-account', {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        const result = await response.json();

        if (result.success) {
            alert('Compte supprimé avec succès.');
            window.location.href = '/'; // Redirige vers la page d'accueil après suppression
        } else {
            alert('Une erreur est survenue lors de la suppression.');
        }
    }
});

// server.js (avec Express.js)

const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql');
const app = express();

app.use(bodyParser.json());

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'password',
    database: 'user_database'
});

db.connect(err => {
    if (err) throw err;
    console.log('Database connected');
});

// Vérifier l'unicité de l'email
app.post('/check-email', (req, res) => {
    const email = req.body.email;
    db.query('SELECT COUNT(*) AS count FROM users WHERE email = ?', [email], (err, result) => {
        if (err) throw err;
        res.json({ isUnique: result[0].count === 0 });
    });
});

// Mettre à jour les informations utilisateur
app.post('/update-user', (req, res) => {
    const { firstName, lastName, dob, address, phone, email } = req.body;
    const userId = req.body.userId; // ID de l'utilisateur à mettre à jour

    db.query('UPDATE users SET first_name = ?, last_name = ?, dob = ?, address = ?, phone = ?, email = ? WHERE user_id = ?',
        [firstName, lastName, dob, address, phone, email, userId], (err, result) => {
            if (err) {
                res.json({ success: false });
                throw err;
            }
            res.json({ success: true });
        });
});

// Supprimer un compte utilisateur
app.delete('/delete-account', (req, res) => {
    const userId = req.body.userId; // ID de l'utilisateur à supprimer

    db.query('DELETE FROM user_data WHERE user_id = ?', [userId], (err, result) => {
        if (err) {
            res.json({ success: false });
            throw err;
        }

        db.query('DELETE FROM users WHERE user_id = ?', [userId], (err, result) => {
            if (err) {
                res.json({ success: false });
                throw err;
            }
            res.json({ success: true });
        });
    });
});

app.listen(3000, () => {
    console.log('Server running on port 3000');
});
