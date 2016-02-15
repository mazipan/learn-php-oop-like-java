<?php
    echo '<table class="table table-hover table-responsive table-bordered" id="table_edit_category" style="display: none;">';
    echo '    <tr>';
    echo '        <td class="col-md-1">Category</td>';
    echo '        <td class="col-md-10"><input type="text" class="col-md-10" id="categoryName"/></td>';
    echo '        <td class="col-md-1">';
    echo '           <button type="submit" class="btn btn-primary" onclick="updateCategory()">';
    echo '              <span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Save';
    echo '           </button>';
    echo '        </td>';
    echo '        <td class="col-md-1">';
    echo '           <button type="submit" class="btn btn-primary" onclick="showCategoryTable()">';
    echo '              <span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Cancel';
    echo '           </button>';
    echo '        </td>';
    echo '    </tr>';
    echo '</table>';
?>