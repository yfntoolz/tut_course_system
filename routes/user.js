const express = require('express')
const mysql = require('mysql')
const router = express.Router()

router.get('/active_user', (req, resp) => {

    const connection = getConnection();

    var email_active;

    var queryString = "SELECT email FROM active_user";

    connection.query(queryString, (error, res, rows) => {

        if (error) {

            res.sendStatus(500)

            return

        } else {

            email_active = res[0].email;

            var queryString = "SELECT * FROM student WHERE email = ?";

            connection.query(queryString, [email_active], (error, rows, fields) => {

                if (error) {

                    resp.sendStatus(500)

                    return

                }

                resp.json(rows)
            })
        }
    })
})

router.get('/dashboard', (req, resp) => {

    const connection = getConnection();

    var email_active;

    var queryString = "SELECT email FROM active_user";

    connection.query(queryString, (error, res, rows) => {

        if (error) {

            res.sendStatus(500)

            return

        } else {

            email_active = res[0].email;

            var queryString = "SELECT * FROM ranks WHERE email = ?";

            connection.query(queryString, [email_active], (error, res, rows) => {

                if (error) {

                    resp.sendStatus(500)

                    return

                }

                resp.json(rows)
            })
        }
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

    const queryString = "INSERT INTO student (first_name, last_name, email, password, highest_qualification, aps_score, english, maths, physics) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
    const queryString2 = "INSERT INTO active_user (email) VALUES (?)"

    connection.query(queryString, [firstName, lastName, emailAddress, password, highestQualification, apsScore, english, maths, physics], (err, results, fields) => {

        if (err) {

            resp.sendStatus(500)

            return
        }

        //resp.writeHead(201, { "Location": "http://" + req.headers['host'] + '/courses.html' });

        return

    })

    connection.query(queryString2, [emailAddress], (err, results, fields) => {

        if (err) {

            resp.sendStatus(500)

            return
        }

        resp.writeHead(301,
            { Location: "http://" + req.headers['host'] + '/courses.html' }
        );

        resp.end();

    })
})

router.post('/login', (req, resp) => {

    const connection = getConnection()
    
    var email = req.body.login_email;
    var password = req.body.login_password;
    var queryString = "SELECT * FROM student WHERE email = ?";

        connection.query(queryString, [email], (error, results, fields) => {
        
        if (error) {
            resp.send({
                "code": 400,
                "failed": "error ocurred"
            })
        } else {
            if (results.length > 0) {
                if (results[0].password == password) {

                    const queryString2 = "INSERT INTO active_user (email) VALUES (?)";

                    connection.query(queryString2, [email], (err, results, fields) => {

                        if (err) {

                            resp.sendStatus(500)

                            return
                        }
                    })

                    resp.writeHead(301,
                        { Location: "http://" + req.headers['host'] + '/dashboard.html' }
                    );

                    resp.end();
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

router.get('/logout', (req, resp) => {

    const connection = getConnection()

    var queryString = "DELETE FROM active_user";

    connection.query(queryString, (error, results, fields) => {

        if (error) {
            resp.send({
                "code": 400,
                "failed": "error ocurred"
            })
        } else {
            resp.writeHead(301,
                { Location: "http://" + req.headers['host'] + '/index.html' }
            );
            resp.end();
        }
    })
})

router.get('/get_courses/:aps/:eng/:math/:phy', (req, resp) => {

    const connection = getConnection()

    var english = req.params.eng;
    var maths = req.params.math;
    var physics = req.params.phy;
    var aps = req.params.aps;

    var queryString = "SELECT course_name, aps FROM course WHERE english <= ? AND maths <= ? AND physics <= ? AND aps <= ?";

    connection.query(queryString, [english,maths,physics,aps], (error, rows, fields) => {

        if (error) {

            resp.send({
                "code": 400,
                "Failed": "Error Occurred: " + error
            })

        } else {

            if (rows.length > 0) {

                resp.json(rows)

            } else {

                resp.send({
                    "message": "We regret to inform you that your marks are too low to be ranked against any of our courses."
                })
            }
        }
    })
})

// Register User
router.get('/apply/:course/:emailAddress/:rank', (req, resp) => {

    const course = req.params.course;
    const rank = req.params.rank;
    const emailAddress = req.params.emailAddress;

    const connection = getConnection()

    const queryString = "INSERT INTO ranks (course_id, student_email, ranking) VALUES (?, ?, ?)"

    connection.query(queryString, [course,emailAddress,rank], (err, results, fields) => {

        if (err) {

            resp.sendStatus(500)

            return
        }

        resp.send("success")
        //resp.writeHead(201, { "Location": "http://" + req.headers['host'] + '/courses.html' });

        return

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