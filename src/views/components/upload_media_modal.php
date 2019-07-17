   <!-- Upload Media Modal -->
   <div class="modal fade" id="uploadMediaModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Upload Quote</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                </div>
    <div class="modal-body">
    <div id="insertResult"></div>
    <!-- <form id="uploadForm"> -->
        
    <form action="upload.php"
      class="dropzone"
      id="my-awesome-dropzone"></form>
                
    <div class="form-group">
        <textarea id="quoteText" id="quoteText" cols="30" rows="10" class="form-control mb-2"></textarea>
        <input type="text" class="form-control mb-2" id= "msg" placeholder="Message for Viewers">
        <input type="text" class="form-control" id="cats" placeholder="Quote Categories">
     
            <input class="typeahead" type="text" placeholder="Categories for Quotes">
     
    </div>
    <!-- </form> -->
    </div>
    <!-- TODO If their is no logged in user trying to upload media they should be shown button other than upload, but social login -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                   <button class="btn btn-primary" id="uploadBtn">Upload</button>
                </div>
            </div>
        </div>
    </div>