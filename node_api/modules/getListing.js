module.exports = (db) => {
    const express = require('express');
    const router = express.Router();

    // GET /api/listing
    router.get('/get', (req, res) => {
        const { id, access_token } = req.query;

        try {
            const decoded = jwt.verify(access_token, 'secretKey');

            if (decoded.userId != id) {
                return res.status(401).json({ error: 'Unauthorized access' });
            }

            const query = 'SELECT id, name, distance, created_at, updated_at FROM listings WHERE user_id = ?';

            db.query(query, [id], (err, results) => {
                if (err) {
                    return res.status(500).json({ error: 'Database error' });
                }

                res.json({
                    status: 200,
                    message: 'Success',
                    result: {
                        current_page: 1,
                        data: results
                    }
                });
            });
        } catch (err) {
            res.status(401).json({ error: 'Invalid token' });
        }
    });

    return router;
};
