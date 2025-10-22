<?php
$jumlahUang = 1575250;

$sa = intdiv($jumlahUang, 100000);
$sisa = $jumlahUang % 100000;

$sb = intdiv($sisa, 50000);
$sisa = $sisa % 50000;

$sc = intdiv($sisa, 20000);
$sisa = $sisa % 20000;

$sd = intdiv($sisa, 5000);
$sisa = $sisa % 5000;

$se = intdiv($sisa, 100);
$sisa = $sisa % 100;

$sf = intdiv($sisa, 50);

echo "Jumlah Rp. 100.000,- : ".$sa."<br />";
echo "Jumlah Rp. 50.000,- : ".$sb."<br />";
echo "Jumlah Rp. 20.000,- : ".$sc."<br />";
echo "Jumlah Rp. 5.000,- : ".$sd."<br />";
echo "Jumlah Rp. 100,- : ".$se."<br />";
echo "Jumlah Rp. 50,- : ".$sf."<br />";
?>