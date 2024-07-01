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
        .invoice-table th, .invoice-table td {
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
            <p>This invoice is generated for your order.</p>
        </div>
        <div class="invoice-info">
            <p><strong>No. Transaksi:</strong> INV-123456</p>
            <p><strong>Tanggal:</strong> 1 Juli 2024</p>
            <p><strong>Nama Perusahaan:</strong> Rumah Unggaskita</p>
            <p><strong>Alamat:</strong> Jl. Contoh No. 123, Kota Contoh</p>
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
                    <td>Ayam Potong Super</td>
                    <td>Rp 25,000</td>
                    <td>2</td>
                    <td>Rp 50,000</td>
                </tr>
                <tr>
                    <td>Bebek Utuh</td>
                    <td>Rp 50,000</td>
                    <td>1</td>
                    <td>Rp 50,000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total Bayar</th>
                    <td>Rp 100,000</td>
                </tr>
            </tfoot>
        </table>
        <div class="invoice-total">
            <p><strong>Total yang harus dibayar:</strong> Rp 100,000</p>
        </div>
    </div>
</body>
</html>
