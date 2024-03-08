<?php 

// Verify Visitor Paths
$paths["visitor"] = ["register", "login"];

// Verify User Paths
$paths["user"] = ["shop", "contact", "upload", "profile", "logout"];

// Verify Admin Paths
$paths["admin"] = ["admin", "contacts", "mcontacts", "dcontacts"];

// Allow a few Pages Able to get a GET ID
$pathsIdAllowed["id"] = ["shop", "contacts", "mcontacts", "dcontacts"];