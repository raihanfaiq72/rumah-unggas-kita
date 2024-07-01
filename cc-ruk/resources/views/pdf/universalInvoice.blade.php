<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Invoice - Rumah Unggaskita</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .invoice-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .invoice-header h1 {
            color: #333;
        }

        .invoice-info {
            margin-bottom: 20px;
        }

        .invoice-info p {
            margin: 5px 0;
        }

        .invoice-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .invoice-table th,
        .invoice-table td {
            border: 1px solid #ccc;
            padding: 10px;
        }

        .invoice-table th {
            background-color: #f0f0f0;
        }

        .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .invoice-total p {
            margin: 5px 0;
        }

    </style>
</head>

<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Invoice - Rumah Unggaskita</h1>
            <p>-Terimakasih atas kepercayaannya kepada kami-</p>
        </div>
        <div class="invoice-info">
            <h2>
                @if($data->status == 2)
                # Menunggu konfirmasi dari penjual # 
                @elseif($data->status == 3)
                # Pesanan Sedang diantar oleh ekspedisi #
                @else
                # Pesanan Selesai #
                @endif
            </h2>
            <p><strong>No. Transaksi:</strong> {{$data->no_transaksi}}</p>
            <p><strong>Tanggal:</strong> {{$data->created_at}}</p>
            <p><strong>Nama Buyer:</strong> {{$data->user->nama_lengkap}}</p>
            <p><strong>Note:</strong> {{$data->note}}</p>
        </div>
        <table class="invoice-table">
            <thead>
                <tr>
                    <th>Produk</th>
                    <th>Harga Satuan</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data->item->nama}}</td>
                    <td>Rp {{$data->item->harga}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>Rp {{$data->jumlah_bayar}}</td>
                </tr>
                <tr>
                    <td>Ongkir</td>
                    <td></td>
                    <td></td>
                    <td>Rp 10000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Bayar</th>
                    @php
                    $total = $data['jumlah_bayar']+10000;
                    @endphp
                    <td>Rp {{$total}}</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-total">
            <p><strong>Total yang harus dibayar:</strong> Rp {{$total}}</p>
        </div>
    </div>
</body>

</html>
