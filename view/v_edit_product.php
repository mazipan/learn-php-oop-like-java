<?php
// set page headers
$page_title = "Product List";
$ref = "..";

include_once "../header.php";

// get database connection
include_once '../config/database.php';
 
$database = new Database();
$db = $database->getConnection();

?>

 
    <table class='table table-hover table-responsive table-bordered'>
        <th>No</th>
        <th>Product</th>
        <th>Action</th>
				<?php
				// read the product categories from the database
				include_once '../model/product.php';
                $product = new Product($db);
                $stmt = $product->selectAll(); 
                
                $no = 1;
                foreach($stmt as $value){
                    echo '<tr><td class="col-md-1">'.$no.'</td>';
                    echo '<td class="col-md-6">'.$value->getName().'</td>';
                    echo '<td class="col-md-2">';
                    echo '<button type="button" class="btn btn-primary">';
                    echo '      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit';
                    echo '</button>';
                    echo '&#09';
                    echo '<button type="button" class="btn btn-primary">';
                    echo '      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Delete';
                    echo '</button>';
                    echo '</td></tr>';
                    $no++;
                }
                                
				?>
 
    </table>

<?php
include_once "../footer.php";
?>