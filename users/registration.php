<?php
include '../admin/inc/connection.php';

$queryGelombang = mysqli_query($connection, "SELECT * FROM gelombang WHERE aktif = 1");
$queryJurusan = mysqli_query($connection, "SELECT * FROM jurusan");
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <?php include 'inc/head.php' ?>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background-color: #f1f1f1;
        }

        #regForm {
            background-color: #ffffff;
            margin: 100px auto;
            font-family: Raleway;
            padding: 40px;
            width: 70%;
            min-width: 300px;
        }

        h1 {
            text-align: center;
        }

        input {
            padding: 10px;
            width: 100%;
            font-size: 17px;
            font-family: Raleway;
            border: 1px solid #aaaaaa;
        }

        /* Mark input boxes that gets an error on validation: */
        input.invalid {
            background-color: #ffdddd;
        }

        /* Hide all steps by default: */
        .tab {
            display: none;
        }

        button {
            background-color: #04AA6D;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            font-size: 17px;
            font-family: Raleway;
            cursor: pointer;
        }

        button:hover {
            opacity: 0.8;
        }

        #prevBtn {
            background-color: #bbbbbb;
        }

        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
        }
    </style>
</head>

<body>
    <?php include 'inc/header.php' ?>

    <form id="regForm" enctype="multipart/form-data" action="controller/daftar.php" method="post">
        <h1>Register:</h1>
        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <div class="mb-3">
                <label for="">Pilih Gelombang</label><br>
                <select class="form-control" name="aktif" id="" required>
                    <option value="">Gelombang</option>
                    <?php while ($rowGelombang = mysqli_fetch_assoc($queryGelombang)) { ?>
                        <option value="<?php echo $rowGelombang['id'] ?>"><?php echo $rowGelombang['nama_gelombang'] ?></option>
                    <?php } ?>
                </select>
            </div>
            <label for="">Nama Lengkap :</label>
            <p><input type="text" placeholder="Enter your fullname" oninput="this.className = ''" name="nama_lengkap"></p>
            <label for="">NIK :</label>
            <p><input type="number" placeholder="Enter your NIK" oninput="this.className = ''" name="nik"></p>
        </div>
        <div class="tab">
            <label for="">Tempat Lahir:</label>
            <p><input placeholder="Masukkan Tempat Lahir" type="text" oninput="this.className = ''" name="tempat_lahir"></p>
            <label for="">Tanggal Lahir :</label>
            <p><input type="date" placeholder="Masukkan Tanggal Lahir" oninput="this.className = ''" name="tanggal_lahir"></p>
            <label for="">Pendidikan Terakhir :</label>
            <p><input placeholder="Masukkan Pendidikan Terakhir Anda" type="text" oninput="this.className = ''" name="pendidikan_terakhir"></p>
            <label for="">Nama Sekolah :</label>
            <p><input placeholder="Masukkan Nama Sekolah/Institusi Terkahir Anda Menempuh Pendidikan" oninput="this.className = ''" name="nama_sekolah"></p>
            <label for="">Kejuruan Sekolah :</label>
            <p><input placeholder="Masukkan Kejuruan Sekolah/Institusi Terkahir Anda Menempuh Pendidikan" oninput="this.className = ''" name="kejuruan"></p>
        </div>
        <div class="tab">
            <label for="">Nomor Hp :</label>
            <p><input placeholder="Masukkan Nomor Hp Anda" oninput="this.className = ''" name="nomor_hp" type="number"></p>
            <label for="">Email :</label>
            <p><input placeholder="Masukkan Email Anda" oninput="this.className = ''" type="email" name="email"></p>
            <label for="">Kartu Keluarga :</label>
            <p><input placeholder="Masukkan Nomor Kartu Keluarga Anda" oninput="this.className = ''" type="number" name="kartu_keluarga"></p>
            <label class="form-label" for="">Jenis Kelamin :</label> <br>
            <input type="radio" oninput="this.className = ''" value="laki-laki" name="jenis_kelamin">laki-laki <br>
            <input type="radio" oninput="this.className = ''" value="perempuan" name="jenis_kelamin">Perempuan <br>
            <!-- <select name="jenis_kelamin" id="">
                <option value="0">Laki-Laki</option>
                <option value="1">Perempuan</option>
            </select> -->
        </div>
        <div class="tab">
            <label for="">Aktivitas Saat Ini :</label>
            <select name="aktivitas_saat_ini" id="" oninput="this.className = ''">
                <option value="0">-- Mengikuti Pelatihan --</option>
                <option value="1">-- Mencari Pekerjaan --</option>
                <option value="2">-- Kerja Malam / Freelance --</option>
            </select>
            <label for="">Jurusan Yang Ingin Diikuti:</label>
            <select name="jurusan" id="" oninput="this.className = ''">
                <option value="">Pilih Jurusan Yang diinginkan</option>
                <?php while ($rowJurusan = mysqli_fetch_assoc($queryJurusan)) { ?>
                    <option value="<?php echo $rowJurusan['id'] ?>"><?php echo $rowJurusan['nama_jurusan'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="tab">
        </div>
        <!-- <div class="tab">
        </div> -->
        <div style="overflow:auto;">
            <div style="float:right;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
        </div>
        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <!-- <span class="step"></span> -->
        </div>
    </form>

    <?php include 'inc/footer.php'; ?>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                document.getElementById("nextBtn").type = "submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "") {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

</body>

</html>