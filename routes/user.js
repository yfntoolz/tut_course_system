const express = require('express')
const mysql = require('mysql')
const router = express.Router()

router.get('/users', (req, resp) => {

    const connection = getConnection()
    //const userId = req.params.id
    var queryString = "SELECT * FROM mysampletable";

    connection.query(queryString, (error, rows, fields) => {

        if (error) {

            console.log('Failed to query for users ' + error)
            resp.sendStatus(500)

            return

        }

        resp.json(rows)
    })
})

// Register User
router.post('/user_create', (req, resp) => {

    const firstName = req.body.first_name
    const lastName = req.body.last_name
    const emailAddress = req.body.email
    const password = req.body.password
    const highestQualification = req.body.highest_qualification
    const apsScore = req.body.aps_score
    const english = req.body.english
    const maths = req.body.mathematics
    const physics = req.body.physics

    const connection = getConnection()

    const selectString = "SELECT * FROM student WHERE email = ?";

    connection.query(selectString, [emailAddress], (error, results, fields) => {

        if (error) {

            resp.send({
                "code": 400,
                "Failed": "Error Occurred"
            })

            return false;

        } else if (results.length > 0) {

            resp.send({
                "code": 500,
                "Error": "Email address already exists, login instead"
            });

            return false;
            
        }
    })

    const queryString = "INSERT INTO student (first_name, last_name, email, password, highest_qualification, aps_score, english, maths, physics) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"

    connection.query(queryString, [firstName, lastName, emailAddress, password, highestQualification, apsScore, english, maths, physics], (err, results, fields) => {

        if (err) {

            console.log("Failed to insert new user: " + err)

            resp.sendStatus(500)

            return
        }

        resp.writeHead(201, { "Location": "http://" + req.headers['host'] + '/courses.html' });

        //console.log("Inserted a new user")

    })
})

router.post('/login', (req, resp) => {

    const connection = getConnection()
    
    var email = req.body.login_email;
    var password = req.body.login_password;
    var queryString = "SELECT * FROM student WHERE email = ?";

        connection.query(queryString, [email], (error, results, fields) => {
        
        console.log("Email is: " + email);
        console.log("Password is: " + password);
        if (error) {
            resp.send({
                "code": 400,
                "failed": "error ocurred"
            })
        } else {
            if (results.length > 0) {
                if (results[0].password == password) {
                    resp.send({
                        "code": 200,
                        "success": "Login Sucessfull"
                    });
                }
                else {
                    resp.send({
                        "code": 204,
                        "Error": "Email and password do not match"
                    });
                }
            }
            else {
                resp.send({
                    "Code": 204,
                    "Error": "Email does not exist"
                });
            }
        }
    })
})

router.get('/get_courses', (req, resp) => {

    const connection = getConnection()

    var english = req.body.english;
    var maths = req.body.maths;
    var physics = req.body.physics;
    var aps = req.body.aps;

    var queryString = "SELECT course_name, aps FROM course WHERE english <= ? AND maths <= ? AND physics <= ? AND aps <= ?";

    connection.query(queryString, [english,maths,physics,aps], (error, rows, fields) => {

        if (error) {

            resp.send({
                "code": 400,
                "Failed": "Error Occurred"
            })

        } else {

            if (rows.length > 0) {

                resp.json(rows)

            } else {

                resp.send({
                    "code": 404,
                    "Failed": "No Courses Retrieved"
                })
            }
        }
    })
})

function getConnection() {

    return mysql.createConnection({

        // Properties
        host: 'localhost',
        user: 'root',
        password: '',
        database: 'sampleDB'

    })
}

module.exports = router