<?php
$employee = Employee::currentLoggedInEmployee();
if ($employee->role != 'worker') {
    Router::redirect('EmployeeDashboard');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Room Service</title>
    <script>
        function showModal(id) {
            document.getElementById("room_id").value = id;
            document.getElementById("room_number").innerHTML = id;
        }
    </script>
</head>

<body>
    <h1>Room Service</h1> <br>

    <div>

    <table>
    <?php $rooms = $this->roomDetails; 
    foreach ($rooms as $room) {
        $room = (array) $room;?>
        <tr>
            <td>
            <?php echo $room['id'];?>
            </td>
            <td>
            <?php echo $room['type'];?>
            </td>
            <td>
            <?php echo $room['capacity'];?>
            </td>
            <td>
            <?php echo $room['status'];?>
            </td>
            <td>
            <?php echo $room['last_service'];?>
            </td>
            <td>
            <button type="button" class="btn btn-primary" onClick="showModal(<?php echo $room['id'] ; ?>)" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Serviced
            </button>
            </td>
        </tr>
    
    <?php } ?>
    </table>

    <form action="<?=SROOT?>RoomStatus/service" method="post">
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room Service</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <div class="fs-1">Room <span id="room_number"></span></div>
            </div>
            <div class="modal-footer justify-content-center">
                <input type="hidden" id="room_id" name="id" value="">
                <input type="hidden" name="last_service" value="">
                <input class="btn btn-success fs-4" type="submit" value="Confirm">
            </div>
        </div>
    </div>
    </form>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>
