<!DOCTYPE html>
<html>
<body>
<?php   include('isLogin.php'); ?>

<div class="d-flex" id="wrapper">

  <?php include('header_new.php'); ?> 
  <link href="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.css" rel="stylesheet">
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/bootstrap-table.min.js"></script>
  <script src="https://unpkg.com/bootstrap-table@1.15.5/dist/extensions/filter-control/bootstrap-table-filter-control.min.js"></script>
  <script src="vendor/jquery/jquery.tabledit.min.js"></script>

  <div id="container-fluid" class="col-11">
  <h2 style="color:black;">Distributor Page</h2>
  <div class="bg-light text-dark">
    <table id="surplus" class="table table-bordered table-striped table-hover" border="1" data-toggle="table" data-filter-control="true" 
  data-show-search-clear-button="true" data-show-multi-sort="true">
          
          <script type="text/javascript">
            
            $("#surplus").delegate("td button", "click", function() {
              if(this.id=="delete"){ $(this).closest("tr").hide(650); }
            });

          </script>
  <thead class="thead-light">
  <tr>
    <th scope="col" data-visible="false">ID</th>
    <th scope="col" data-field="Description" data-filter-control="input" data-sortable="true">Description</th> 
    <th scope="col" data-field="GTIN" data-filter-control="input" data-sortable="true">GTIN</th>
    <th scope="col" data-field="Qty" data-filter-control="input" data-sortable="true">Qty</th>
    <th scope="col" data-field="Expire Date" data-filter-control="input" data-sortable="true">Expire Date</th>
    <th scope="col" data-field="Category" data-filter-control="input" data-sortable="true">Category</th>
    <th scope="col" data-field="TMC" data-filter-control="input" data-sortable="true">TMC</th>
    <th scope="col" data-field="Distributor ID" data-filter-control="input" data-sortable="true">Distributor ID</th>
    <th scope="col" data-field="ONP" data-filter-control="input" data-sortable="true">ONP</th>
    <th scope="col">Accept</th>
  </tr>
</thead>
<tbody>
  <?php 
    
    include('connection.php');
      
      if($_SESSION['user'] != "admin")
        $query = new MongoDB\Driver\Query( ['onp' => $_SESSION['user']] );
      else
        $query = new MongoDB\Driver\Query( [] );

        $cursor = $manager->executeQuery("siveq.surplus", $query);

        $i = 0;
        foreach($cursor as $document) 
          { $i++; ?>
  <tr>
    <td scope="row"><?php echo $document->_id; ?></td>
    <td scope="row"><?php echo $document->description; ?></td>
    <td scope="row"><?php echo $document->gtin; ?></td>
    <td scope="row"><?php echo $document->quantity; ?></td>
    <td scope="row"><?php echo $document->expiry_date->toDateTime()->format('r'); ?></td>
    <td scope="row"><?php echo $document->cat; ?></td>
    <td scope="row"><?php echo $document->TMC; ?></td>
    <td scope="row"><?php echo $document->distributor_id; ?></td>
    <td scope="row"><?php echo $document->onp; ?></td>
    <td scope="row">
      <form action="delete.php" method="get" target="dummyframe<?php echo $i; ?>">
        <input type="hidden" id="_id" name="_id" value="<?php echo $document->_id; ?>">
        <button id="delete" type="submit" class="btn btn-success btn-sm hide_on_click" data-title="Delete" data-target="#delete" ><span class="fa fa-check"></span></button>
        <iframe style="width:0; height:0; border:0; border:none" name="dummyframe<?php echo $i; ?>" id="dummyframe<?php echo $i; ?>"></iframe>
      </form>
    </td>
    
    </tr>

  <?php } ?>
</tbody>
</table>
<!--
<script>
$('#surplus').Tabledit({
    url: 'edit.php',
    editmethod:'get',
    rowIdentifier:'_id',
    deleteButton: false,
    editButton: true,
    saveButton: true,
    autoFocus: false,
    inputClass:'form-control input-sm',
    hideIdentifier: true,

buttons: {
    edit: {
        class: 'btn btn-sm btn-primary',
        html: '<span class="fa fa-pencil"></span>',
        action: 'edit'
    },
    delete: {
        class: 'btn btn-sm btn-primary',
        html: '<span class="fa fa-trash"></span>',
        action: 'delete'
    },
    save: {
        class: 'btn btn-sm btn-success',
        html: 'Save'
    },
    restore: {
        class: 'btn btn-sm btn-warning',
        html: 'Restore',
        action: 'restore'
    },
    confirm: {
        class: 'btn btn-sm btn-danger',
        html: 'Confirm'
    }
},

    columns: {
        identifier: [0, '_id'],
        editable: [[1, 'description'], [2, 'gtin'], [3, 'quantity'], [4, 'expiry_date'], [5, 'cat'], [6, 'TMC'], [7, 'distributor_id'], [8, 'onp']]
    },
    onDraw: function() {
        console.log('onDraw()');
    },
    onSuccess: function(data, textStatus, jqXHR) {
        console.log('onSuccess(data, textStatus, jqXHR)');
        console.log(data);
        console.log(textStatus);
        console.log(jqXHR);
    },
    onFail: function(jqXHR, textStatus, errorThrown) {
        console.log('onFail(jqXHR, textStatus, errorThrown)');
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
    },
    onAlways: function() {
        console.log('onAlways()');
    },
    onAjax: function(action, serialize) {
        console.log('onAjax(action, serialize)');
        console.log(action);
        console.log(serialize);
    }
});
</script> -->
</div>
</div>
</div>
</div>

</body>
</html>


