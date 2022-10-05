<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homework 3 Webpage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  
  <body>
    <table class = "table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
      </tr>
    </thead>
    <tbody>
        <?php
          $servername = "localhost";
          $username = "herdeju1_homework3";
          $password = "{k)#n$3fgsGn";
          $dbname = "herdeju1_Homework3";

          // Create connection
          $conn = new mysqli($servername, $username, $password, $dbname);

          // Check connection
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }
          echo "Connected successfully";

          $sql = "SELECT instructor_id, instructor_name FROM Instructor";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?echo $row["instructor_id"]?></td>
                <td><?echo $row["instructor_name"]?></td>
                <td>
                  <form method="post" action="result.php">
                    <input type="hidden" name="id" value="<?=$row["instructor_id"]?>" />
                    <input type="submit" value="Sections" />
                  </form>
                </td>
            </tr>
            <?php
            }
          } else {
            echo "0 results";
          }
          $conn->close();
        ?>
    </tbody>
    </table>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  </body>
    
