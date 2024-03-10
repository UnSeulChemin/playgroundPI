<?php

function disconnection()
{
    unset($_SESSION["user"]);

    if (!empty($_GET["id"]))
    {
        header("Location: .././");
    }

    header("Location: ./");
}