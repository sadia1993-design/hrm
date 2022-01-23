<?php
require_once("header.php");
require_once("sidebar.php");
$id = $_GET['id'];
$edu = $conn->query("SELECT * FROM candidate_education where eduID=$id");
$e = $edu->fetch_assoc();

if (isset($_POST['submit'])) {
    $candidateID = $_POST["candidate"];
    $board = $_POST["board"];
    $year = $_POST["year"];
    $title = $_POST["title"];
    $result = $_POST["result"];

    $conn->query("UPDATE `candidate_education` SET `board`='$board',  `year` = '$year', `title`='$title', `result`='$result' WHERE `candidate_education`.`eduID` = $id;");

    header("location: candidate_education.php");
}

?>

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1></h1>
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
                        <h3 class="card-title"> Edit Candidate Education</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <form action="" method="POST">

                            <div id="new">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="board">Education Board:</label>
                                            <input type="text" name="board" class="form-control" id="board" placeholder="Board" value="<?php echo $e['board'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="year">Passing Year:</label>
                                            <input type="text" name="year" class="form-control" id="year" placeholder="Year" value="<?php echo $e['year'] ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="title">Education Title:</label>
                                            <input type="text" name="title" class="form-control" id="title" placeholder="Title" value="<?php echo $e['title'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="result">Result:</label>
                                            <input type="text" name="result" class="form-control" id="result" placeholder="Result" value="<?php echo $e['result'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <hr class="bg-info" style="border-top: 2px dashed  #5cb85c;">
                            </div>



                            <button type="submit" name="submit" class="btn btn-info btn-block">Submit</button>

                        </form>



                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>



<?php require("footer.php"); ?>