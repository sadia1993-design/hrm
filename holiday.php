<?php 
require_once("header.php");
require_once("sidebar.php");?>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1></h1> -->
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home / Holiday</a></li>
              <!-- <li class="breadcrumb-item active"></li> -->
            </ol>
          </div>
        </div>
      </div>
    </section >
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="">
              

         <?php
                $m=$conn->query("SELECT holidayID,`title`,`start_date`,`end_date` FROM `holiday`");
                ?>
              </div>
            
              <div class="container">
                <div class="rowclearfix">
                  <div class="col-md-12 text-right">
                   
                    <a href="add_holiday.php" class="btn btn-info mt-3">ADD HOLIDAY TIME</a>
                  </div>
                  <div class="col-md-12">
                    <h2 class=" text-center mb-3">HOLIDAY INFORMATION</h2>


                    <table class="table table-striped hover" >
                      <thead>
                        <tr >
                          
                          <th>SL</th>
                          <th>TITLE</th>
                          <th>START DATE</th>
                          <th>END DATE</th>
                          <th>ACTION</th>
                         
                        </tr>
                        
                      </thead>
                      <tr >
                     
                          <?php
                           $i=0;
                   while($ii=$m->fetch_assoc()){?>
                    
                    <td><?php echo++$i?></td>
                        <td><?php echo$ii['title'];?></td>
                        <td><?php echo$ii['start_date'];?></td>
                        <td><?php echo$ii['end_date']; ?></td>

                        <td>
                          <a class=" btn btn-info btn-sm" href="holiday_updated.php?ff=<?php echo $ii['holidayID'] ?>"><i class="fas fa-edit"></i></a>
    
                           | 
                    <a href="holiday_delete.php?ff=<?php echo $ii['holidayID'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>

                          </td>
                         </tr>
                         <?php } ?> 
                        
                    </table>
                    
                  </div>
                    


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