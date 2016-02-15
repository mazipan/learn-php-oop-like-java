<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
 
    <title>Php OOP Application</title>
 
    <link rel="stylesheet" href= <?php echo $ref."/view/script/css/style.css"; ?>  />
    <link rel="stylesheet" href= <?php echo $ref."/view/bootstrap/css/bootstrap.min.css"; ?> />
    <link rel="stylesheet" href= <?php echo $ref."/view/bootstrap/css/bootstrap-theme.min.css"; ?> />
    <link rel="stylesheet" href= <?php echo $ref."/view/bootstrap-dialog/css/bootstrap-dialog.css"; ?> />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" />
 
</head>
<body>


<div id="wrapper"> 
    <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href=<?php echo $ref."/index.php"; ?>>                    
                        <span class="fa fa-desktop">                                                      
                        </span>
                        &#09  Application Menu    
                    </a>
                </li>
                <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#masterDataChild">
                        <span class="fa fa-database"></span> &#09  Master Data <span class="caret"></span></a>
                        
                        <ul id="masterDataChild" class="collapse none-list">
                            <li>
                                <a href=<?php echo $ref."/view/v_category.php"; ?>>Category</a>
                            </li>
                            <li>
                                <a href=<?php echo $ref."/view/v_product.php"; ?>>Product</a>
                            </li>
                        </ul>
                        
                </li>
                <li>
                    <a href="#">
                        <span class="fa fa-random">                                                      
                        </span>
                        &#09  Transactions
                    </a>
                </li>
            </ul>
        </div>
        
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                    
                        <div class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                        ×
                                        </button>
                                            <h4 class="modal-title">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>One fine body…</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    
                        <?php 
                        
                        if($page_title != ''){
                            echo '<div class="panel panel-primary">';
                            echo '<div class="panel-heading">';
                            echo '  <h3 class="panel-title">';
                            echo        $page_title;
                            echo '   </h3>';
                            echo '</div>';
                            echo '<div class="panel-body">';
                        }
                        
                        ?>
                                         
                    