<?php
if (isset($_POST['submit'])) {
	$nama = $_POST['nama'];
	$kelas = $_POST['kelas'];
	$sekolah = $_POST['sekolah'];
	$kota = $_POST['kota'];
	$nama_ortu = $_POST['nama_ortu'];
	$hari = $_POST['hari'];
	$tanggal1 = $_POST['tanggal'];
	$exp_tgl = explode('-', $tanggal1);
	$tanggal = $exp_tgl[2]."/".$exp_tgl[1]."/".$exp_tgl[0];
	$alasan = $_POST['alasan'];

	require_once __DIR__ . '/inc/autoload.php';

	$pdf = new \Mpdf\Mpdf;
	$isi ="
	<html>
	<p style='text-align: right;font-family: Verdana'>".$kota.", ".$tanggal."<br><br>Kepada Yth,<br>Bapak/Ibu Guru Wali Kelas ".$kelas."<br>".$sekolah."</p><br><br><p style='text-align: left;font-family: Verdana'>Dengan Hormat,<br>Dengan ini saya selaku Orang Tua/Wali Murid dari :<br><br>Nama : <font style='text-transform: capitalize;font-family: Verdana'>".$nama."</font><br>Kelas : ".$kelas."<br><br>Memberitahukan bahwa anak saya tersebut tidak dapat mengikuti pelajaran seperti biasa pada hari ".$hari." tanggal ".$tanggal." dikarenakan <b>".$alasan."</b>.<br>Oleh karena itu, Kami memohon Bapak/Ibu Guru Wali Kelas ".$kelas." agar memberikan izin.<br><br>Demikian yang dapat saya sampaikan. Atas perhatian Bapak/Ibu saya ucapkan terimakasih.<br><br><p style='text-align: right;font-family: Verdana'>Hormat Kami,<br>Orang Tua/Wali Murid<br><br><br><br><br>( <font style='text-transform: capitalize;font-family: Verdana'>".$nama_ortu."</font> )</p></p></html>";
	$pdf->WriteHTML($isi);
	$pdf->output();
}
?>