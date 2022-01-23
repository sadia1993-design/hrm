<?php
require_once("header.php");
require_once("sidebar.php");

$edu = $conn->query("SELECT e.eduID, candidate.name, e.title,e.year,e.board,e.result FROM candidate_education as e JOIN candidate ON candidate.id=e.candidateID");
$cand = $conn->query("select candidate.id, candidate.name from candidate");

if (isset($_GET['delId'])) {
  $id = $_GET['delId'];

  $conn->query("DELETE FROM `candidate_education` WHERE eduID=$id");
  header("location: candidate_education.php");
}

if (isset($_POST['submit'])) {
  $candidateID = $_POST["candidate"];
  $board = $_POST["board"];
  $year = $_POST["year"];
  $title = $_POST["title"];
  $result = $_POST["result"];

  foreach ($title as $key => $value) {
    $conn->query("INSERT INTO `candidate_education` ( `title`, `year`, `board`, `result`, `candidateID`) VALUES ('$title[$key]', '$year[$key]', '$board[$key]', '$result[$key]', '$candidateID');");
  }
  ?>
    <script>
        window.location.assign('jobEx.php');
    </script>
<?php
}

?>

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Add Candidate</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active"></li>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Candidate Education</h3>
            <button class="btn btn-xs btn-info float-right" onclick="add_new()">Add Education</button>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="" method="POST">

              <div class="form-group">
                <label for="candidate">Select Candidate:</label>
                <select class="form-control" id="candidate" name="candidate">
                  <option value="">
                    <- candidate list ->
                  </option>
                  <?php while ($c = $cand->fetch_assoc()) { ?>
                    <option value="<?php echo $c['id'] ?>"><?php echo $c['id'] ?>: <?php echo $c['name'] ?></option>
                  <?php } ?>

                </select>
              </div>

              <div id="new">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="board">Education Board:</label>
                      <input type="text" name="board[]" class="form-control" id="board" placeholder="Board">
                    </div>
                    <div class="form-group">
                      <label for="year">Passing Year:</label>
                      <input type="text" name="year[]" class="form-control" id="year" placeholder="Year">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="title">Education Title:</label>
                      <input type="text" name="title[]" class="form-control" id="title" placeholder="Title">
                    </div>
                    <div class="form-group">
                      <label for="result">Result:</label>
                      <input type="text" name="result[]" class="form-control" id="result" placeholder="Result">
                    </div>
                  </div>
                </div>
                <hr class="bg-info" style="border-top: 2px dashed  #5cb85c;">
              </div>



              <button type="submit" name="submit" class="btn btn-info btn-block">Next</button>

            </form>

            <table class="table table-bordered mt-5">
              <thead>
                <tr class="bg-info">
                  <th scope="col">Name</th>
                  <th scope="col">Title</th>
                  <th scope="col">Board</th>
                  <th scope="col">Year</th>
                  <th scope="col">Result</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($e = $edu->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $e['name'] ?></td>
                    <td><?php echo $e['title'] ?></td>
                    <td><?php echo $e['board'] ?></td>
                    <td><?php echo $e['year'] ?></td>
                    <td><?php echo $e['result'] ?></td>
                    <td><a href="edit_cnd_edu.php?id=<?php echo $e['eduID'] ?>" class="btn btn-info btn-sm">Edit</a> | <a href="candidate_education.php?delId=<?php echo $e['eduID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>



          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  const pree = document.getElementById('new').innerHTML;

  function add_new() {
    // var ab=document.getElementById('tbs').innerHTML;
    // var done=ab;
    // done+=pree;
    // document.getElementById('tbs').innerHTML=done
    $('#new').append(pree);
  }
</script>

<?php require("footer.php"); ?>