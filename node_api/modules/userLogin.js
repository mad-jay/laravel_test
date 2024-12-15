module.exports = (db) => {
    const express = require('express');
    const jwt = require('jsonwebtoken');
    const router = express.Router();

    // POST /api/login
    router.post('/', (req, res) => {
        const { email, password } = req.query;
        const query = 'SELECT id, role_type FROM users WHERE email = ? AND password = ?';

        db.query(query, [email, password], (err, results) => {
            if (err) {
                return res.status(500).json({ error: 'Database error' });
            }
            if (results.length > 0) {
                const user = results[0];
                const accessToken = jwt.sign(
                    { userId: user.id, role_type: user.role_type },
                    'secretKey',
                    { expiresIn: '2h' }
                );

                res.json({
                    status: 200,
                    message: 'Logged in',
                    result: {
                        user_id: user.id,
                        access_token: accessToken,
                        token_type: 'Bearer',
                        role_type: user.role_type,
                        expires_at: new Date(Date.now() + 2 * 60 * 60 * 1000).toISOString()
                    }
                });
            } else {
                res.status(401).json({ error: 'Invalid credentials' });
            }
        });
    });

    return router;
};
