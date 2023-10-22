<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Nota Pemesanan & Pengembalian Kendaraan</title>
</head>

<body>
    <div class="container" style="border: 1px solid #000000; padding: 24px;">
        <h1 style="text-align: center; margin-bottom: 42px;">{{ $title }}</h1>

        <h3 style="margin-bottom: 12px;">Data Pelanggan</h3>
        <table style="border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Nama Pelanggan</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->pelanggan->nama }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Nomor KTP/ KK</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->pelanggan->nomor_ktp }}/
                        {{ $pemesanan->pemesanan->pelanggan->nomor_kk }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Alamat</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->pelanggan->alamat }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Nomor Telepon</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->pelanggan->nomor_telepon }}
                    </td>
                </tr>
            </tbody>
        </table>

        <h3 style="margin-bottom: 12px; margin-top: 24px;">Data Pemesanan</h3>
        <table style="border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Nomor Plat Kendaraan</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->kendaraan->nomor_plat }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Jenis Kendaraan</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->kendaraan->jenis_kendaraan->nama }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Lama Sewa</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan->waktu_sewa }}
                        hari
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Tanggal Diambil</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->tanggal_mulai }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Tanggal Kembali</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pemesanan->tanggal_akhir_awal ? $pemesanan->pemesanan->tanggal_akhir_awal : $pemesanan->pemesanan->tanggal_akhir }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Driver/ Non Driver</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan->sopir ? $pemesanan->pembayaran_pemesanan->sopir->nama : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Biaya Sewa</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        Rp. {{ $pemesanan->pembayaran_pemesanan->total_tarif_sewa }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Total Bayar Saat Ini</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan->total_bayar ? 'Rp. ' . $pemesanan->pembayaran_pemesanan->total_bayar : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Keterangan Lainnya</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pemesanan->pembayaran_pemesanan->keterangan ? $pemesanan->pembayaran_pemesanan->keterangan : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>

        <h3 style="margin-bottom: 12px; margin-top: 24px;">Data Pengembalian</h3>
        <table style="border-collapse:collapse;">
            <tbody>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Tanggal Dikembalikan</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->tanggal_kembali }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Ketepatan Waktu</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->ketepatan_waktu ? $pengembalian->ketepatan_waktu : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Terlambat</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->terlambat ? $pengembalian->terlambat . ' jam' : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Total Bayar Menyusul</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->total_bayar ? 'Rp. ' . $pengembalian->total_bayar : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Biaya Tambahan</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->biaya_tambahan ? 'Rp. ' . $pengembalian->biaya_tambahan : '-' }}
                    </td>
                </tr>
                <tr>
                    <td style="border:1px solid black; padding: 5px; width: 200px;">Keterangan Lainnya</td>
                    <td style="border:1px solid black; padding: 5px;">:</td>
                    <td style="border:1px solid black; padding: 5px; width: 410px; text-align: end;">
                        {{ $pengembalian->keterangan ? $pengembalian->keterangan : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
