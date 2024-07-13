//import express from 'express'
const express = require('express');
const bodyParser = require('body-parser');
const { Pool } = require('pg');
const path = require('path');

const app = express();
const port = 3000;

const pool = new Pool({
    user:"postgres",
    host:"localhost",
    database:"Hotel Management",
    password:"mmpp1122",
    port:5432,
  
});

app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname, 'public')));
app.use(bodyParser.urlencoded({ extended: true }));

app.get('/', (req, res) => {
  res.render('index');
});

app.post('/check-availability', async (req, res) => {
  const { arrival, departure, roomType } = req.body;

  try {
    const result = await pool.query(
      `SELECT * FROM room_availability WHERE room_type = $1 AND date BETWEEN $2 AND $3 AND available = true`,
      [roomType, arrival, departure]
    );

    res.render('availability', { available: result.rows.length > 0 });
  } catch (err) {
    console.error(err);
    res.send('Error occurred');
  }
});

app.listen(port, () => {
  console.log(`Server running on http://localhost:${port}`);
});

// import express from 'express';
// import bodyParser from 'body-parser';
// import { Pool } from 'pg';
// import cors from 'cors';

// const app = express();
// const port = 3000;

// app.use(bodyParser.json());
// app.use(cors());

// const pool = new Pool({
//     user:"postgres",
//     host:"localhost",
//     database:"Hotel Management",
//     password:"mmpp1122",
//     port:5432,
// });

// app.post('/check-availability', async (req, res) => {
//   const { arrival, departure, roomType } = req.body;
//   try {
//     const result = await pool.query(`
//       SELECT date, ${roomType}
//       FROM room_availability
//       WHERE date BETWEEN $1 AND $2`, [arrival, departure]);
//     res.json(result.rows);
//   } catch (err) {
//     console.error(err);
//     res.status(500).send('Server Error');
//   }
// });

// app.listen(port, () => {
//   console.log(`Server running on port ${port}`);
// });
