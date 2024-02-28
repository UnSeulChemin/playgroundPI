<?php

function disconnection()
{
    unset($_SESSION["user"]);
    header("Location: ./");
}