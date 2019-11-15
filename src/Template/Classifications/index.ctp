<?php
$urlToLinkedListFilter = $this->Url->build([
    "controller" => "api",
    "action" => "classification",
    "_ext" => "json"
]);
echo $this->Html->scriptBlock('var urlToLinkedListFilter = "' . $urlToLinkedListFilter . '";', ['block' => true]);
echo $this->Html->script('Classifications/crud', ['block' => 'scriptBottom']);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 head">
            <h5>Classifications</h5>
            <!-- Add link -->
            <div class="float-right">
                <a href="javascript:void(0);" class="btn btn-success" data-type="add" data-toggle="modal" data-target="#modalClassificationAddEdit"><i class="plus"></i> New Classification</a>
            </div>
        </div>
        <div class="statusMsg"></div>
        <!-- List the classifications -->
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="classificationData">
				<?php foreach ($classifications as $classification): ?>
                <tr>
                    <td><?= $this->Number->format($classification->id) ?></td>
                    <td><?= h($classification->name) ?></td>
                    <td>
                        <a href="javascript:void(0);" class="btn btn-warning" rowid="<?= $classification->id; ?>" data-type="edit" data-toggle="modal" data-target="#modalClassificationAddEdit">edit</a>
                        <a href="javascript:void(0);" class="btn btn-danger" onclick="return confirm('Are you sure to delete data?')?classificationAction('delete', '<?= $classification->id; ?>'):false;">delete</a>
                    </td>
                </tr>
				<?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal Add and Edit Form -->
<div class="modal fade" id="modalClassificationAddEdit" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Add New Classification</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <div class="statusMsg"></div>
                <form role="form">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Enter the new name for the classification">
                    </div>
                    <input type="hidden" class="form-control" name="id" id="id"/>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="classificationSubmit">SUBMIT</button>
            </div>
        </div>
    </div>
</div>