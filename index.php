<?php
    session_start();

    if (!isset($_SESSION["sudahLogin"])) {
        header("Location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Pembayaran</title>
</head>
    <div class="main-container">
        <a href="logout.php">Logout</a>
        <section class="panel-form">
            <h1>Hitung Pembayaran</h1>
            <form action="index.php" method="POST">
                <div class="form-group">
                    <label for="total_belanja">Total Belanja:</label>
                    <input type="text" name="total_belanja" id="total_belanja">
                </div> <!-- end form-group -->

                <input type="submit" value="hitung">
            </form>
        </section> <!--end panel-form-->
        <?php

            function hitung_discount($total_belanja)
            {
                $discount = 0;
                if ($total_belanja >= 100000) {
                    $discount = $total_belanja * 0.1;
                } else if ($total_belanja >= 50000) {
                    $discount = $total_belanja * 0.05;
                }

                return $discount;
            }

            if($_POST) {
                $total_belanja = $_POST['total_belanja'];
                $nilai_discount = hitung_discount($total_belanja);

                $bayar = $total_belanja - $nilai_discount;

                echo "<section class='panel-info'>";
                    echo "<div class='info-belanja'>";
                        echo "<p>Total Belanja</p>";
                        echo "<p>" . $total_belanja ."</p>";
                    echo "</div>";

                    echo "<div class='info-discount'>";
                        echo "<p>Discount</p>";
                        echo "<p>". $nilai_discount ."</p>";
                    echo "</div>";

                    echo "<div class='info-bayar'>";
                        echo "<p>Total Bayar</p>";
                        echo "<p>". $bayar ."</p>";
                    echo "</div>";
                echo "</section>";
            }
        ?>

    </div> <!-- end main container-->
</body>
</html>