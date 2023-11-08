<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fetch Data from URL</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1b22f1;
            margin: 0;
            padding: 0;
        }
        
        #container {
            text-align: center;
            background-color: #48c8f3;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
        }
        
        /* Judul */
        h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        /* Input dan Tombol */
        #url {
            width: 100%;
            padding: 10px;
            border: 1px solid #296fa8;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        
        #fetchButton {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        #fetchButton:hover {
            background-color: #0056b3;
        }
        
        /* Tabel */
        #table-container {
            display: none;
            margin-top: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #67bbf7;
        }
        
        table, th, td {
            border: 1px solid #4107ff;
            padding: 10px;
        }
        
        th {
            background-color: #007BFF;
            color: #fff;
            font-weight: bold;
        }
        
        /* Responsif */
        @media (max-width: 768px) {
            #url {
                width: 100%;
            }
        }

        #Id {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #F_Name {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #L_Name {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Email {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Email2 {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #Profesi {
            background-color: #ffffff;
            color: #000000;
            border: 1px solid #296fa8;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

        #simpan-button {
            background-color: #007BFF;
            color: #fff;
            border: 1px solid #fff;
            padding: 10px 20px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s ease;
        }

    </style>
</head>
<body>
    <div id="container">
        <h1>UTS ALGORITMA PEMROGRAMAN 2</h1>
        <h2>INTAN NURUL LAILY - 164221060</h2>
        <h3>Fetch Data From URL</h3>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="Id">Id:</label>
            <input type="text" name="Id" id="Id" required>
            <br>
            <label for="F_Name">First Name:</label>
            <input type="text" name="F_Name" id="F_Name" required>
            <br>
            <label for="L_Name">Last Name:</label>
            <input type="text" name="L_Name" id="L_Name" required>
            <br>
            <label for="Email">Email:</label>
            <input type="email" name="Email" id="Email" required>
            <br>
            <label for="Email2">Email2:</label>
            <input type="email" name="Email2" id="Email2" required>
            <br>
            <label for="Profesi">Profesi:</label>
            <input type="text" name="Profesi" id="Profesi" required>
            <br>
            <button type="button" id="simpan-button">Submit</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $_POST["Id"];
            $F_Name = $_POST["F_Name"];
            $L_Name = $_POST["L_Name"];
            $Email = $_POST["Email"];
            $Email2 = $_POST["Email2"];
            $Profesi = $_POST["Profesi"];

            if ($Email != Email2) {
                echo "Email tidak sama, silahkan coba lagi!";
            } else {
                $data = '$Id, $F_Name, $L_Name, $Email, $Email2, $Profesi\n';
                file_put_contents('C:\Intan\TSD UNAIR\Semester 3\Alpro 2\week 9\datapribadi.csv', $data, FILE_APPEND);
                echo 'Data telah ditambahkan!';
            }
        }
        ?>

        <?php
        echo "<table border= '1'>
        <tr>
        <th>Id</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Profesi</th>
        </tr>";

        $csvfile = 'C:\Intan\TSD UNAIR\Semester 3\Alpro 2\week 9\datapribadi.csv';

        if (file_exists($csvfile)) {
            $csv = array_map('str_getcsv', file($csvfile));

            foreach ($csv as $row) {
                echo "<tr>";
                echo "<td>" . $row[0] . "</td>";
                echo "<td>" . $row[1] . "</td>";
                echo "<td>" . $row[2] . "</td>";
                echo "<td>" . $row[3] . "</td>";
                echo "<td>" . $row[4] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "File CSV Tidak Ada!";
        }

        echo "</table>";
        ?>

        <input type="text" id="url" placeholder="Masukkan URL" value="https://cors-anywhere.herokuapp.com/http://intanurul04.alwaysdata.net/index.php">
        <button id="fetchButton" onclick="fetchData()">Ambil Data</button>
        <div id="table-container">
            <table id="data-table"></table>
        </div>
    </div>

    <script>
        // Kode JavaScript yang Anda sediakan
        function fetchData() {
          const urlInput = document.getElementById('url').value;
          const tableContainer = document.getElementById('table-container');
          const dataTable = document.getElementById('data-table');

          // Buat objek AJAX
          const xhr = new XMLHttpRequest();
          
          // Atur fungsi penanganan ketika permintaan AJAX selesai
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              // Konversi JSON yang diterima ke objek JavaScript
              const data = JSON.parse(xhr.responseText);

              // Hapus semua baris tabel sebelum menambahkan yang baru
              dataTable.innerHTML = '';

              // Buat header tabel
              const headerRow = document.createElement('tr');
              for (const key in data[0]) {
                if (data[0].hasOwnProperty(key)) {
                  const headerCell = document.createElement('th');
                  headerCell.textContent = key;
                  headerRow.appendChild(headerCell);
                }
              }
              dataTable.appendChild(headerRow);

              // Tambahkan data ke tabel
              data.forEach(function(item) {
                const dataRow = document.createElement('tr');
                for (const key in item) {
                  if (item.hasOwnProperty(key)) {
                    const dataCell = document.createElement('td');
                    dataCell.textContent = item[key];
                    dataRow.appendChild(dataCell);
                  }
                }
                dataTable.appendChild(dataRow);
              });

              // Tampilkan tabel
              tableContainer.style.display = 'block';
            }
          };

          // Kirim permintaan GET ke URL yang diinputkan
          xhr.open('GET', urlInput, true);
          xhr.send();
        }

        
    </script>
</body>
</html>