<?php

function getGETParameter($parameter): ?string
{
    return isset($_GET[$parameter]) ? (string)$_GET[$parameter] : null;
}

function getPostParameter(string $parameter) : ?string
{
    return isset($_POST[$parameter]) ? (string)$_POST[$parameter] : null;
}

function getRequestMethod(): ?string
{
    return $_SERVER['REQUEST_METHOD'] ?? null;
}