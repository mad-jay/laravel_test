// server.js
const express = require('express');
const app = express();
const bodyParser = require('body-parser');
const mysql = require('mysql2');
const jwt = require('jsonwebtoken');

// Database Connection
const db = mysql.createConnection({
    host: '127.0.0.1',
    user: 'root',
    password: 'password',
    database: 'laravel_test'
});

// Connect to Database
db.connect(err => {
    if (err) {
        console.error('Database connection failed:', err);
    } else {
        console.log('Connected to laravel_test');
    }
});

// Import API Modules
const userLogin = require('./modules/userLogin')(db);
const getListing = require('./modules/getListing')(db);

// Middleware
app.use(bodyParser.json());

// Routes
app.use('/api/login', userLogin);
app.use('/api/listing', getListing);

// Start Server
const PORT = process.env.PORT || 5000;
app.listen(PORT, () => {
    console.log(`Server running on port ${PORT}`);
});
