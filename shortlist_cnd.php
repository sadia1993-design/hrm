<?php
require_once("header.php");
require_once("sidebar.php");
$can = $conn->query("select * from candidate where `shortlisted` = 'yes' and candidate.status='candidate'");
if (isset($_GET['srtId'])) {
    $id=$_GET['srtId'];
    $type=$_GET['type'];
    if ($type=='yes') {
        $conn->query("UPDATE `candidate` SET `shortlisted` = 'no' WHERE `candidate`.`id` = $id;");
    header("location:shortlist_cnd.php");
    }else{
        $conn->query("UPDATE `candidate` SET `shortlisted` = 'yes' WHERE `candidate`.`id` = $id;");
    header("location:shortlist_cnd.php");
    }
    
}
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Shortlisted Candidate</a></li>
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
                        <h3 class="card-title">Shortlisted Candidate</h3>
                        <a href="candidate_list.php" class="float-right btn btn-info">All Candidate</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>photo</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Gender</th>
                                    <th>Shortlisted</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($c = $can->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $c['id'] ?></td>
                                        <td><?php echo $c['name'] ?></td>
                                        <td><img width="50" height="50" src="./assets/images/<?php echo $c['photo']; ?>" /></td>
                                        <td><?php echo $c['email'] ?></td>
                                        <td><?php echo $c['phone'] ?></td>
                                        <td><?php echo $c['gender'] ?></td>
                                        <td><?php echo $c['shortlisted'] ?></td>
                                        <td>
                                            <a href="cnd_to_emp.php?id=<?php echo $c['id'] ?>" class="btn btn-sm btn-success" title="Add to Employee"><i class="fas fa-user-plus"></i></a>

                                            
                                            <a href="candidate_details.php?id=<?php echo $c['id'] ?>" class="btn btn-sm btn-info" title="VIew Details"><i class="fas fa-address-card"></i></a>
                                            <a href="" class="btn btn-sm btn-success" title="Edit"><i class="fas fa-edit"></i></a>
                                            <a href="candidate_list.php?delId=<?php echo $c['id'] ?>" onclick="return confirm('Are you sure?')" title="delete" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<?php require("footer.php"); ?>