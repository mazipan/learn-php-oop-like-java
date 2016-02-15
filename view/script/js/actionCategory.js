var idForEdit = 0;
var nameForEdit = '';
var stateEditCategory = false;

function showEditCategory(){            
    $('#table_category').fadeOut();
    $('#btnAddCategory').fadeOut();
    $('#table_edit_category').fadeIn();
}
function getCategory(id) {            
    $.ajax({
    type: "POST",
        url: "./a_category.php",
        data: { getCategoryById: id},
        success: function(data){
            var jsonObj = JSON.parse(data);
            idForEdit = jsonObj.id;
            nameForEdit = jsonObj.name;
            document.getElementById('categoryName').value = nameForEdit;
        }
    })
    .done(function( msg ) {
        showEditCategory();
        stateEditCategory = true;
    });
}

function showCategoryTable(){            
    document.getElementById('categoryName').value = '';
    nameForEdit = '';
    idForEdit = '';
    stateEditCategory = false;
    $('#table_category').fadeIn();
    $('#btnAddCategory').fadeIn();
    $('#table_edit_category').fadeOut();
}

function showWarningDialog(msg){            
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_WARNING,
        title: 'Warning Message',
        message: msg,
        buttons: [{
                label: 'Ok',
                cssClass: 'btn-primary',
                action: function(dialogItself){
                    dialogItself.close();
                }
        }]
    });              
}

function showPrimaryDialog(msg){            
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_PRIMARY,
        title: 'Information Message',
        message: msg,
        buttons: [{
                label: 'Ok',
                cssClass: 'btn-primary',
                action: function(dialogItself){
                    dialogItself.close();
                    location.reload();
                }
        }]
    });              
}

function updateCategory(){            
       var name = document.getElementById('categoryName').value;
       if(stateEditCategory){
             $.ajax({
                type: "POST",
                url: "./a_category.php",
                data: { idForEdit: idForEdit, name: name},
                success: function(data){
                    var jsonObj = JSON.parse(data);
                    if(jsonObj.result == 'success'){
                        showPrimaryDialog('Data has been update.');                        
                        stateEditCategory = false;
                    }else{
                        showWarningDialog('Update category was failed.');    
                    }
                }
            });
       }else{
             $.ajax({
                type: "POST",
                url: "./a_category.php",
                data: {nameOfNewcategory: name},
                success: function(data){
                    var jsonObj = JSON.parse(data);
                    if(jsonObj.result == 'success'){
                        showPrimaryDialog('Data has been added.');                        
                        stateEditCategory = false;
                    }else{
                        showWarningDialog('Added category was failed.');    
                    }
                }
            });
       }
      
}
    
function deleteCategory(id){      
    
    BootstrapDialog.show({
        type: BootstrapDialog.TYPE_PRIMARY,
        title: 'Confiration Message',
        message: 'Are you sure want to delete this ?',
        buttons: [{
            label: 'Yes',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                dialogItself.close();
                executeDeleteCategory(id);
            }
        }, {
            label: 'No',
            cssClass: 'btn-primary',
            action: function(dialogItself){
                dialogItself.close();
            }
        }]
    }); 

}

function executeDeleteCategory(id){
    $.ajax({
        type: "POST",
        url: "./a_category.php",
        data: { idForDelete: id},
        success: function(data){
            var jsonObj = JSON.parse(data);
            if(jsonObj.result == 'success'){
                showPrimaryDialog('Data has been delete.');
            }else{
                showWarningDialog('Delete category was failed.');    
            }
        }
    });
}