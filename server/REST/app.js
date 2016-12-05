/*
 * @Author: Tim Koepsel
 * @Date: 2016-11-13 09:07:08 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-12-02 18:34:44
 */


//
// ─── LOAD MODULE REQUIREMENTS ───────────────────────────────────────────────────
//


const express = require("express");
const bodyParser = require("body-parser");
const mysql = require("mysql");
const passport = require("passport");
const multer = require("multer");
const upload = multer();
const storage = multer.memoryStorage();
const app = express();


//
// ─── LOAD OWN SCRIPT MODULES ────────────────────────────────────────────────────
//

//
// ─── CONFIGURATION AND INIT ─────────────────────────────────────────────────────
//
const servercfg = require("./serverconfig.json");
const sqlcfg = require("./sqlconfig.json");


app.use(bodyParser.json({ limit: '50mb'}));
app.use(bodyParser.urlencoded(
    { 
        limit: '50mb',
        extended: true,
        parameterlimit: 50000
     }));


app.use(function(req,res,next){
    res.header("Access-Control-Allow-Origin", "*");
    res.header("Access-Control-Allow-Headers", "Origin, X-Requested-With, Content-Type, Accept");
    next();
});


//
// ─── LOAD SETTINGS ──────────────────────────────────────────────────────────────
//
var routes = require("./inc/routes.js")(app,mysql);



//
// ─── END ────────────────────────────────────────────────────────────────────────
//
var server = app.listen(servercfg.serverport, function() {
    console.log("Bewerbungsapp-Service Version " + servercfg.version 
    + '\n\n' + "Listening on port %s...", server.address().port);
});