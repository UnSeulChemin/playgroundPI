<?php 

// Verify Visitor Path
$paths["page"] = ["", "register", "login"];

// Verify User Path
$paths["user"] = ["shop", "contact", "upload", "profile", "logout"];

// Verify Admin Path
$paths["admin"] = ["admin", "contacts", "mcontacts", "dcontacts"];

// Allow a few Pages Able to get a GET ID
$pathsIdAllowed["id"] = ["shop", "contacts", "mcontacts", "dcontacts"];