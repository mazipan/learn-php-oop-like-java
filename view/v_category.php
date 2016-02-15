<?php
// set page headers
$page_title = "Category List";
$ref = "..";

include_once "../header.php";

?>
    <button type="submit" class="btn btn-primary" onclick="showEditCategory()" id="btnAddCategory">
    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add New Category
    </button>
    <div style="margin-top: 5px;"></div>
    
    <table class='table table-hover table-responsive table-bordered' id="table_category" >
        <th>No</th>
        <th>Category</th>
        <th>Action</th>
				<?php
                // include depedency file
                include_once '../config/database.php'; 
				include_once '../model/dao/categoryDAO.php';
                
                // get database connection
                $database = new Database();
                $db = $database->getConnection();
                
				// read categories from the database
                $dao = new CategoryDAO();
                $stmt = $dao->selectAll($db);
                $no = 1;
                foreach($stmt as $value){
                    
                    echo '<tr><td class="col-md-1">'.$no.'</td>';
                    echo '<td class="col-md-6">'.$value->getName().'</td>';
                    echo '<td class="col-md-2">';
                    echo '<button type="submit" class="btn btn-primary" onclick="getCategory('.$value->getId().')">';
                    echo '      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit';
                    echo '</button>';
                    echo '&#09';
                    echo '<button type="submit" class="btn btn-primary" onclick="deleteCategory('.$value->getId().')">';
                    echo '      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete';
                    echo '</button>';
                    echo '</td></tr>';
                    $no++;
                }               
				?>
 
    </table>

<?php    
    include_once "./v_edit_category.php";
    include_once "../footer.php";
?>