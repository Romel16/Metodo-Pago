 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="index.php" class="brand-link">
         <img src=""  class="brand-image img-circle elevation-3" style="opacity: .8">
         <span class="brand-text font-weight-light"> SIGT</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">

         <!-- Sidebar Menu -->
         <nav class="mt-2">

             <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">


                 <li class="nav-item">
                     <a href="#" class="nav-link">
                         <i class="nav-icon fas fa-tachometer-alt"></i>
                         <p>
                             Pagos
                             <i class="right fas fa-angle-left"></i>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">                      
                         <li class="nav-item">
                             <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vistas/pagos.php','content-wrapper')">
                                 <i class="far fa-circle nav-icon"></i>
                                 <p>Verificar Pagos</p>
                             </a>
                         </li>                         
                     </ul>
                    
                 
                <li class="nav-item">
                     <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vistas/empresas.php','content-wrapper')">
                         <i class="nav-icon fas fa-users text-ligth"></i>
                         <p>
                             Empresas
                         </p>
                     </a>
                 </li>
                 
                 
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>

 <script>
     $(".nav-link").on('click', function() {
         $(".nav-link").removeClass('active');
         $(this).addClass('active');
     })
 </script>