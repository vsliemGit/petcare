<!-- Modal -->
<div id="uploadModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Import file excel</h4>
        </div>
        <div class="modal-body">
          <!-- Form -->
          <form method='post' action="{{ route('product_category.import_excel') }}" enctype="multipart/form-data">
            @csrf
            Select file : <input type='file' name='file' id='file' class='form-control' ><br>
            <input type='submit' class='btn btn-info' value='Import' id='btn_upload'>
          </form>
  
          <!-- Preview-->
          <div id='preview'></div>
        </div>
   
      </div>
  
    </div>
  </div>