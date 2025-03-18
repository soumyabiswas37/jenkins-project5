const http = require('http');
const os = require('os');
const fs = require('fs');
const { execSync } = require('child_process');

const PORT = 80;

const server = http.createServer((req, res) => {
    const publicIp = execSync("curl -s http://169.254.169.254/latest/meta-data/public-ipv4").toString();
    res.writeHead(200, { 'Content-Type': 'text/html' });
    res.end(`<h1>Version 1 || Instance Public IP: ${publicIp}</h1>`);
});

server.listen(PORT, () => {
    console.log(`Server running at http://localhost:${PORT}/`);
});