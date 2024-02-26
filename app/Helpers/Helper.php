<?php
function formatAngka($nominal)
{
    $prefix = $prefix ? $prefix : 'Rp. ';
    return $prefix . number_format($nominal, 0, ',', '.');
} 