<html>

<head>
    <title>Cetak Data Penjualan</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/datetime/1.1.0/css/dataTables.dateTime.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/datetime/1.1.0/js/dataTables.dateTime.min.js"></script>
</head>

<body>
    <table border="0" cellspacing="5" cellpadding="5">
        <tbody>
            <tr>
                <td>Minimum date:</td>
                <td><input type="text" id="min" name="min"></td>
            </tr>
            <tr>
                <td>Maximum date:</td>
                <td><input type="text" id="max" name="max"></td>
            </tr>
        </tbody>
    </table>
    <div id="printableTable">
        <table class="table table-bordered" id="example" width="100%" cellspacing="0">

            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Transaksi</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1;
                foreach ($dt as $data) {
                    foreach ($dt2 as $data2) {
                        if ($data['id_barang'] == $data2['id_barang']) { ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $data['id_transaksi']; ?></td>
                                <td><?php echo $data2['nama_barang']; ?></td>
                                <td><?php echo $data['jumlah']; ?></td>
                                <td><?php echo "Rp " . number_format($data['total'], 2, ',', '.'); ?></td>
                                <td><?php echo date_format(new DateTime($data['tanggal']), "Y/m/d"); ?></td>
                            </tr>
                <?php }
                    }
                } ?>
            </tbody>
    </div>
    </table>

    <button onclick="printDiv()">Print</button>
    <iframe name="print_frame" width="0" height="0" frameborder="0" src="about:blank"></iframe>
    <script>
        function printDiv() {
            window.frames["print_frame"].document.body.innerHTML = document.getElementById("printableTable").innerHTML;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }

        var minDate, maxDate;

        // Custom filtering function which will search data in column four between two values
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = minDate.val();
                var max = maxDate.val();
                var date = new Date(data[5]);

                if (
                    (min === null && max === null) ||
                    (min === null && date <= max) ||
                    (min <= date && max === null) ||
                    (min <= date && date <= max)
                ) {
                    return true;
                }
                return false;
            }
        );

        $(document).ready(function() {
            // Create date inputs
            minDate = new DateTime($('#min'), {
                format: 'MMMM Do YYYY'
            });
            maxDate = new DateTime($('#max'), {
                format: 'MMMM Do YYYY'
            });

            // DataTables initialisation
            var table = $('#example').DataTable();

            // Refilter the table
            $('#min, #max').on('change', function() {
                table.draw();
            });
        });
    </script>

</body>

</html>