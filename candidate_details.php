<?php
require_once("header.php");
require_once("sidebar.php");
$id = $_GET['id'];
$candidate = $conn->query("SELECT * FROM `candidate` where candidate.id=$id");
$edu = $conn->query("SELECT * FROM `candidate_education` where candidate_education.candidateID=$id");
$job = $conn->query("SELECT * FROM `job_experience` where job_experience.candidateID=$id");

$can = $candidate->fetch_assoc();
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a class="btn btn-info" href="candidate_list.php">Candidate list</a></li>
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
                        <h3 class="card-title">Candidate Details</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container cnd_dtl">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="assets/images/<?php echo $can['photo'] ?>" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-8">
                                    <ul>
                                        <li><strong>ID:</strong> <?php echo $can['id'] ?> </li>
                                        <li><strong>Name:</strong> <?php echo $can['name'] ?> </li>
                                        <li><strong>E-mail:</strong> <?php echo $can['email'] ?></li>
                                        <li><strong>Phone:</strong> <?php echo $can['phone'] ?></li>
                                        <li><strong>Death of Birth:</strong> <?php echo $can['dob'] ?></li>
                                        <li><strong>Gender:</strong> <?php echo $can['gender'] ?></li>
                                        <li><strong>Address:</strong> <?php echo $can['address'] ?></li>
                                        <li><strong>Shortlisted:</strong> <?php echo $can['shortlisted'] ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h2 class="text-center mt-5">Education Details </h2>
                                    <table class="table table-bordered mt-2">
                                        <thead>
                                            <tr class="bg-info">
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
                                                    <td><?php echo $e['title'] ?></td>
                                                    <td><?php echo $e['board'] ?></td>
                                                    <td><?php echo $e['year'] ?></td>
                                                    <td><?php echo $e['result'] ?></td>
                                                    <td><a href="edit_cnd_edu.php?id=<?php echo $e['eduID'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> | <a href="candidate_education.php?delId=<?php echo $e['eduID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a></td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                <h2 class="text-center mt-5">Job Details </h2>
                                    <table class="table table-bordered mt-2">
                                        <thead>
                                            <tr class="bg-info">
                                                <th scope="col">Designation</th>
                                                <th scope="col">Organization</th>
                                                <th scope="col">Joining Date</th>
                                                <th scope="col">Resign Date</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($j=$job->fetch_assoc()) { ?>

                                                <tr>
                                                    <td><?php echo $j['designation']; ?></td>
                                                    <td><?php echo $j['organization']; ?></td>
                                                    <td><?php echo $j['joining_date']; ?></td>
                                                    <td><?php echo $j['resign_date']; ?></td>
                                                    <td>
                                                        <a href="jobExEdit.php?id=<?php echo $j['candidateID']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="jobEx.php?id=<?php echo $j['candidateID']; ?>" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>

                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>