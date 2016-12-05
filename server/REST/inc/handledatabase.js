/*
 * @Author: Tim Koepsel
 * @Date: 2016-11-13 09:07:08 
 * @Last Modified by: Tim Koepsel
 * @Last Modified time: 2016-11-27 18:55:58
 */

var sqlHandler = function(app, mysql) {

    // Load Configs
    const servercfg = require("../serverconfig.json");
    const sqlconfig = require("../sqlconfig.json");

    // Create Database Connection
    var connection = mysql.createConnection(sqlconfig);
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

        var sql = 'INSERT INTO app_users (firstname,lastname,email,password,registrationdate) VALUES (?,?,?,?,?)';
        conection.query(sql, [firstname, lastname, email, password, GetUnixTimestamp()], function(err, results) {
            if (!err) {
                return results;
            } else {
                return "Fehler: " + err;
            }
        });
    }
    // ────────────────────────────────────────────────────────────────────────────────


    /*************************************************************************
     * Flushes all outdated Clients from Database
     * Should be called by timer
     * ***********************************************************************
     */
    function flushPings() {

    }

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Adds a new client into the ip pool
     * ***********************************************************************
     */
    function sendPing(ip) {

    }

    // ────────────────────────────────────────────────────────────────────────────────

    /*************************************************************************
     * Count all active Clients
     * ***********************************************************************
     */
    function getActiveClients() {
        var sql = 'SELECT COUNT(*) AS countResult FROM ' + servercfg.databaseprefix + 'clients';
        connection.query(sql, [], function(err, results) {
            if (!err) {
                return results.countResult;
            } else {
                return "Fehler: " + err;
            }
        });
    }

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



}

module.exports = sqlHandler;