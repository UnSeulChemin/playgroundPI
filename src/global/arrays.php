<?php 

// Verify Pages Exist for Visitor and Logged Users
$paths["page"] = ["", "register", "login", "shop", "contact", "upload", "profile", "logout"];

// Verify Admin Paths and Roles
$paths["admin"] = ["admin", "contacts", "mcontacts", "dcontacts"];

// Allow a few Pages Able to get a GET ID
$pathsIdAllowed["id"] = ["shop", "contacts", "mcontacts", "dcontacts"];