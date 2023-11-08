<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documents</title>
    <style>
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

        if (is_writable($csvfile)) {
            // Izin penulisan ada, lanjutkan menulis ke file
            // ...
        } else {
            // Izin penulisan tidak ada, tampilkan pesan kesalahan
            echo 'Tidak bisa menulis ke file.';
        }

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
</body>
</html>