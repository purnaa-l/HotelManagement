import http from 'http';
import express from 'express'
import { readFileSync } from 'fs';
const AdminLogin = readFileSync('./AdminLogin.html', 'utf-8');
const UserLogin = readFileSync('./UserLogin.html', 'utf-8');




const server = http.createServer((req, res) => {
  console.log(req.url);

  
  res.statusCode = 200;
  res.setHeader('Content-Type', 'text/html');
  res.end(home);
});

server.listen(4000, '127.0.0.1', () => {
  console.log('Server running at http://127.0.0.1:3000/');
});
