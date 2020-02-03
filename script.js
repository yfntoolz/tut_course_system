const express = require('express')

const app = express();

// Morgan logging tool
const morgan = require('morgan')

const bodyParser = require('body-parser')

app.use(bodyParser.urlencoded({extended: false}))

app.use(express.static('./public'))

app.use(morgan('short'))

const mysql = require('mysql');

const router = require('./routes/user.js')

app.use(router)

app.listen(1337)

const phpServer = require('php-server');

(async () => {
    const server = await phpServer();
    console.log(`PHP server running at ${server.url}`)
})();