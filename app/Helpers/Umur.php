<?php

function hitungUmur($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    $m = $today->diff($lahir)->m;
    $d = $today->diff($lahir)->d;
    $umur = $y . " Tahun " . $m . " Bulan " . $d . " Hari";
    return $umur;
}

function Tahun($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $y = $today->diff($lahir)->y;
    return $y;
}

function Bulan($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $m = $today->diff($lahir)->m;
    return $m;
}

function Hari($umur)
{
    $lahir = new DateTime($umur);
    $today = new DateTime('today');
    $d = $today->diff($lahir)->d;
    return $d;
}