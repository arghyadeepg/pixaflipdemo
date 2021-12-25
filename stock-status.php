<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css">

<?php
include 'core/header.php';
include 'core/dbconf.php';
?>
<center>
    <table class="table table-bordered table-hover" style="margin-top:50px; width:80%; border:2px solid;">
        <thead style="text-align:center;">
            <th>Blood Group</th>
            <th>No.s Available</th>
        </thead>
        <tbody style="text-align:center;">
    <?php

    $que = "SELECT bloodgroup,count(*) AS stock FROM users GROUP BY bloodgroup";
    $slq = mysqli_query($conn,$que);
    $resu = mysqli_fetch_assoc($slq);
    foreach($slq as $rows){
        ?>

        <tr>
            <td><?php echo $rows['bloodgroup'];?></td>
            <td><?php echo $rows['stock']; ?></td>
        </tr>

    <?php

    }

    ?>
    </tbody>
    </table>
<?php

    $que = "SELECT bloodgroup,count(*) AS stock FROM users GROUP BY bloodgroup";
    $slq = mysqli_query($conn,$que);
    $resu = mysqli_fetch_assoc($slq);
    foreach($slq as $rows){
        
        if ($rows['stock'] <= 1) {
            $msg = "Inventory for ".$rows['bloodgroup']." has fallen below 2 Packets, ".$rows['stock']." remaining!";
            mail($recipient, "Inventory check below threshold", $msg);
              }
            else {
              echo "<h2>Inventory is perfect for ".$rows['bloodgroup']."</h2>";
            }
        }?>

</center>