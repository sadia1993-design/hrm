  <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="background: #02318c">
   <!-- Brand Logo -->
   <a href="" class="brand-link">
     <img src="assets/images/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     <span class="brand-text font-weight-light">HR MANAGEMENT</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">

       <div class="info">

         <a href="#" class="d-block">
           Welcome, 
         </a>

       </div>
     </div>


     <!-- Sidebar Menu -->
     <nav class="mt-2">
       <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

         <li class="nav-item">
           <a href="dashboard.php" class="nav-link ">
             <i class="fas fa-tachometer-alt"> </i>
             <p> Dashboard
             </p>
           </a>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fas fa-sitemap"></i>
             <p> Department
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="department.php" class="nav-link">
                 <i class="fas fa-sitemap"></i>
                 <p>Add Department</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="dpt_list.php" class="nav-link">
                 <i class="fas fa-sitemap"></i>
                 <p>Department List</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="far fa-address-card"></i>
             <p> Recruitment
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="candidate.php" class="nav-link">
                 <i class="fas fa-user-plus"></i>
                 <p>Add Candidate</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="candidate_list.php" class="nav-link">
                 <i class="fas fa-users"></i>
                 <p>Candidate List</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fas fa-users"></i>
             <p> Employee
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">


             <li class="nav-item">
               <a href="add_emp.php" class="nav-link">
                 <i class="fas fa-user-plus"></i>
                 <p>Add Employee</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="view_emp.php" class="nav-link">
                 <i class="fas fa-users"></i>
                 <p>Employee List</p>
               </a>
             </li>

           </ul>
         </li>


         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="far fa-address-book"></i>
             <p> Attendance
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="attendance.php" class="nav-link">
                 <i class="fas fa-user-check"></i>
                 <p>Add Attendance</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="atten_history.php" class="nav-link">
                 <i class="far fa-id-badge"></i>
                 <p>Attendance List</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="daily_att_report.php" class="nav-link">
                 <i class="far fa-address-book"></i>
                 <p>Daily Attendance Report</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="daily_attenc_chart.php" class="nav-link">
                 <i class="far fa-address-book"></i>
                 <p>Daily Attendance Chart</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="Mon_atten_menu.php" class="nav-link">
                 <i class="far fa-address-book"></i>
                 <p>Monthly Attendance Report</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="monthly_atten_chart.php" class="nav-link">
                 <i class="far fa-address-book"></i>
                 <p>Monthly Attendance Chart</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="holiday.php" class="nav-link ">
             <i class="fas fa-glass-cheers"></i>
             <p>Holiday</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fas fa-door-closed"></i>
             <p> Leave
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="leave_insert.php" class="nav-link">
                 <i class="fas fa-door-closed"></i>
                 <p>Leave Type</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="add_leave_app.php" class="nav-link">
                 <i class="fas fa-door-closed"></i>
                 <p>Leave application</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="leaveApplication.php" class="nav-link">
                 <i class="fas fa-door-closed"></i>
                 <p>Approve/Reject leave</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="leave_month.php" class="nav-link">
                 <i class="fas fa-door-closed"></i>
                 <p>Show Leave Details (Monthly)</p>
               </a>
             </li>

           </ul>
         </li>

         <li class="nav-item">
           <a href="bank.php" class="nav-link ">
             <i class="fas fa-money-check-alt"></i>
             <p>Bank</p>
           </a>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fas fa-hand-holding-usd"></i>
             <p> Salary
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">

             <li class="nav-item">
               <a href="benefits.php" class="nav-link">
                 <i class="fas fa-sort-amount-up-alt"></i>
                 <p>Benefits</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="salarymonth.php" class="nav-link">
                 <i class="fas fa-file-invoice-dollar"></i>
                 <p> Generate Salary
                 </p>
               </a>
             </li>

             <li class="nav-item">
               <a href="salary.php" class="nav-link">
                 <i class="fab fa-amazon-pay"></i>
                 <p>Salary Sheet</p>
               </a>
             </li>

             <li class="nav-item">
               <a href="showsallarypayment.php" class="nav-link">
                 <i class="far fa-money-bill-alt"></i>
                 <p>Paid Salary</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="sallarypayment_chart.php" class="nav-link">
                 <i class="far fa-money-bill-alt"></i>
                 <p>Paid Salary Chart</p>
               </a>
             </li>

           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fas fa-file-invoice-dollar"></i>
             <p> Income
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">
             <li class="nav-item">
               <a href="add_incomeSource.php" class="nav-link">
                 <i class="fas fa-comment-dollar"></i>
                 <p>Add Income Source</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="add_income.php" class="nav-link">
                 <i class="fas fa-file-invoice-dollar"></i>
                 <p>Add income</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="income_chart.php" class="nav-link">
                 <i class="fas fa-file-invoice-dollar"></i>
                 <p>Income Report</p>
               </a>
             </li>
           </ul>
         </li>

         <li class="nav-item">
           <a href="#" class="nav-link ">
             <i class="fab fa-cc-amazon-pay"></i>
             <p> Expense
               <i class="fas fa-angle-left right"> </i>
             </p>
           </a>
           <ul class="nav nav-treeview">


             <li class="nav-item">
               <a href="expense_catt.php" class="nav-link">
                 <i class="fas fa-comment-dollar"></i>
                 <p> Add Expense Categories</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="expense.php" class="nav-link">
                 <i class="fab fa-cc-amazon-pay"></i>
                 <p>Add Expense</p>
               </a>
             </li>
             <li class="nav-item">
               <a href="expense_chart.php" class="nav-link">
                 <i class="fab fa-cc-amazon-pay"></i>
                 <p>Expense Report</p>
               </a>
             </li>

           </ul>
         </li>

         <li class="nav-item">
           <a href="profit_loss.php" class="nav-link ">
             <i class="fas fa-chart-bar"></i>
             <p>Profit Loss Statement</p>
           </a>
         </li>



         <li class="nav-item">
           <a href="add_notice.php" class="nav-link ">
             <i class="fas fa-thumbtack"></i>
             <p> Notice
             </p>
           </a>
         </li>



         <li class="nav-item">
           <a href="admin.php" class="nav-link ">
             <i class="fas fa-users"></i>
             <p> User Lists
             </p>
           </a>
         </li>


       </ul>
     </nav>
     <!-- /.sidebar-menu -->
   </div>
   <!-- /.sidebar -->
 </aside>