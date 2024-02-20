<?php
include '../lib/db.php';

if(isset($_GET['edit'])){
    $id = $_GET['edit'];

    $query = mysqli_query($connection,"SELECT * FROM events WHERE id_event='$id'");
    $data = mysqli_fetch_array($query);

    if(isset($_POST['update_event'])){
        $event_name = mysqli_real_escape_string($connection,$_POST['event_name']);
        $event_description = mysqli_real_escape_string($connection,$_POST['event_description']);
        $event_date = mysqli_real_escape_string($connection,$_POST['event_date']);

        $query = mysqli_query($connection,"UPDATE events SET event_name='$event_name',
                                                            event_description='$event_description',
                                                            event_date='$event_date'
                                                            WHERE id_event='$id' ");
        
        if($query){
            header('location: dashboard.php');
        }
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>index</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
<!-- CONTENT HERE -->
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-12">
            <h1 class="text-center">Dashboard Event</h1>
        </div>
    </div>

        <div class="row mt-3">
            <div class="col-md-12">
                <div class="card border-0 shadow-lg">
                    <div class="card-body">
                        <a class="btn btn-primary" href="dashboard.php">Kembali ke Dashboard</a>
                        <a href="../index.php" class="btn btn-dark">Lihat Website</a>
                        <h1 class="text-center">form edit event</h1>
                            <form method="post">
                                <div class="form-group">
                                    <label>Nama Event</label>
                                    <input type="text" class="form-control" name="event_name" value="<?php echo $data['event_name'] ?>">
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi Event</label>
                                    <textarea name="event_description" class="form-control" id="" cols="30" rows="10"><?php echo $data['event_description'] ?></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Event</label>
                                    <input type="date" class="form-control" name="event_date" value="<?php echo $data['event_date'] ?>">
                            </div>
                            <button type="submit" class="btn btn-warning mt-2" name="update_event">Update</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>


<!-- END CONTENT HERE -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>