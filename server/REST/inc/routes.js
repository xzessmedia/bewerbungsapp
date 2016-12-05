/*
 * @Author: Tim Koepsel &lt;tim.koepsel@me.com&gt; 
 * @Date: 2016-11-13 08:35:17 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-01 00:30:40
 */

var appRouter = function(app,mysql) {


        // Load Configs
    const servercfg = require("../serverconfig.json");
    const sqlconfig = require("../sqlconfig.json");

    // Create Database Connection
    //var connection = mysql.createConnection(sqlconfig);
    var pool  = mysql.createPool(sqlconfig);

    //
    // ─── SQL FUNCTIONS TO USE ───────────────────────────────────────────────────────
    //

    /*************************************************************************
     * Creates a user in the SQL Database
     * ***********************************************************************
     * @param  {string} firstname
     * @param  {string} lastname
     * @param  {string} email
     * @param  {string} password
     */
    function createUser(firstname, lastname, email, password) {

        var sqldata = 'INSERT INTO app_users (firstname,lastname,email,password,registrationdate) VALUES (?,?,?,?,?)';
        pool.getConnection(function(err, connection) {
        connection.query(sqldata, [firstname, lastname, email, password, GetUnixTimestamp()], function(err, results) {
            
            console.log('Query: Create User');
            console.log('Result: ' + JSON.stringify(results) + ' Error: '+err);
            if (!err) {
                return results;
            } else {
                return "Fehler: " + err;
            }
        });
        // And done with the connection.
        connection.release();
        });
    }

    /*************************************************************************
    * Gets all users from database
    * ***********************************************************************
    */
    function getUsers() {
        var sqldata = 'SELECT * FROM app_users';
        
        pool.getConnection(function(err, connection) {
        // Use the connection
        console.log('Query: Get all Users');
        connection.query(sqldata,function(err, results) {
            console.log('Result: ' + JSON.stringify(results) + ' Error: '+err);
            if (!err) {
                return JSON.stringify(results);
            } else {
                return "Fehler: " + err;
            }
        });
        // And done with the connection.
        connection.release();
        });
    }
    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
    * Checks if an sql entry exists
    * ***********************************************************************
    */
    function EntryExist(column,value) {
        var sqldata = 'INSERT INTO app_clients (ip,lastping,firstping) VALUES (?,?,?)';
        pool.getConnection(function(err, connection) {
        connection.query(sqldata, [ip, GetUnixTimestamp(), GetUnixTimestamp()], function(err, results) {
            
            console.log('Query: Send Ping');
            console.log('Result: ' + JSON.stringify(results) + ' Error: '+err);
            if (!err) {
                return results;
            } else {
                return "Fehler: " + err;
            }
        });
        // And done with the connection.
        connection.release();
        });
    }

    /*************************************************************************
     * Flushes all outdated Clients from Database
     * Should be called by timer
     * ***********************************************************************
     */
    function flushPings() {
        var sqldata = 'DELETE FROM app_clients WHERE lastping < (UNIX_TIMESTAMP() - 600)';
        pool.getConnection(function(err, connection) {
        connection.query(sqldata, [ip, GetUnixTimestamp(), GetUnixTimestamp()], function(err, results) {
            console.log('Query: Flush Clients');
            console.log('Result: ' + JSON.stringify(results) + ' Error: '+err);
            if (!err) {
                return results;
            } else {
                return "Fehler: " + err;
            }
        });
        // And done with the connection.
        connection.release(); 
    });
    }

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Adds a new client into the ip pool
     * ***********************************************************************
     */
    function sendPing(ip) {
        var sqldata = 'INSERT INTO app_clients (ip,lastping,firstping) VALUES (?,?,?) ON DUPLICATE KEY UPDATE lastping="'+GetUnixTimestamp()+'"';
        pool.getConnection(function(err, connection) {
        connection.query(sqldata, [ip, GetUnixTimestamp(), GetUnixTimestamp()], function(err, results) {
            
            console.log('Query: Send Ping');
            console.log('Result: ' + JSON.stringify(results) + ' Error: '+err);
            if (!err) {
                return results;
            } else {
                return "Fehler: " + err;
            }
        });
        // And done with the connection.
        connection.release();
        });
    }

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Count all active Clients
     * ***********************************************************************
     */
    function getActiveClients(resultcallback) {

        var sql = 'SELECT * FROM app_clients';
        var result = 0;
        pool.getConnection(function(err, connection) {
       
        connection.query(sql, [], function(err, results,res) {
            if (!err) {
                console.log(JSON.stringify(results.length));
                resultcallback(results);
            } 
        });
        // And done with the connection.
        connection.release();
        
        });
    }
    // ────────────────────────────────────────────────────────────────────────────────


    // ────────────────────────────────────────────────────────────────────────────────


    //
    // ─── HELPERS ────────────────────────────────────────────────────────────────────
    //
    function GetUnixTimestamp() {
        return (Math.round(Date.now() / 1000));
    }

    function GetJSTimestamp() {
        return Date.now();
    }

    function ConvertToJSTimestamp(unixTimestamp) {
        return Math.round(unixTimestamp * 1000);
    }

    function ConvertToUnixTimestamp(jsTimestamp) {
        return Math.round(jsTimestamp / 1000);
    }
    // ────────────────────────────────────────────────────────────────────────────────



    //
    // ─── HANDLE REQUESTS ────────────────────────────────────────────────────────────
    //


    /*************************************************************************
     * Sends the Account Data on Request Post
     * ***********************************************************************
     */
    app.get("/account", function(req, res) {
        var accountMock = {
            "username": "nraboy",
            "password": "1234",
            "twitter": "@nraboy"
        }
        if (!req.query.username) {
            return res.send({ "status": "error", "message": "missing username" });
        } else if (req.query.username != accountMock.username) {
            return res.send({ "status": "error", "message": "wrong username" });
        } else {
            return res.send(accountMock);
        }
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Gets a Application from database and returns the content
     * ***********************************************************************
     */
    app.get("/application", function(req, res) {
        if (!req.query.appid) {
            return res.send({ "status": "error", "message": "missing appid" });
        } else {
            var sql = 'SELECT * FROM app_applications WHERE appid=?';
            pool.getConnection(function(err, connection) {
        
            connection.query(sql, [req.query.appid], function(err, results) {
                if (!err) {
                    return res.send(results);
                } else {
                    
                }
            });
            // And done with the connection.
            connection.release();
            
            });
        }
    });

    /*************************************************************************
     * Posts a new Application to the database
     * ***********************************************************************
     */
    app.post("/application", function(req, res) {
        
        // First check if we have an application ID or not
        if(!req.query.appid) {

            // We don't have an app id so we have to create a new application in database
            if (!req.query.userid) {
                return res.send({ "status": "error", "message": "missing userid" });
            } else if (!req.query.json) {
                return res.send({ "status": "error", "message": "missing applicationcontent" });
            } else {
                var sqldata = 'INSERT INTO app_applications (userid,json,creationdate,lasteditdate) VALUES (?,?,?,?)';
                pool.getConnection(function(err, connection) {
                connection.query(sqldata, [req.query.userid, req.query.json, GetUnixTimestamp(), GetUnixTimestamp()], function(err, results) {
                    if (!err) {
                        console.log(req.query.json + ' ' + req.query.userid);
                        console.log(JSON.stringify("Insert: " +results.length));
                        return res.send(results);
                    } 
                });
                // And done with the connection.
                connection.release();
                });
            }
        } else {
            // We have an app id so we need to edit the entry
            var sqldata = 'UPDATE app_applications SET json=?, lasteditdate=? WHERE userid=?';
                pool.getConnection(function(err, connection) {
                connection.query(sqldata, [req.query.json, GetUnixTimestamp(),req.query.userid], function(err, results) {
                    if (!err) {
                        console.log(JSON.stringify("Update: " +results.length));
                        return res.send(results);
                    } 
                });
                // And done with the connection.
                connection.release();
                });
        }
    });

    /*************************************************************************
     * Get all Applications for Userid
     * ***********************************************************************
     */
    app.get("/applications", function(req, res) {
        if (!req.query.userid) {
            return res.send({ "status": "error", "message": "missing userid" });
        } else {
            var sql = 'SELECT * FROM app_applications WHERE userid=?';
            pool.getConnection(function(err, connection) {
        
            connection.query(sql, [req.query.userid], function(err, results) {
                if (!err) {
                    return res.send(results);
                } else {
                    
                }
            });
            // And done with the connection.
            connection.release();
            
            });
        }
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Counts all clients
     * ***********************************************************************
     */
    app.get("/countclients", function(req, res) {
        var resultcallback = function(result) {
            return res.send({response: result.length});
        }
        var clientcount = getActiveClients(resultcallback);
        
    });

    // ────────────────────────────────────────────────────────────────────────────────
    /*************************************************************************
     * Submit Bugreport
     * ***********************************************************************
     */
    app.post("/bugreport", function(req, res) {
        if(!req.query.description) {
            return res.send({ "status": "error", "message": "missing description" });
        } else if(!req.query.email) {
            return res.send({ "status": "error", "message": "missing email" });
        } else {
            var sql = 'INSERT INTO app_bugs (description,email,timestamp) VALUES (?,?,?)';
                pool.getConnection(function(err, connection) {
            
                connection.query(sql, [req.query.description,req.query.email,GetUnixTimestamp()], function(err, results) {
                    if (!err) {
                            return res.send(results);
                        } else {
                            return res.send({ "status": "error", "message": "did mot work" });
                        }
                });
                // And done with the connection.
                connection.release();
                });
            }
    });

// ────────────────────────────────────────────────────────────────────────────────
    /*************************************************************************
     * Submit Idea
     * ***********************************************************************
     */
    app.post("/idea", function(req, res) {
        if(!req.query.description) {
            return res.send({ "status": "error", "message": "missing description" });
        } else if(!req.query.email) {
            return res.send({ "status": "error", "message": "missing email" });
        } else {
            var sql = 'INSERT INTO app_ideas (description,email,timestamp) VALUES (?,?,?)';
                pool.getConnection(function(err, connection) {
            
                connection.query(sql, [req.query.description,req.query.email,GetUnixTimestamp()], function(err, results) {
                    if (!err) {
                            return res.send(results);
                        } else {
                            return res.send({ "status": "error", "message": "did mot work" });
                        }
                });
                // And done with the connection.
                connection.release();
                });
            }
    });


    /*************************************************************************
     * Login on Post
     * ***********************************************************************
     */
    app.post("/login", function(req, res) {
        if(!req.query.email) {
            return res.send({ "status": "error", "message": "missing email" });
        } else if(!req.query.password) {
            return res.send({ "status": "error", "message": "missing password" });
        } else {

            var sql = 'SELECT * FROM app_users WHERE email=?';
            pool.getConnection(function(err, connection) {
        
            connection.query(sql, [req.query.email], function(err, results) {
                if (!err) {
                    console.log(JSON.stringify(results.password));
                    console.log('Query Password: ' + req.query.password + ' DB Password: '+results[0].password);
                    console.log('Response: '+results);
                    
                    if(results[0].password == req.query.password) {
                        return res.send(JSON.stringify(results[0]));
                    } else {
                        return res.send({ "status": "error", "message": "password missmatch" });
                    }
                        
                    
                 
                } 
            });
            // And done with the connection.
            connection.release();
            });
        }
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Create Account on Post
     * ***********************************************************************
     */
    app.get("/createaccount", function(req, res) {

    // First validate all values given in post request
    if(!req.query.firstname) {
        return res.send({ "status": "error", "message": "missing firstname" });
    } else if(!req.query.lastname) {
        return res.send({ "status": "error", "message": "missing lastname" });
    } else if(!req.query.email) {
        return res.send({ "status": "error", "message": "missing email" });
    } else if(!req.query.password) {
        return res.send({ "status": "error", "message": "missing password" });
    } else {
        // If everything ok, do database action
        var result = createUser(req.query.firstname, req.query.lastname, req.query.email, req.query.password);
        return res.send(result);
    }
    
    });
    // ────────────────────────────────────────────────────────────────────────────────
    app.post("/createaccount", function(req, res) {

    // First validate all values given in post request
    if(!req.query.firstname) {
        return res.send({ "status": "error", "message": "missing firstname" });
    } else if(!req.query.lastname) {
        return res.send({ "status": "error", "message": "missing lastname" });
    } else if(!req.query.email) {
        return res.send({ "status": "error", "message": "missing email" });
    } else if(!req.query.password) {
        return res.send({ "status": "error", "message": "missing password" });
    } else {
        // If everything ok, do database action
        var result = createUser(req.query.firstname, req.query.lastname, req.query.email, req.query.password);
        return res.send(result);
    }
    
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Sends the current Name and Version of Service
     * ***********************************************************************
     */
    app.get("/", function(req, res) {
        res.send("Bewerbungsapp REST Service Version " + servercfg.version + '\n\n' + "https://www.bewerbungsapp.eu");
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Sends the current Name and Version of Service
     * ***********************************************************************
     */
    app.get("/getusers", function(req, res) {
        var userdata = getUsers();
        res.send(userdata);
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Sends the current Service Version
     * ***********************************************************************
     */
    app.get("/version", function(req, res) {
        res.send(servercfg.version);
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Sends the current Service Version
     * ***********************************************************************
     */
    app.get("/ping", function(req, res) {
        if(!req.query.ip) {
            res.send("No IP specified");
        } else {
            var result = sendPing(req.query.ip);
            res.send("Ping has been executed: "+result);
        }
        
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Receives Account from Database end send the data back
     * ***********************************************************************
     */
    app.post("/account", function(req, res) {
        if (!req.body.username || !req.body.password || !req.body.facebook || !req.body.google) {
            return res.send({ "status": "error", "message": "missing a parameter" });
        } else {
            return res.send(req.body);
        }
    });

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Counts all active Clients
     * ***********************************************************************
     */
    app.get("/clientcount", function(req, res) {
        var result = getActiveClients();
        res.send(result);
    });

}

module.exports = appRouter;